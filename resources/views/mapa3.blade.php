@extends('layouts.app')

@section('content')
 


<?php  $llave=env('LLAVE_API_MAPS'); ?>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $llave; ?>&libraries=geometry"></script>

<script src="notificaciones/node_modules/socket.io-client/dist/socket.io.js"></script>
<!--script src="js/StreetViewButtons.js"></script-->


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

        #resplandorverde{   
               -moz-box-shadow: 0px 0px 30px red; 
               -webkit-box-shadow: 0px 0px 30px red; 
               box-shadow: 0px 0px 30px red;
               
               padding: 10px;
               width: 100%;
               margin: 40px;
            }

         #resplandorrojo{   
               -moz-box-shadow: 0px 0px 30px red; 
               -webkit-box-shadow: 0px 0px 30px red; 
               box-shadow: 0px 0px 30px red;
               
               padding: 10px;
               width: 100%;
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

        body{

        background-image: url('img/fondo-login.png');
        }

        /* .leaflet-control-attribution{

          display: none;
         }*/
  </style>


 <div id="main">
  <input type="hidden" name="dir" id="dir">
   <div class="row">
    
     <div class="col s12">
       <div class="container">
         <div class="section">
           <div class="row vertical-modern-dashboard">


             <div id="map" style="width:100%;height: 400px;"></div>


          

           </div>
         </div>
       </div>
     </div>
   </div>
   <!--div class="row">
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
   </div-->


 </div>

<script>
    // LOCATION IN LATITUDE AND LONGITUDE.
    var center = new google.maps.LatLng(19.45105, -99.125519);
    var circle;     

    function initialize() {
        // MAP ATTRIBUTES.
        var mapAttr = {
            center: center,
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.TERRAIN
        };

        // THE MAP TO DISPLAY.
        var map = new google.maps.Map(document.getElementById("map"), mapAttr);

       circle.setMap(null);

        circle = new google.maps.Circle({
            center: new google.maps.LatLng(19.4569485, -99.2138878),
            map: map,
            radius: 10000,          // IN METERS.
            fillColor: '#FF6600',
            fillOpacity: 0.3,
            strokeColor: "#FFF",
            strokeWeight: 0         // DON'T SHOW CIRCLE BORDER.
        });

         var icon = {
          url: "img/auto.png", // url
          scaledSize: new google.maps.Size(30, 40), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(0, 0) // anchor
      };

      const myLatLng = { lat: 19.457235, lng: -99.2135131 };


       marker= new google.maps.Marker({
          position: myLatLng,
          map,
          title: "Hello World!",
          draggable: true
        });


       circle.bindTo('center', marker, 'position');



          /*map.addMarker({
                  lat:19.457235,
                  lng: -99.2135131,
                  icon:icon,
                  title: 'el auto se encuentra aquí',
                  infoWindow: {
                        content: 'dde',
                        maxWidth: 300
                       

                         },
                  draggable: true,

                  fences: [circle],
                  outside: function(m, f){

                   // console.log(m);
                    $("#resplandorrojo").css("display","");
                  }
                });*/


    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</script>

 


@endsection


