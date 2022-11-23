@extends('layouts.app')

@section('content')
 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
<script type="text/javascript">
  

  $(document).ready(function(){
   $('.fixed-action-btn').floatingActionButton();


  });
</script>
<style type="text/css">
   p{
      font-size: 18px;
   }
</style>

<div id="main" >
      <div class="row">

      

      
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">






  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #00bcd4;border-radius: 15px;">
           
               <center><h5 style="color:#fff !important;">¿Cómo funciona?</h5></center>
          

         </div>
      </div>


      <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">1.- Regístrate</h4>
              
              
               <p style="text-align:justify;">Únete a nosotros, ve al apartado de registro, ingresa tus datos (son pocos).
               </p>

               <img src="img/home/paso-1.jpg" width="100%" style="margin-top: 10px;">


            </div>
         </div>
      </div>

       <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">2.- Instalación de aplicación android</h4>
              
              
              <p style="text-align:justify;">
               Descarga la aplicación <span style="color:#00bcd4;">GPS TRACKER</span>, debes de instalarla en algún equipo celular con sistema operativo Android (este dispositivo es el que se pondrá en el vehículo a rastrear), asegurate que tenga un chip con los datos encendidos, es importante para la comunicación con nuestros servidores.</p>
               <center>
              <a href="https://play.google.com/store/apps/details?id=family.tracker.my&hl=es_MX"> <img src="img/play.png" width="50%" style="margin-top: 10px;"></a>

              <img src="img/home/paso-4.png" width="40%" style="margin-top: 10px;"></center>


            </div>
         </div>

      </div>

          <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">3.- Regístra tus dispositivos en la plataforma</h4>
              
              <p style="text-align:justify;">
               En el menú, selecciona mis dispositivos, haz clic en el botón agregar vehículo (+), una vez registrado escanea el código QR generado con la aplicación <span style="color:#00bcd4;">gps tracker</span> de localizaminave.com.mx, con esto se vinculará el equipo celular con nuestros servidores.</p>

               <img src="img/home/paso-2.jpg" width="100%" style="margin-top: 10px;">


            </div>
         </div>
      </div>

        <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">4.- Pagar Licencia</h4>
              
              
              <p style="text-align:justify;">

              Seleccionamos Pagar Licencia y elegimos el plan que más te convenga, una vez pagada, abrir la aplicación <span style="color:#00bcd4;">gps tracker</span> (la que instalaste en tu dispositivo) y dar clic al botón de LOCALIZAME, en el menu Rastrear del sitio web podrás seleccionar tu vehículo a localizar.</p>

              
               <img src="img/imgapp.jpeg" width="100%" style="margin-top: 10px;">

            </div>
         </div>
      </div>
    

      

       


      



      


</div>
</div>
</div>
</div>



</div>
</div>


 


@endsection


