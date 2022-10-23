@extends('layouts.app')

@section('content')

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx61xi2oAGPxP80iHiJkhMM5YdLUhnOrQ&libraries=geometry"></script>
  <script type="text/javascript" src="js/gmaps.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
  <style type="text/css">
          #resplandorverde{   
               -moz-box-shadow: 0px 0px 30px red; 
               -webkit-box-shadow: 0px 0px 30px red; 
               box-shadow: 0px 0px 30px red;
               
               padding: 10px;
               width: 80px;
               margin: 40px;
            }
         .text {
           font-size:28px;
           font-family:helvetica;
           font-weight:bold;
           color:#71d90b;
           text-transform:uppercase;
         }
         .parpadea {
           
           animation-name: parpadeo;
           animation-duration: 1s;
           animation-timing-function: linear;
           animation-iteration-count: infinite;

           -webkit-animation-name:parpadeo;
           -webkit-animation-duration: 1s;
           -webkit-animation-timing-function: linear;
           -webkit-animation-iteration-count: infinite;
         }

         @-moz-keyframes parpadeo{  
           0% { opacity: 1.0; }
           50% { opacity: 0.0; }
           100% { opacity: 1.0; }
         }

         @-webkit-keyframes parpadeo {  
           0% { opacity: 1.0; }
           50% { opacity: 0.0; }
            100% { opacity: 1.0; }
         }

         @keyframes parpadeo {  
           0% { opacity: 1.0; }
            50% { opacity: 0.0; }
           100% { opacity: 1.0; }
         }

         .dropdown-content li>a, .dropdown-content li>span{

            color:  black !important;
         }
  </style>

  <script type="text/javascript">
    var map;




    $(document).ready(function(){

         var fijo=0;
         //var email='r.hernandez@lidcorp.mx';

          $("#historico").click(function(){

            //alert(imei);
            location.href="historico?imei="+imei;

        });

         //fijar ubicación
         $("#fijaubi").click(function(){

            if($(this).prop('checked') ) {
          
                $.post("guardafijo",{numero:imei,_token:token,estatus:1},
                   function(data){
                       $("#fijaubi").prop( "checked", true );
                  },'json');


               
             }else{
              $.post("guardafijo",{numero:imei,_token:token,estatus:0},
                   function(data){
                      $("#fijaubi").prop( "checked", false );
                  },'json');
              

               $(".parpadea").css("display","none");
             }

        });

        //fijar notificaciones

           $("#onnotificaciones").click(function(){

            if($(this).prop('checked') ) {
          
                $.post("guardafijonotificacion",{numero:imei,_token:token,estatus:1},
                   function(data){
                       $("#onnotificaciones").prop( "checked", true );
                  },'json');


               
             }else{
              $.post("guardafijonotificacion",{numero:imei,_token:token,estatus:0},
                   function(data){
                      $("#onnotificaciones").prop( "checked", false );
                  },'json');
              

               $(".parpadea").css("display","none");
             }

        });

        //activar geocerca 
             $("#activageocerca").click(function(){

            if($(this).prop('checked') ) {
          
                $.post("activageocerca",{numero:imei,_token:token,estatus:1},
                   function(data){

                       $("#activageocerca").prop( "checked", true );
                  },'json');


               
             }else{
              $.post("activageocerca",{numero:imei,_token:token,estatus:0},
                   function(data){
                      $("#activageocerca").prop( "checked", false );
                  },'json');
              

               $(".parpadea").css("display","none");
             }

        });





      var map = new GMaps({
        el: '#map',
        lat: 19.3911668,
        lng: -99.4238191,
        zoom:17
      });



       var icon = {
          url: "img/auto.png", // url
          scaledSize: new google.maps.Size(50, 50), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(0, 0) // anchor
      };

      // var direccion="";

      $.post("vehiculosasignados",{_token:token},
            function(data){

              // alert(data.rows.length);
               for (var i = 0; i < data.rows.length; i++) {
                  
                //  alert(data.rows[i].id_imei_android);

                  $("#vehiculo").append("<option value='"+data.rows[i].id_imei_android+"'>"+data.rows[i].alias_vehiculo+"</option>");
                   $("#vehiculo").formSelect();



               }

            },'json');



      var imei=0;
      var circle;

      $("#vehiculo").change(function(){

         $("#share").css("display","none");
         $("#ubicacion").html("");
         $("#share-ubi").html("");
         imei=$(this).val();

         $("#colorgps").css("color","#37E209");

         sensar();

        

          /* $.ajax({
            async: false,
            type: 'get',
            url: 'consultacoordenadas',
            dataType: "json",
            data: {numero:imei,_token:token},
            success: function (data) {

              var latt=Number(data.rows.latitud); //Number
              var longg=Number(data.rows.longitud);


              circle = map.drawCircle({
                        lat: latt,
                        lng: longg,
                        radius: 350,
                        strokeColor: '#BBD8E9',
                        strokeOpacity: 1,
                        strokeWeight: 3,
                        fillColor: '#432070',
                        fillOpacity: 0.2
                      });
            },
            error: function (request, status, error) {
               // alert(jQuery.parseJSON(request.responseText).Message);
            }
        });*/





      });

      setInterval(sensar,10000);



         function sensar(){


          map.removeMarkers();


         $.get("consultacoordenadas",{numero:imei,_token:token},

            function(data){

                var lat=Number(data.rows.latitud); //Number
                var long=Number(data.rows.longitud);
                var alias=data.rows.alias;
                var conductor=data.rows.conductor;
                var alerta=data.rows.alerta;
                var telefono=data.rows.telefono;
                var fija=data.rows.fija;
                var notificaciones=data.rows.notificaciones;
                var activaGeocerca=data.rows.activaGeocerca;
                var geocerca=data.rows.geocerca;
                var alerta2=data.rows.alerta2;
                var pila=data.rows.pila;
                var fecha=data.rows.fecha;
               

                 if(lat==0 && imei!=0){

                 
                  $("#ubicacion").html("<span style='color:red'>Sin GPS, Registra tu vehículo en el apartado mis vehículos</span>");
                  $("#fijaubi").prop( "checked", false );
                  $("#onnotificaciones").prop( "checked", false );
                  $("#activageocerca").prop( "checked", false );

                  $("#fijaubi").attr("disabled", true);
                  $("#onnotificaciones").attr("disabled", true);
                  $("#activageocerca").attr("disabled", true);
                 }else{
                  $("#fijaubi").attr("disabled", false);
                  $("#onnotificaciones").attr("disabled", false);
                  $("#activageocerca").attr("disabled", false);

                 }

                    GMaps.geolocate({
                             success: function(position){

                  

                     var geocoder = new google.maps.Geocoder;
                        const latlng = {
                            lat: lat,
                            lng: long,
                        };

                        geocoder.geocode({ location: latlng}, (results, status) => {

                         
                            direccion= results[0].formatted_address;

                           // alert(lat);

                            $("#share").css("display","");

                            if(pila<15){
                                $("#ubicacion").html(direccion+ " , <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+pila+ "%, último registro: "+fecha);

                            }else{

                                $("#ubicacion").html(direccion+ " , <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+pila+ "%, último registro: "+fecha);

                            }
                            


                            $("#share-ubi").html(direccion);

                           //var mensaje="Hola el vehículo "+alias+" está en movimiento se encuentra en :"+ direccion+ ", consulta en localizaminave.com.mx.";  $(".parpadea").css("display","");

                            if(fija==1){

                              $("#fijaubi").prop( "checked", true );
                            }else{

                              $("#fijaubi").prop( "checked", false );
                            }

                            if(notificaciones==1){
                               $("#onnotificaciones").prop( "checked", true );

                            }else{

                               $("#onnotificaciones").prop( "checked", false );
                            }

                            if(activaGeocerca==1){
                              //alert(geocerca);
                              $("#geocercaactual").html(geocerca+ " Km");
                              $("#activageocerca").prop( "checked", true );
                            }else{

                              $("#activageocerca").prop( "checked", false );
                            }

                            if(alerta==1 || alerta2==1){

                              $(".parpadea").css("display","");
                            }else{
                              $(".parpadea").css("display","none");
                            }




                            //console.log(sessionStorage.getItem("direccionFija"));


                           });
                            


                      map.setCenter(lat, long);

                        map.addMarker({
                        lat: lat,
                        lng: long,
                        icon:icon,
                        title: 'el auto se encuentra aquí',
                        infoWindow: {
                        content: "<div>Vehículo "+alias+" conducido por "+conductor+" batería: "+pila+"%, Último registro: "+fecha+"</div>",
                          maxWidth: 300

                         }
                      });







                      /*circulo = new google.maps.Circle({
                      strokeColor: '#44a373',
                      strokeOpacity: 0.5,
                      strokeWeight: 1,
                      fillColor: '#44a373',
                      fillOpacity: 0.25,
                      map: map
                  });
                  circulo.setRadius(parseInt(1000));
                  circulo.bindTo('center', marcador, 'position');*/





                    },
                    error: function(error){
                      alert('Geolocation failed: '+error.message);
                    },
                    not_supported: function(){
                      alert("Your browser does not support geolocation");
                    },
                    always: function(){
                     // alert("Done!");
                    }
                  });
            




            },'json');

         }





    });
  </script>

  <script type="text/javascript">
     $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('.fixed-action-btn').floatingActionButton();

        $("#comparte").click(function(){

            window.location.href='https://api.whatsapp.com/send?text=hola te comparto la ubicación de mi vehículo';

        });

        $(".reportar").click(function(){

            window.location.href='https://sfpya.edomexico.gob.mx/controlv/rev/CVRoboVehiculo.jsp';

        });






     
        
  });
      
  </script>
<body>
   

   <div id="main" >




      <div class="row">
         <!-- Modal Trigger -->


           <!-- Modal Structure -->
           <!--div id="modal1" class="modal">
             <div class="modal-content">
               <h5>Comparte la ubicación</h5>
               <span id="share-ubi"></span>
               <a href="https://api.whatsapp.com/send?text=holaaa">comparte</a>


             </div>
             <div class="modal-footer">
               <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
               <a href="#!" class="modal-close waves-effect waves-green btn-flat">whatsapp</a>
             </div>
           </div-->
       

        <div class="content-wrapper-before blue-grey lighten-5"></div>
          <div class="col s12">
            <div class="container">
              <div class="section">
                <div class="row vertical-modern-dashboard">
                   <div id="map" style="width:100%;height: 300px;"></div>

                  <div class="col s12 m2 l5 animate fadeRight">
                  
                     <div class="card">
                        <div class="card-content">
                           <h4 class="card-title mb-0">Ubicación actual <i class="material-icons" id='colorgps' style="color:red;">my_location</i></h4>


                             <div class="input-field col s12">
                               <select name="vehiculo" id="vehiculo">
                                 <option value="" disabled selected>Selecciona Vehículo</option>
                                 
                               </select>
                               <label>Vehículo</label>
                             </div>
                          
                          <span id="ubicacion"></span>
                          <a class="waves-effect waves-light  modal-trigger"  id="comparte"><i class="material-icons tooltipped " data-position="top" data-tooltip="Compartir" style="cursor:pointer;display: none;" id="share" >share</i></a>
                          <div id="espacio"><p style="color:#fff;">----</p></div>
                         
                         

                        </div>
                     </div>


                </div>



                   <div class="col s12 m2 l3 animate fadeRight">
                  
                     <div class="card">
                        <div class="card-content">

                           <center>
                          <span id="resplandorverde" class="parpadea" style="display:none;font-size: 10px;">Alerta <i class="material-icons" style="color:red;padding: 2px;">notifications</i></strong></span></center>
                           

                           <h4 class="card-title mb-0">Fijar ubicación (Auto estacionado)</h4>

                           <!-- Switch -->
                             <div class="switch">
                               <label>
                                 Off
                                 <input type="checkbox" id="fijaubi" name="fijaubi">
                                 <span class="lever"></span>
                                 On
                               </label>
                             </div>

                              <h4 class="card-title mb-0">Geocerca</h4>

                           <!-- Switch -->
                             <div class="switch">
                               <label>
                                 Off
                                 <input type="checkbox" id="activageocerca" name="activageocerca">
                                 <span class="lever"></span>
                                 On
                               </label>
                               <span id="geocercaactual" class="lever"></span>
                             </div>

                        </div>
                     </div>


                </div>


                   <div class="col s12 m2 l4 animate fadeRight">
                  
                     <div class="card">
                        <div class="card-content">
                           <h4 class="card-title mb-0">Acciones <i class="material-icons right">bubble_chart</i></h4>
                         
                          <a class="waves-effect waves-warning btn reportar" style="background-color: red;width: 100%;border-radius: 15px;"><i class="material-icons right">report</i>Reportar</a>

                          <a  href="tel:911" class="waves-effect waves-warning btn" style="background-color: black;margin-top: 10px;width: 100%;border-radius: 15px;"><i class="material-icons right">local_phone</i>911</a>

                          <a class="waves-effect waves-warning btn" id="historico" style="background-color: black;margin-top: 10px;width: 100%;border-radius: 15px;"><i class="material-icons right">reorder</i>Histórico</a>

                          <a href='dispositivos' class="waves-effect waves-warning btn" style="background-color: '';margin-top: 10px;width: 100%;border-radius: 15px;"><i class="material-icons right">drive_eta</i>Mis dispositivos</a>



                        </div>
                     </div>


                </div>

      </div>
   </div>
</div>
</div>
</div>

<div class="row">

     <div class="row vertical-modern-dashboard">

      <div class="col s12 m2 l12 animate fadeRight">
        <div class="card">
            <div class="card-content">
                  <table>
                    <thead>
                      <tr>
                          <th>Vehículo</th>
                          <th>Ubicación</th>
                          <th>Estatus</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Mi kia</td>
                        <td>Abundio Gómez 74, Ahuizotla, 53378 Naucalpan de Juárez, Méx., México</td>
                        <td><span style="color: #00bcd4;">En movimiento</span></td>
                      </tr>
                      <tr>
                        <td>Auto 2</td>
                        <td>Jellybean dedede 5</td>
                        <td><span style="color:red;">Detenido</span></td>
                      </tr>
                      
                    </tbody>
                  </table>
        </div>
    </div>
    </div>
  </div>

</div>



</div>





</body>



 


@endsection


