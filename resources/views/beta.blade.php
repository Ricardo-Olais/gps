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

    .leaflet-routing-container{

        display: none !important;
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

             alert(auxDir);

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
  

  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="https://localizaminave.com">LocalizaMiNave</a>'
  }).addTo(map);




L.control.condensedAttribution({
  emblem: '<div class="emblem-wrap"><img src="https://localizaminave.com/images/color.png"/ width="50"></div>',
  prefix: '<a href="https://localizaminave.com" title="Travel time analysis by Motion Intelligence"></a>GPS'
}).addTo(map);



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

        /*var instancia = M.FormSelect.getInstance($("#vehiculo"));
        var valores = instancia.getSelectedValues();

                for (var i = 0; i < valores.length; i++) {
                       
                            imei=valores[i];

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


            $("#tem").html(msg.temperatura);
            $("#cli").html(msg.clima);
            $("#dir").val(msg.direccion);


            if(msg.pila<15){

               $("#miubicacion").html(msg.direccion+ ", <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);

               /* $("#miubicacion").html(msg.direccion+ ", temperatura: "+msg.temperatura+" , clima: "+msg.clima+" <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);*/

              }else{

                $("#miubicacion").html(msg.direccion+ ", <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);
                 /*$("#miubicacion").html(msg.direccion+ ", temperatura: "+msg.temperatura+" , clima: "+msg.clima+" <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);*/
             }

            velocidad=Number(msg.velocidad);

            if(velocidad>5){

                $("#vel").html(velocidad+ " Km/hra.");
                $("#enmov").css("color","#8EF046");
                $("#mov").html("En movimiento");
            }else{

                $("#vel").html("0 Km/hra.");
                $("#enmov").css("color","red");
                $("#mov").html("Detenido");
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

        $("#estas").html("Estás a "+distancia.toFixed(2)+" Km del dispositivo");


        var greenIcon = new L.Icon({
          iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/images/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });



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



       }

        theMarker = L.marker([msg.longitud, msg.latitud],{icon: customIcon, draggable: false,
          autoPan: true}).addTo(map).bindPopup('<b>Dispositivo '+msg.alias+' se encuentra en </b><br />'+msg.direccion+ ', conductor: '+msg.conductor).openPopup();

        if(msg.latitud_geocerca!=null) {
     

              var d = map.distance([msg.longitud, msg.latitud], circle.getLatLng());

              var isInside = d < circle.getRadius();

             

              if(isInside==false && msg.latitud_geocerca!=""){

                //alert("fuera de geocerca");
                $("#resplandorrojo").css("display","");

              }else{

                $("#resplandorrojo").css("display","none");
              }

        }


    const popup = L.popup()
    .setLatLng([msg.longitud, msg.latitud])
    .setContent(msg.alias+ "<center><img src='https://localizaminave.com/img/"+msg.tipo+"' style='width: 20px; height: 30px;'></center>")
    .openOn(map);






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
</style>



<div id="main">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
           <!-- Current balance & total transactions cards-->
            <div class="row vertical-modern-dashboard">
          
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
  <div id="modal1" class="modal modal-fixed-footer"  tabindex="-1" style="width:400px">
    <div class="modal-content">
      <h6 id="title-modal">Dispositivo <i class="material-icons">directions_car</i></h6><br>
       <h6>Selecciona dispositivo</h6>

          
        <select name="vehiculo" id="vehiculo" tabindex="-1">
                    

                           
        </select>
   
    <div class="modal-footer" style="width:350px;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      <a class="modal-close waves-effect waves-light btn" id="localizar" style="background-color:black;"><i class="material-icons">location_on</i>Localizar</a>
    </div>
  </div>
</div>







</div>
@endsection


