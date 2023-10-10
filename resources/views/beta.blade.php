@extends('layouts.beta')

@section('content')


<link rel="stylesheet" href="css/leaflet.css"/>
<script src="js/leaflet.js"></script>


<!--script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script-->

<?php  $llave=env('LLAVE_API_MAPS'); ?>

 <?php

          function isMobile2() {
                      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
                    }
?>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $llave; ?>&libraries=geometry"></script>

<script src="notificaciones/node_modules/socket.io-client/dist/socket.io.js"></script>

<link rel="stylesheet" href="css/leaflet-control-condended-attribution.css" />
<script type="text/javascript" src="js/leaflet-control-condended-attribution.js"></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="js/leaflet.rotatedMarker.js"></script>

<link rel="stylesheet" href="css/L.Control.Locate.css" />
<script src="js/L.Control.Locate.js" charset="utf-8"></script>


<!-- interact.js -->
<script src="https://unpkg.com/interact.js@1.2.8/dist/interact.min.js"></script>

<!-- Leaflet-GoogleMutant -->
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@0.10.0/Leaflet.GoogleMutant.js"></script>
<!-- Leaflet-Pegman -->
<link rel="stylesheet" href="css/leaflet-pegman.css" />
<script src="https://unpkg.com/leaflet-pegman@0.1.6/leaflet-pegman.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>







  <style>

     body{

       background-image: url('img/prueba7.jpg');
       background-repeat: no-repeat;
        background-size: cover;
    }

    .leaflet-routing-container{

        display: none !important;
    }

  .custom .leaflet-popup-tip,
  .custom .leaflet-popup-content-wrapper {
      //border-color:#00bcd4;
      //background-image: url("img/iconoo-removebg-preview.png");
   }


.leaflet-popup-content-wrapper, .leaflet-popup-tip {
    background: #1d3821;
    color: #fff;
    box-shadow: 0 4px 14px rgba(0,0,0,0.4);
   
  
}

.leaflet-container a.leaflet-popup-close-button {

    color: #fff !important;
}

.swal2-container .select-wrapper{

    display: none !important;
}

.swal2-popup.swal2-toast{

    background-color: red !important;
    color: #fff;
}

td, th {
   
    padding:0px !important;
    font-size: 10px;
    
}
</style>

<script type="text/javascript">


$(document).ready(function(){






//consultamos los vehiculos
$.post("vehiculosasignados",{_token:token},
            function(data){

              // alert(data.rows.length);
               for (var i = 0; i < data.rows.length; i++) {
                  
                //  alert(data.rows[i].id_imei_android);

                  $("#misdisvonline").append("<tr style='color:#000;'><td><i class='material-icons' style='color:#33FF52;font-size: 12px;'>lens</i> "+data.rows[i].alias_vehiculo+"</td><td><i class='material-icons'>settings</i></td><td><i class='material-icons'>location_on</i></td></tr>")

                  $("#vehiculo").append("<option value='"+data.rows[i].id_imei_android+"'>"+data.rows[i].alias_vehiculo+"</option>");
                   $("#vehiculo").formSelect();



               }

 },'json');





//$("#lo").trigger("click");


    
//fin de controles
  var socket = io('https://localizaminave.com:3000'); //187.245.4.2


  var marker;
  var theMarker = {};
  var marker_actual = {};
  var routingControl = null;
  var imei=0;
  var messages = document.getElementById('messages');
  var circle;
  var browserLat;
  var browserLong;
  var valorgeo=0;
  var movimiento="";
  var colore="";



  $("#menos").click(function(){

    valorgeo=Number(valorgeo)-100;

    $("#geo").html(valorgeo+ " mtros.");

    //actualizamos la geocerca establecidad en relación al imei
    $.post("actualizageocerca",{_token:token,imei:imei, geocerca: valorgeo},
      function(data){

          $.post("inicializasocket",{_token:token,imei:imei});
      },'json');


  });

   $("#mas").click(function(){

    valorgeo=Number(valorgeo)+100;

   // console.log(geo);

   $("#geo").html(valorgeo+ " mtros.");

   $.post("actualizageocerca",{_token:token,imei:imei, geocerca: valorgeo},
      function(data){

          $.post("inicializasocket",{_token:token,imei:imei});
      },'json');



  });


   //fijar ubicación
         $("#fijaubi").click(function(){

          var auxDir=$("#dir").val();

         

            if($(this).prop('checked') ) {
          
                $.post("guardafijo",{numero:imei,_token:token,estatus:1, direccionfija: auxDir},
                   function(data){
                       $("#fijaubi").prop( "checked", true );
                       $.post("inicializasocket",{_token:token,imei:imei});
                  },'json');


               
             }else{
              $.post("guardafijo",{numero:imei,_token:token,estatus:0},
                   function(data){
                      $("#fijaubi").prop( "checked", false );
                      $.post("inicializasocket",{_token:token,imei:imei});
                  },'json');
              

             //  $("#resplandorverde").css("display","none");
             }

        });

 //activar geocerca 
        $("#activageocerca").click(function(){

             var auxDir=$("#dir").val();

            // alert(auxDir);

            if($(this).prop('checked') ) {
          
                $.post("activageocerca",{numero:imei,_token:token,estatus:1,direcciongeocerca: auxDir},
                   function(data){

                       $("#activageocerca").prop( "checked", true );
                        $.post("inicializasocket",{_token:token,imei:imei});
                  },'json');


               
             }else{
              $.post("activageocerca",{numero:imei,_token:token,estatus:0},
                   function(data){
                      $("#activageocerca").prop( "checked", false );
                      $.post("inicializasocket",{_token:token,imei:imei});
                  },'json');
              

              //$("#resplandorrojo").css("display","none");
             }

        });
 


 // const map = L.map('map',{condensedAttributionControl: false}).setView([19.451054, -99.125519], 15);
 map = L.map('map',{condensedAttributionControl: false}).setView([19.45105, -99.125519], 5);

 map.addControl(new L.Control.Fullscreen({
    title: {
        'false': 'Pantalla completa',
        'true': 'Salir'
    }
}));



/* var ggl = new L.Google('ROADMAP');
 map.addLayer(ggl);*/
  

  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="https://localizaminave.com">LocalizaMiNave</a>'
  }).addTo(map);




L.control.condensedAttribution({
  emblem: '<div class="emblem-wrap"><img src="https://localizaminave.com/images/color.png"/ width="50"></div>',
  prefix: '<a href="https://localizaminave.com" title="Travel time analysis by Motion Intelligence"></a>GPS'
}).addTo(map);


var botonesControl = L.control({position: 'topleft'}); // creación del contenedor de botones
    botonesControl.onAdd = function() {                     // creación de los botones
        var botones = L.DomUtil.create('div', 'class-css-botones');
     


        botones.innerHTML += `<a class="btn-floating black modal-trigger" href="#online" style="margin-top:5px;"><i class="material-icons" style="color:#00bcd4;">location_on</i>Rastrear</a><br>`;

        botones.innerHTML += `<a id="ir-car" class="btn-floating" style="background-color:#000;margin-top:5px;"><i class="material-icons">directions</i></a><br>`;


         botones.innerHTML += `<a id="ir-comparte" class="btn-floating" style="background-color:#000;margin-top:5pxcursor:pointer;margin-top:5px;"><i class="material-icons" id="comparte">share</i></a>`;

     


        return botones;
    };
    botonesControl.addTo(map); 



    var botonesControl1 = L.control({position: 'bottomleft'}); // creación del contenedor de botones
    botonesControl1.onAdd = function() {                     // creación de los botones
        var botones1 = L.DomUtil.create('div', 'class-css-botones');
     

        botones1.innerHTML = `<a href="dispositivos" id="mostrar-vehiculos" class="btn-floating" style="background-color:#000;"><i class="material-icons">directions_car</i></a>`;

     

         botones1.innerHTML += `<a id="historico-car" class="btn-floating" style="background-color:#000;margin-left:5px;"><i class="material-icons">format_list_bulleted</i></a>`;

      
          botones1.innerHTML += `<a id="ir-confi" class="btn-floating modal-trigger" href="#configuraciones" style="background-color:#000;margin-left:5px;"><i class="material-icons">settings</i></a>`;

         

           botones1.innerHTML += `<a href='index' id="ir-home" class="btn-floating" style="background-color:#000;margin-left:5px;"><i class="material-icons">home</i></a>`;


        return botones1;
    };
    botonesControl1.addTo(map); 




    var botonesControl2 = L.control({position: 'topright'}); // creación del contenedor de botones
    botonesControl2.onAdd = function() {                     // creación de los botones
        var botones2 = L.DomUtil.create('div', 'class-css-botones-ubi');
     

        botones2.innerHTML = `<div id="contubi" style="background-color:black;width:100%;padding:5px;border-radius:7px;"><span id="miubicacion" style="color:#fff !important;"></span></div>`;



        return botones2;
    };
    botonesControl2.addTo(map); 






    document.getElementById('mostrar-vehiculos').addEventListener('click', function() {
        
      //  alert("hola2");
    });
    /*document.getElementById('localizar-car').addEventListener('click', function() {
        alert("hola");
    });*/

     document.getElementById('historico-car').addEventListener('click', function() {
      //  alert("hola");
    });


     



var lc = L.control
  .locate({
    position: "topleft",
    strings: {
      title: "Donde estoy yo"
    },
    
    // maxZoom: 16,
     keepCurrentZoomLevel: false,
     initialZoomLevel:false,
     
     drawCircle:false,
     icon:'leaflet-control-locate-location-arrow',
     iconElementTag:'span',
     iconLoading:'leaflet-control-locate-spinner',
     locateOptions: {
              maxZoom: 16,
              enableHighAccuracy: true
    }
  })
  .addTo(map);

   var pegmanControl = new L.Control.Pegman({
    position: 'bottomright', // position of control inside the map
    theme: "leaflet-pegman-v3-default", // or "leaflet-pegman-v3-default"
  });
  pegmanControl.addTo(map);


  $("#localizar").click(function(){



    imei=$("#vehiculo").val();

    $("#cargando").css("display","");

        setTimeout(myGreeting, 3000);

        var instancia = M.FormSelect.getInstance($("#vehiculo"));

        console.log(instancia);
       /* var valores = instancia.getSelectedValues();

                for (var i = 0; i < valores.length; i++) {
                       
                            imei=valores[i];
3
                    }*/


        map.setZoom(16);

        

        


        $.post("inicializasocket",{_token:token,imei:imei});




  });


  function myGreeting() {
     $("#cargando").css("display","none");
   }






socket.on('ubicacion', function(msg) {

      $("#cargando").css("display","none");
      
      if(msg.imei==imei){


        //funcionalidad para compartir

          $("#comparte").click(function(){

                window.location.href='https://api.whatsapp.com/send?text=Hola, estoy en camino sigue mi viaje, en estos momentos me encuentro en '+msg.direccion+ ', consulta https://localizaminave.com/tracking_share?imei='+imei;

            });



            var customIcon = new L.Icon({
              iconUrl: 'https://localizaminave.com/img/'+msg.tipo,
              iconSize: [30, 40],
              iconAnchor: [25, 50]
            });     


              var customIcon2 = new L.Icon({
                  iconUrl: 'https://localizaminave.com/img/globo.gif',
                  iconSize: [80, 80],
                  iconAnchor: [35, 60]
                });

             // console.log(msg.longitud_geocerca);

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


            $("#tem").html(msg.temperatura);
            $("#cli").html(msg.clima);
            $("#dir").val(msg.direccion);
            $("#bat").html(msg.pila+" %");
            $("#reg").html(msg.fecha);


             $("#miubicacion").html(msg.direccion);
            


           /* if(msg.pila<15){

               $("#miubicacion").html(msg.direccion+ ", <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);

               /* $("#miubicacion").html(msg.direccion+ ", temperatura: "+msg.temperatura+" , clima: "+msg.clima+" <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);*/

             /* }else{

                $("#miubicacion").html(msg.direccion+ ", <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);
                 /*$("#miubicacion").html(msg.direccion+ ", temperatura: "+msg.temperatura+" , clima: "+msg.clima+" <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);
             }*/

            velocidad=Number(msg.velocidad);

            if(velocidad>5){

                $("#vel").html(velocidad+ " Km/hra.");
                $("#enmov").css("color","#8EF046");
                $("#mov").html("En movimiento");
                movimiento="En movimiento";
            }else{

                velocidad=0;
                $("#vel").html("0 Km/hra.");
                $("#enmov").css("color","red");
                $("#mov").html("Detenido");
                movimiento="Detenido";
            }
            

            if(msg.pila==0){

                colore="red";

                $("#st").css("color","red !important");
                $("#st1").css("color","red !important");
            }else{
                colore="#8EF046";
                 $("#st").css("color","#8EF046 !important");
                 $("#st1").css("color","#8EF046 !important");
            }



          //geocerca  obtener la latitud y longitud de geocerca y pintarlas
           if (circle != undefined) {
              map.removeLayer(circle);
            };


          if(msg.latitud_geocerca!= undefined){


           var circleCenter = [msg.latitud_geocerca, msg.longitud_geocerca];

            var circleOptions = {
             color: '#F04653',
             fillColor: '#ff7800',
             fillOpacity: .1
          }

            $("#geo").html(msg.geocerca+ " mtros.");

            valorgeo=msg.geocerca;

            circle = L.circle(circleCenter,Number(msg.geocerca), circleOptions); //500 metros de radio - 1 km de diametro
            circle.addTo(map);

          }

           if (theMarker != undefined) {
              map.removeLayer(theMarker);
           };

          if (marker_actual!= undefined) {
                  map.removeLayer(marker_actual);
           };


         lat=msg.latitud;
         long=msg.longitud;

         //pintamos el marcador

        // $("#miubicacion").html(msg.direccion);

           navigator.geolocation.getCurrentPosition(function(position) {
                browserLat =  position.coords.latitude;
                browserLong = position.coords.longitude;

                recibeubica(browserLat,browserLong);
  
          });

         function recibeubica(browserLat,browserLong){

          console.log(browserLat);
          console.log(browserLong);
      
   
       if (routingControl != null) {
            map.removeControl(routingControl);
            routingControl = null;
        }

        var distancia = (map.distance([msg.longitud, msg.latitud], [browserLat,browserLong]))/1000;

        console.log(distancia);

        $("#estas").html("<br><b style='font-size:12px;'>Estás a "+distancia.toFixed(2)+" Km del dispositivo</b>");

         $("#estasinput").val(distancia.toFixed(2));


        var greenIcon = new L.Icon({
          iconUrl: '',
          shadowUrl: 'https://localizaminave.com/img/iconper.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });


        document.getElementById('ir-car').addEventListener('click', function() {
        
            routingControl=L.Routing.control({
              waypoints: [
                L.latLng(browserLat, browserLong),
                L.latLng(msg.longitud, msg.latitud)
              ],


            createMarker: function(i, wp, nWps) {
                    if (i === 0 || i === nWps - 1) {
                      // here change the starting and ending icons
                      return L.marker(wp.latLng, {
                        icon: greenIcon // here pass the custom marker icon instance
                      });
                    } else {
                      // here change all the others
                      return L.marker(wp.latLng, {
                        icon: yourOtherCustomIconInstance
                      });
                    }
              },
              lineOptions: {
                  styles: [{color:'#00bcd4', opacity: 1, weight: 5}]
               },
               autoRoute: true,
               fitSelectedRoutes: false,

            }).addTo(map);

            });



       }

        theMarker = L.marker([msg.longitud, msg.latitud],{icon: customIcon, draggable: false,
          autoPan: true}).addTo(map).bindPopup("<center>"+msg.alias+"</center><br><table><tr><td>Estatus:"+movimiento+"</td><td>Modo:GPS</td></tr><tr><td>Batería:"+msg.pila+"%</td><td>GPS:GLONASS</td></tr><tr><td>Velocidad:"+velocidad+" km/hra.</td><td>Geocerca:"+msg.geocerca+"</td><tr><td>Clima:"+msg.clima+"</td><td>Temp.:"+msg.temperatura+"</td></tr></tr><tr><td>Fecha: "+msg.fecha+"</td><td><i class='material-icons'  id='st1' style='color:"+colore+";'>fiber_manual_record</i></td></tr><tr><td>Estás a "+$('#estasinput').val()+" km del dispositivo</tr></td></table>").openPopup();

        if(msg.latitud_geocerca!=null) {
     

              var d = map.distance([msg.longitud, msg.latitud], circle.getLatLng());

              var isInside = d < circle.getRadius();

              if(isInside==false && msg.latitud_geocerca!=""){

                //alert("fuera de geocerca");
                Swal.fire({
                    icon: 'warning',
                    text: "Alerta de Geocerca",
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 1800
                });

               // $("#resplandorrojo").css("display","");

              }else{

                $("#resplandorrojo").css("display","none");
              }

        }

        //{className: "custom-popup"}
    const popup = L.popup({className: "custom"})
    .setLatLng([msg.longitud, msg.latitud])
    //.setContent("<center><b style='font-size:16px;'>"+msg.alias+"</b></center>")
    .setContent("<center>"+msg.alias+"</center><br><table><tr><td>Estatus:"+movimiento+"</td><td>Modo:GPS</td></tr><tr><td>Batería:"+msg.pila+"%</td><td>GPS:GLONASS</td></tr><tr><td>Velocidad:"+velocidad+" km/hra.</td><td>Geocerca:"+msg.geocerca+"</td><tr><td>Clima:"+msg.clima+"</td><td>Temp.:"+msg.temperatura+"</td></tr></tr><tr><td>Fecha: "+msg.fecha+"</td><td><i class='material-icons'  id='st' style='color:"+colore+";'>fiber_manual_record</i></td></tr><tr><td>Estás a "+$('#estasinput').val()+" km del dispositivo</tr></td></table>")
    .openOn(map);


   /* const popup = L.popup({className: "custom"})
    .setLatLng([msg.longitud, msg.latitud])
    .setContent("<center><b>"+msg.alias+"</b> <br>"+velocidad+" km/hra.<br>"+movimiento+"</center>")
    .openOn(map);*/


    /* const popup = L.popup({className: "custom"})
    .setLatLng([msg.longitud, msg.latitud])
    .setContent("<b>"+msg.alias+"</b> <br>"+velocidad+" km/hra.<br>"+movimiento+" <center><img src='https://localizaminave.com/img/"+msg.tipo+"' style='width: 20px; height: 30px;'></center>")
    .openOn(map);*/







       }

});





});

    
</script>



<style type="text/css">
  #map{
  position: absolute;
  top: 60px;
  bottom: 50;
 
  height: 87%;
 // z-index: -1000;
 opacity: 1;
}
#cargando{
display: flex;
    align-items: center;
    justify-content: center;
    height: 600px;
    border: 2px solid #006100;

}

.fixed-action-btn {
    
    right: 10px !important;
    bottom: 25% !important;


    }

 .dropdown-content li > a, .dropdown-content li > span {
    color: #fb8c00 !important;
}

.select-dropdown .dropdown-trigger{

    color:#fff !important;
    background-color: red;
}
</style>



<div id="main">
     <input type="hidden" name="dir" id="dir">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
           <!-- Current balance & total transactions cards-->
            <div class="row vertical-modern-dashboard">
            <input type="hidden" id="estasinput" name="estasinput">

          
                <!--loadin de mapa-->
            <div id="cargando" style="display:none;">
                <img src="img/world.svg" style="position: absolute;z-index: 2000;" width="170">
            </div>

            


            <!--img src="img/tormenta1.png" style="position: relative;z-index: 1000;float:right;" width="100"-->
                <!--mapa -->
                <div id="cont" style="width:100%;height:100%;">



                    <?php if(!isMobile2()) { ?>

                      <div id="map" style="width:79%;"></div>
                      


                    <?php } else { ?>

                         <div id="map" style="width:100%;"></div>

                    <?php } ?>
               


              

              


              
              <!--div class="col s12 m1"></div-->


            </div>
        
      </div>

   


    </div>
   </div>
  <!-- Modal Structure -->

  <!--div id="online" class="modal modal-fixed-footer"  tabindex="-1" style="width:400px;background-image: url('img/prueba10.jpg');background-repeat: no-repeat;background-size: cover;"-->
  <div id="online" class="modal modal-fixed-footer"  tabindex="-1" style="width:400px;">
    <div class="modal-content">
      <h6 id="title-modal" style="color:#000;">Dispositivo <i class="material-icons">directions_car</i></h6><br>
       <h6 style="color:#000;">Selecciona dispositivo</h6>

          
        <select name="vehiculo" id="vehiculo" tabindex="-1" style="color:#fff;">
                    

                           
        </select>
   
    <div class="modal-footer" style="width:350px;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      <a class="modal-close waves-effect waves-light btn" id="localizar" style="background-color:black;"><i class="material-icons">location_on</i>Localizar</a>
    </div>
  </div>
</div>



<!-- Modal Structure -->
  <div id="configuraciones" class="modal modal-fixed-footer"  tabindex="-1" style="width:380px;height:400px;background-image: url('img/prueba1.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="modal-content">
      <h6 id="title-modal" style="color:#fff;">Configuraciones <i class="material-icons">directions_car</i></h6><br>
           
          <h6 class="card-title mb-0 " style="color:#fff;">Parking</h6>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="fijaubi" name="fijaubi">
                       <span class="lever"></span> On </label>
                   </div>

                    <hr style="margin-top:15px;">
                   <h6 class="card-title mb-0" style="color:#fff;"><b>Geocerca</b></h6>
                   <!-- Switch -->
             
                   <div class="switch">
                     <label> Off <input type="checkbox" id="activageocerca" name="activageocerca">
                       <span class="lever"></span> On </label>
                     <!--span id="geocercaactual" class="lever"></span--><br>
                    <center>
                    <br>
                     <table>
                    <thead>
                      <tr>
                          
                          <th><i class="material-icons" id='menos' style="cursor:pointer;font-size: 50px;color: lightyellow;">do_not_disturb_on</i></th>
                          <th><span id='geo' style="font-size:18px;color:#fff;">0 mtros.</span></th>
                          <th><i class="material-icons" id='mas'  style="cursor:pointer;font-size: 50px;color: #00bcd4;">add_circle</i></th>
                      </tr>
                    </thead>
                   </table>
                   </center>



                   </div>
               

   
    <div class="modal-footer" style="width:350px;background-color: black;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="color:#fff !important;">Cerrar</a>
     
    </div>
  </div>
</div>






</div>
@endsection


