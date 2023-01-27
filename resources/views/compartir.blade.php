@extends('layouts.app')

@section('content')
 

<link rel="stylesheet" href="css/leaflet.css"/>
<script src="js/leaflet.js"></script>


<!--script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script-->



<script src="notificaciones/node_modules/socket.io-client/dist/socket.io.js"></script>

<link rel="stylesheet" href="css/leaflet-control-condended-attribution.css" />
<script type="text/javascript" src="js/leaflet-control-condended-attribution.js"></script>
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

       p{

        font-size: 18px;
       }

        /* .leaflet-control-attribution{

          display: none;
         }*/
  </style>

  <script type="text/javascript">


      var imei="<?php echo $_REQUEST['imei'];?>";

    

      
  </script>


 <div id="main">
  <input type="hidden" name="dir" id="dir">
   <div class="row">
    
     <div class="col s12">
       <div class="container">
         <div class="section">
           <div class="row vertical-modern-dashboard">
             <div id="map" style="width:100%;height: 400px;"></div>
             <div class="col s12 m2 l12 animate fadeRight">
               <div class="card">
               
               </div>
             </div>


               <div class="col s12 m2 l12 animate fadeRight">
               <div class="card">
                 <div class="card-content">
                   <h4 class="card-title mb-0">Ubicación actual <i class="material-icons" id='colorgps' style="color:green;">my_location</i>
                   </h4>
                 
                   <span id="ubicacion"></span>
                  
                   <div id="espacio">
                     <p style="color:#fff;">----</p>
                   </div>
                 </div>
               </div>
             </div>

             <!--- home-->

    <div class="col s12 m2 l12 animate fadeRight" style="color:#000;">


             <center><h3 style="font-weight: bold;font-family: secondary; font-size: 25px;color:#00bcd4">GPS tracker (Conóce en donde se encuentran tus seres queridos.)</h3></center>
          </div>

    <div class="col s12 m2 l12 animate fadeRight">

          <div class="card">
            <div class="card-content">
         <!-- Total Transaction -->
         <p style="text-align: justify;">
         <span style="color:#00bcd4;">Gps Tracker</span> de Localizaminave es una aplicación que permite instalarse en dispositivos android para obtener y monitorear la ubicación de personas, de tu auto. No se requiere comprar ningún localizador, solo instala en el dispositivo que desees localizar y rastrea desde la plataforma <a href="https://localizaminave.com/" style="color:#00bcd4;">https://localizaminave.com</a>

         <center>
              <a href="https://play.google.com/store/apps/details?id=family.tracker.my&hl=es_MX"> <img src="img/play.png" width="40%" style="margin-top: 10px;"></a>

              <img src="img/home/paso-4.png" width="20%" style="margin-top: 10px;"></center>

        </p>
         
         <p style="text-align: justify;">
         Conóce en donde se encuentran tus seres queridos, localizador familiar preciso y seguro, encuentra a sus seres queridos y sepa dónde están. Ahora es el mejor momento para garantizar la seguridad de su familia. Podrás localizarlos en tiempo real, compara nuestra plataforma.

        </p>
             
        <p style="text-align: justify;">
        Dale una segunda vida a tu celular, úsalo como GPS tracker, nuestra aplicación se instala fácilmente en equipos con sistema Android. Es importante que cuente con datos para que se comunique con  nuestros servidores.
        </p>

        <p style="text-align: justify;margin-top: 15px;">
        Antes de adentrarnos a los detalles y beneficios que puede brindarle nuestro servicio de GPS, es necesario que sepa que un GPS tracker no funciona por sí solo, para acceder a los datos de ubicación, métricas de rendimiento y demás herramientas, deberá implementar una plataforma de control vehicular con sistema GPS tracker <span style="color:#00bcd4;">(https://localizaminave.com)</span>
        </p>

        <p style="text-align: justify;margin-top: 15px;">
        Dicho esto, un GPS tracker, conocido también como GPS para carros o rastreador GPS, es un dispositivo que se instala en los vehículos con la finalidad de localizarlos, a través de señales móviles, en cualquier lugar donde se encuentren.
        </p>

        <p style="text-align: justify;margin-top: 15px;">
        La función del GPS tracker es simple, se coloca este dispositivo a las unidades que desee monitorear y tendrá acceso a la ubicación precisa de ellas. Esto es posible gracias a que la señal enviada por GPS viaja a gran velocidad, lo que le brinda los datos de ubicación y demás de manera inmediata.
        </p>
          </div>

        </div>
        
            
        
      </div>



             <!--- -->






          
          
           </div>
         </div>
       </div>
     </div>
   </div>
  


 </div>

<script>

 
 $(document).ready(function(){

 
$.post("inicializasocketcomparte",{_token:token,imei:imei});
 

//fin de controles
  var socket = io('https://localizaminave.com:3000'); //187.245.4.2
  var marker;
  var theMarker = {};

  var messages = document.getElementById('messages');


 


 // const map = L.map('map',{condensedAttributionControl: false}).setView([19.451054, -99.125519], 15);
 const map = L.map('map',{condensedAttributionControl: false}).setView([19.45105, -99.125519], 15);
  

  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="https://localizaminave.com">LocalizaMiNave</a>'
  }).addTo(map);




L.control.condensedAttribution({
  emblem: '<div class="emblem-wrap"><img src="https://localizaminave.com/images/color.png"/ width="50"></div>',
  prefix: '<a href="https://localizaminave.com" title="Travel time analysis by Motion Intelligence"></a>GPS'
}).addTo(map);
 


  socket.on('ubicacion', function(msg) {


     if(msg.pila<15){

            $("#ubicacion").html("El usuario: <b>"+msg.conductor+"</b> está compartiendo su ubicación en tiempo real, se encuentra en "+msg.direccion+ "  , <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);

        }else{

             $("#ubicacion").html("El usuario: <b>"+msg.conductor+"</b> está compartiendo su ubicación en tiempo real, se encuentra en "+msg.direccion+ "  , <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);

        }



     /*$("#ubicacion").html("El usuario: <b>"+msg.conductor+"</b> está compartiendo su ubicación en tiempo real, se encuentra en "+msg.direccion+ " , <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);*/


    var customIcon = new L.Icon({
      iconUrl: 'https://localizaminave.com/img/'+msg.tipo,
      iconSize: [30, 40],
      iconAnchor: [25, 50]
    });

 

    if (theMarker != undefined) {
              map.removeLayer(theMarker);
        };
      lat=msg.latitud;
      long=msg.longitud
      //https://www.google.com/maps?layer=c&cbll=19.5441708,-99.0785885
    //  L.streetView().addTo(map);

      theMarker = L.marker([msg.longitud, msg.latitud],{icon: customIcon, draggable: true,
    autoPan: true}).addTo(map).bindPopup('<b>Dispositivo '+msg.alias+' se encuentra en </b><br />'+msg.direccion+ ', conductor: '+msg.conductor).openPopup();

   


  

    const popup = L.popup()
    .setLatLng([msg.longitud, msg.latitud])
    .setContent(msg.alias+ "<center><img src='https://localizaminave.com/img/"+msg.tipo+"' style='width: 20px; height: 30px;'></center>")
    .openOn(map);

    


  });



});
 

</script>

 


@endsection


