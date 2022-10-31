@extends('layouts.app')

@section('content')
 

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
<script src="notificaciones/node_modules/socket.io-client/dist/socket.io.js"></script>

  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    .leaflet-container {
      height: 400px;
      width: 80%;
      max-width: 100%;
      max-height: 100%;
    }
  </style>


 <div id="main">
   <div class="row">
     <div class="content-wrapper-before blue-grey lighten-5"></div>
     <div class="col s12">
       <div class="container">
         <div class="section">
           <div class="row vertical-modern-dashboard">
             <div id="map" style="width:100%;height: 300px;"></div>
             <div class="col s12 m2 l5 animate fadeRight">
               <div class="card">
                 <div class="card-content">
                   <h4 class="card-title mb-0">Ubicación actual <i class="material-icons" id='colorgps' style="color:red;">my_location</i>
                   </h4>
                   <div class="input-field col s12">
                     <select name="vehiculo" id="vehiculo">
                       <option value="" disabled selected>Selecciona Vehículo</option>
                     </select>
                     <label>Vehículo</label>
                   </div>
                   <span id="ubicacion"></span>
                   <a class="waves-effect waves-light  modal-trigger" id="comparte">
                     <i class="material-icons tooltipped " data-position="top" data-tooltip="Compartir" style="cursor:pointer;display: none;" id="share">share</i>
                   </a>
                   <div id="espacio">
                     <p style="color:#fff;">----</p>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col s12 m2 l3 animate fadeRight">
               <div class="card">
                 <div class="card-content">
                   <center>
                     <span id="resplandorverde" class="parpadea" style="display:none;font-size: 10px;">Alerta <i class="material-icons" style="color:red;padding: 2px;">notifications</i>
                       </strong>
                     </span>
                   </center>
                   <h4 class="card-title mb-0">Fijar ubicación (Auto estacionado)</h4>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="fijaubi" name="fijaubi">
                       <span class="lever"></span> On </label>
                   </div>
                   <h4 class="card-title mb-0">Geocerca</h4>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="activageocerca" name="activageocerca">
                       <span class="lever"></span> On </label>
                     <span id="geocercaactual" class="lever"></span>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col s12 m2 l4 animate fadeRight">
               <div class="card">
                 <div class="card-content">
                   <h4 class="card-title mb-0">Acciones <i class="material-icons right">bubble_chart</i>
                   </h4>
                   <a class="waves-effect waves-warning btn reportar" style="background-color: red;width: 100%;border-radius: 15px;">
                     <i class="material-icons right">report</i>Reportar </a>
                   <a href="tel:911" class="waves-effect waves-warning btn" style="background-color: black;margin-top: 10px;width: 100%;border-radius: 15px;">
                     <i class="material-icons right">local_phone</i>911 </a>
                   <a class="waves-effect waves-warning btn" id="historico" style="background-color: black;margin-top: 10px;width: 100%;border-radius: 15px;">
                     <i class="material-icons right">reorder</i>Histórico </a>
                   <a href='dispositivos' class="waves-effect waves-warning btn" style="background-color: '';margin-top: 10px;width: 100%;border-radius: 15px;">
                     <i class="material-icons right">drive_eta</i>Mis dispositivos </a>
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
                   <td>
                     <span style="color: #00bcd4;">En movimiento</span>
                   </td>
                 </tr>
                 <tr>
                   <td>Auto 2</td>
                   <td>Jellybean dedede 5</td>
                   <td>
                     <span style="color:red;">Detenido</span>
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

<script>

 
 $(document).ready(function(){




//llenamos select vehiculos
  $.post("vehiculosasignados",{_token:token},
            function(data){

              // alert(data.rows.length);
               for (var i = 0; i < data.rows.length; i++) {
                  
                //  alert(data.rows[i].id_imei_android);

                  $("#vehiculo").append("<option value='"+data.rows[i].id_imei_android+"'>"+data.rows[i].alias_vehiculo+"</option>");
                   $("#vehiculo").formSelect();



               }

 },'json');


  //detectar cambio de vehiculo
     var imei=0;
      $("#vehiculo").change(function(){

         $("#share").css("display","none");
         $("#ubicacion").html("");
         $("#share-ubi").html("");
         imei=$(this).val();

         //invocamos al socket
         $.post("inicializasocket",{_token:token,imei:imei});
        

         $("#colorgps").css("color","#37E209");

        });
 
 //controles
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

//fin de controles
  var socket = io('http://187.245.4.2:3000'); //187.245.4.2
  var marker;
  var theMarker = {};

  var messages = document.getElementById('messages');


  const map = L.map('map').setView([0, 0], 17);

  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="https://localizaminave.com">LocalizaMiNave</a>'
  }).addTo(map);


   socket.on('alertas', function(msgalerta) {

        console.log(msgalerta.msj);

   }); 



  socket.on('ubicacion', function(msg) {

      console.log(msg.imei);
      if(msg.fija==1){

         $("#fijaubi").prop( "checked", true );

      }else{

        $("#fijaubi").prop( "checked", false);
      }

      if(msg.activaGeocerca==1){

          $("#activageocerca").prop( "checked", true );
      }else{

         $("#activageocerca").prop( "checked", false );
      }


      if(msg.imei==imei){

        if(msg.pila<15){

            $("#ubicacion").html(msg.direccion+ " , <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);

        }else{

             $("#ubicacion").html(msg.direccion+ " , <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);

        }

    


    var customIcon = new L.Icon({
      iconUrl: 'http://localizaminave.com:8080/img/carro.png',
      iconSize: [30, 40],
      iconAnchor: [25, 50]
    });

    if (theMarker != undefined) {
              map.removeLayer(theMarker);
        };


      theMarker = L.marker([msg.longitud, msg.latitud],{icon: customIcon}).addTo(map).bindPopup('<b>Dispositivo '+msg.alias+' se encuentra en </b><br />'+msg.direccion+ ', conductor: '+msg.conductor).openPopup();

  

    const popup = L.popup()
    .setLatLng([msg.longitud, msg.latitud])
    .setContent(msg.alias)
    .openOn(map);

    }


  });



});
 

</script>

 


@endsection


