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


<div id="map" style="width: 100%; height: 600px;"></div>
<script>


  var socket = io('http://187.245.4.2:3000');

  var messages = document.getElementById('messages');

  


  const map = L.map('map').setView([0, 0], 17);

  const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

socket.on('message', function(msg) {

            console.log(msg);
  const marker = L.marker([msg.longitud, msg.latitud]).addTo(map).bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

  const popup = L.popup()
    .setLatLng([msg.longitud, msg.latitud])
    .setContent('Vehículo Ricardo')
    .openOn(map);


  });

 

</script>




 


@endsection


