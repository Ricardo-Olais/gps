@extends('layouts.app')

@section('content')
 

<link rel="stylesheet" href="css/leaflet.css"/>
<script src="js/leaflet.js"></script>


<!--script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script-->

<?php  $llave=env('LLAVE_API_MAPS'); ?>


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

  <style>
    /* Fixes Google Mutant Empty attribution */
    .leaflet-bottom.leaflet-left,
    .leaflet-bottom.leaflet-right {
      margin-bottom: initial !important;
    }

    /* Make Google Logo/ToS/Feedback links clickable */
    .leaflet-google-mutant a,
    .leaflet-google-mutant button {
      pointer-events: auto;
    }

    /* Move Google ToS/Feedback to the top */
    .leaflet-google-mutant .gmnoprint,
    .leaflet-google-mutant .gm-style-cc {
      top: 0;
      bottom: auto !important;
    }
  </style>

  <style type="text/css">
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 500px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

.highcharts-credits{

    display: none;
}
.highcharts-title{
        display: none !important;

}

.highcharts-no-tooltip{

    display: none !important;
}
</style>


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
                 
                 <!--span id="msjalerta"></span-->
                 <center>
                   <div id="resplandorverde" class="parpadea" style="display:none;font-size: 20px;width: 80%;text-align: center;">Alerta de Parking <i class="material-icons" style="color:red;padding: 2px;">notifications</i>
                       </strong>
                     </div>

                      <div id="resplandorrojo" class="parpadea" style="display:none;font-size: 20px;width: 80%;text-align: center;">Alerta de Geocerca <i class="material-icons" style="color:red;padding: 2px;">notifications</i>
                       </strong>
                     </div>
                  </center>
               </div>
             </div>


               <div class="col s12 m2 l5 animate fadeRight">
               <div class="card">
                 <div class="card-content">
                  <center><span id="estas" style="font-size:16px;color:#00bcd4;"></span></center>
                   <h4 class="card-title mb-0">Ubicación actual <i class="material-icons" id='sta'>my_location</i> <span id="desEsta"></span>


                   </h4>

                  
                   <div class="input-field col s12">
                     <select name="vehiculo" id="vehiculo">
                       <option value="" disabled selected>Selecciona Dipositivo</option>
                     </select>
                     <label>Dispositivo</label>
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


               <div class="col s12 m2 l4 animate">
               <div class="card">
                 <div class="card-content">

                  <center>
                    <div id="chart" style="width:90%;height:220px;display: block;"></div>

                   </center>
                  
                 </div>
               </div>
             </div>


             <div class="col s12 m2 l3 animate fadeRight">
               <div class="card">
                 <div class="card-content">
                   

                   <h4 class="card-title mb-0 " >Fijar ubicación</h4>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="fijaubi" name="fijaubi">
                       <span class="lever"></span> On </label>
                   </div>
                   <hr style="margin-top:15px;">
                   <h4 class="card-title mb-0"><b>Geocerca</b></h4>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="activageocerca" name="activageocerca">
                       <span class="lever"></span> On </label>
                     <!--span id="geocercaactual" class="lever"></span--><br>
                    <center>
                     <table>
                    <thead>
                      <tr>
                          
                          <th><i class="material-icons" id='menos' style="cursor:pointer;font-size: 50px;color: red;">do_not_disturb_on</i></th>
                          <th><span id='geo' style="font-size:18px;">0 mtros.</span></th>
                          <th><i class="material-icons" id='mas'  style="cursor:pointer;font-size: 50px;color: #00bcd4;">add_circle</i></th>
                      </tr>
                    </thead>
                   </table>
                   </center>



                   </div>
                 </div>
               </div>
             </div>




             <div class="col s12 m2 l12 animate fadeRight">
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

 </div>

 <script type="text/javascript">
    
    </script>

<script>

 
 $(document).ready(function(){

  var valorgeo=0;
  var map;
 


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

       //  $("#share").css("display","none");
         $("#ubicacion").html("");
         $("#share-ubi").html("");
        

         imei=$(this).val();

         //invocamos al socket
         map.setZoom(16);

         $("#chart").css("display","");

         $.post("inicializasocket",{_token:token,imei:imei});
        

         $("#colorgps").css("color","#37E209");
          $("#share").css("display","");

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
              

               $("#resplandorverde").css("display","none");
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
              

               $("#resplandorverde").css("display","none");
             }

        });

        //activar geocerca 
             $("#activageocerca").click(function(){

             var auxDir=$("#dir").val();

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
              

              $("#resplandorrojo").css("display","none");
             }

        });


      $('.tooltipped').tooltip();
            $('.modal').modal();
            $('.fixed-action-btn').floatingActionButton();

            

            $(".reportar").click(function(){

                window.location.href='https://sfpya.edomexico.gob.mx/controlv/rev/CVRoboVehiculo.jsp';

            });



//fin de controles
  var socket = io('https://localizaminave.com:3000'); //187.245.4.2


  var marker;
  var theMarker = {};
  var marker_actual = {};
  var routingControl = null;



  var messages = document.getElementById('messages');

 


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

 //para el velocimetro

   Highcharts.chart("chart", {
  chart: {
    type: "gauge",
    plotBackgroundColor: null,
    plotBackgroundImage: null,
    plotBorderWidth: 0,
    plotShadow: false,
    height: "80%"
  },

  title: {
    text: "Velocidad"
  },

  pane: {
    startAngle: -90,
    endAngle: 89.9,
    background: null,
    center: ["50%", "75%"],
    size: "110%"
  },

  // the value axis
  yAxis: {
    min: 0,
    max: 200,
    tickPixelInterval: 72,
    tickPosition: "inside",
    tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
    tickLength: 20,
    tickWidth: 2,
    minorTickInterval: null,
    labels: {
      distance: 20,
      style: {
        fontSize: "14px"
      }
    },
    plotBands: [
      {
        from: 0,
        to: 120,
        color: "#55BF3B", // green
        thickness: 20
      },
      {
        from: 120,
        to: 160,
        color: "#DDDF0D", // yellow
        thickness: 20
      },
      {
        from: 160,
        to: 200,
        color: "#DF5353", // red
        thickness: 20
      }
    ]
  },

  series: [
    {
      name: "Speed",
      data: [0],
      tooltip: {
        valueSuffix: " km/h"
      },
      dataLabels: {
        format: "{y} km/h",
        borderWidth: 0,
        color:
          (Highcharts.defaultOptions.title &&
            Highcharts.defaultOptions.title.style &&
            Highcharts.defaultOptions.title.style.color) ||
          "#333333",
        style: {
          fontSize: "14px"
        }
      },
      dial: {
        radius: "80%",
        backgroundColor: "gray",
        baseWidth: 12,
        baseLength: "0%",
        rearLength: "0%"
      },
      pivot: {
        backgroundColor: "gray",
        radius: 6
      }
    }
  ]
});
    



    //fin

 



  var circle;
  var browserLat;
  var browserLong;

  socket.on('ubicacion', function(msg) {

      

      if(msg.imei==imei){

      $("#comparte").click(function(){

                window.location.href='https://api.whatsapp.com/send?text=Hola, estoy en camino sigue mi viaje, en estos momentos me encuentro en '+msg.direccion+ ', consulta https://localizaminave.com/compartiendo?imei='+imei;

            });



      if(msg.msjalerta1!=""){

        $("#resplandorverde").css("display","");
        $("#msjalerta").html(msg.msjalerta1);
      }
      else{
        $("#resplandorverde").css("display","none");
        $("#msjalerta").html("");

      }


      /*if(msg.msjalerta2!=""){

        $("#resplandorrojo").css("display","");
        $("#msjalerta").html(msg.msjalerta2);
      
      }else{

        $("#resplandorrojo").css("display","none");
        $("#msjalerta").html("");
      }*/


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

    }




      if(msg.imei==imei){

        $("#dir").val(msg.direccion);



        if(msg.pila<15){

            $("#ubicacion").html(msg.direccion+ " , <i class='material-icons' style='font-size:16px;color:red;'>battery_alert</i>"+msg.pila+ "%, último registro: "+msg.fecha);

        }else{

             $("#ubicacion").html(msg.direccion+ " , <i class='material-icons' style='font-size:16px;color:#37E209;'>battery_std</i>"+msg.pila+ "%, último registro: "+msg.fecha);

        }


    velocidad=Number(msg.velocidad);

    if(velocidad>1){

      $("#sta").css("color","#00bcd4");
      $("#desEsta").html("En movimiento");
    }else{

      $("#sta").css("color","red");
      $("#desEsta").html("Detenido");
    }

    /*if(velocidad<3){

      velocidad=0;
    }*/

    //para el velocimetro

   Highcharts.chart("chart", {
  chart: {
    type: "gauge",
    plotBackgroundColor: null,
    plotBackgroundImage: null,
    plotBorderWidth: 0,
    plotShadow: false,
    height: "80%"
  },

  title: {
    text: "Velocidad"
  },

  pane: {
    startAngle: -90,
    endAngle: 89.9,
    background: null,
    center: ["50%", "75%"],
    size: "110%"
  },

  // the value axis
  yAxis: {
    min: 0,
    max: 200,
    tickPixelInterval: 72,
    tickPosition: "inside",
    tickColor: Highcharts.defaultOptions.chart.backgroundColor || "#FFFFFF",
    tickLength: 20,
    tickWidth: 2,
    minorTickInterval: null,
    labels: {
      distance: 20,
      style: {
        fontSize: "14px"
      }
    },
    plotBands: [
      {
        from: 0,
        to: 120,
        color: "#55BF3B", // green
        thickness: 20
      },
      {
        from: 120,
        to: 160,
        color: "#DDDF0D", // yellow
        thickness: 20
      },
      {
        from: 160,
        to: 200,
        color: "#DF5353", // red
        thickness: 20
      }
    ]
  },

  series: [
    {
      name: "Speed",
      data: [velocidad],
      tooltip: {
        valueSuffix: " km/h"
      },
      dataLabels: {
        format: "{y} km/h",
        borderWidth: 0,
        color:
          (Highcharts.defaultOptions.title &&
            Highcharts.defaultOptions.title.style &&
            Highcharts.defaultOptions.title.style.color) ||
          "#333333",
        style: {
          fontSize: "14px"
        }
      },
      dial: {
        radius: "80%",
        backgroundColor: "gray",
        baseWidth: 12,
        baseLength: "0%",
        rearLength: "0%"
      },
      pivot: {
        backgroundColor: "gray",
        radius: 6
      }
    }
  ]
});
    



    //fin

    


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


    console.log(msg.longitud_geocerca);

  //geocerca  obtener la latitud y longitud de geocerca y pintarlas
   if (circle != undefined) {
      map.removeLayer(circle);
    };


  if(msg.latitud_geocerca!= undefined){


   var circleCenter = [msg.latitud_geocerca, msg.longitud_geocerca];

    var circleOptions = {
     color: '#00bcd4',
     fillColor: '#fff',
     fillOpacity: .1
  }

    $("#geo").html(msg.geocerca+ " mtros.");

    valorgeo=msg.geocerca;

    circle = L.circle(circleCenter,Number(msg.geocerca), circleOptions); //500 metros de radio - 1 km de diametro
    circle.addTo(map);

  }

    //fin de geocerca

   // L.circle([50.5, 30.5], {radius: 200}).addTo(map);





    if (theMarker != undefined) {
              map.removeLayer(theMarker);
        };

      if (marker_actual!= undefined) {
              map.removeLayer(marker_actual);
       };


      lat=msg.latitud;
      long=msg.longitud
      //https://www.google.com/maps?layer=c&cbll=19.5441708,-99.0785885
    //  L.streetView().addTo(map);

     // map.setZoom(16);

    //rotationAngle: 146

      navigator.geolocation.getCurrentPosition(function(position) {
        browserLat =  position.coords.latitude;
        browserLong = position.coords.longitude;

        recibeubica(browserLat,browserLong);
  
      });

      function recibeubica(browserLat,browserLong){

          console.log(browserLat);
          console.log(browserLong);
      
       
     /* marker_actual = L.marker([browserLat,browserLong],{icon: customIcon2, draggable: false,
       autoPan: true}).addTo(map);
       marker_actual.bindPopup("Tú estás aquí");*/
     //  map.setView([browserLat,browserLong], 18); 


       if (routingControl != null) {
            map.removeControl(routingControl);
            routingControl = null;
        }

        var distancia = (map.distance([msg.longitud, msg.latitud], [browserLat,browserLong]))/1000;

        console.log(distancia);

        $("#estas").html("Estás a "+distancia.toFixed(2)+" Km del dispositivo");



       /* routingControl=L.Routing.control({
          waypoints: [
            L.latLng(browserLat, browserLong),
            L.latLng(msg.longitud, msg.latitud)
          ],
          lineOptions: {
              styles: [{color:'#00bcd4', opacity: 1, weight: 5}]
           }
        }).addTo(map);*/



       }
 



   theMarker = L.marker([msg.longitud, msg.latitud],{icon: customIcon, draggable: false,
      autoPan: true}).addTo(map).bindPopup('<b>Dispositivo '+msg.alias+' se encuentra en </b><br />'+msg.direccion+ ', conductor: '+msg.conductor).openPopup();



   console.log("aaa ="+msg.latitud_geocerca);

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

    // console.log("distancia geocerca"+d);

       /* theMarker.on('drag', function(e) {
        var d = map.distance(e.latlng, circle.getLatLng());
        var isInside = d < circle.getRadius();
        console.log(isInside);
        circle.setStyle({
            fillColor: isInside ? 'green' : '#f03'
        })
    });*/

  

    const popup = L.popup()
    .setLatLng([msg.longitud, msg.latitud])
    .setContent(msg.alias+ "<center><img src='https://localizaminave.com/img/"+msg.tipo+"' style='width: 20px; height: 30px;'></center>")
    .openOn(map);

    }


  });



});
 

</script>

 


@endsection

