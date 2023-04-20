@extends('layouts.app')

@section('content')
 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
<script async src="https://js.stripe.com/v3/buy-button.js"></script>
<script type="text/javascript">
  

  $(document).ready(function(){
   $('.fixed-action-btn').floatingActionButton();


  });
</script>
<style type="text/css">
   p{
      font-size: 18px;
   }
    body{

        background-image: url('img/fondo-login.png');
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
         <div class="card" style="background-color: #00bcd4;border-radius: 15px;padding: 1px;">
           
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
               Descarga la aplicación <span style="color:#00bcd4;">Gps Tracker</span>, debes de instalarla en algún equipo celular con sistema operativo Android (este dispositivo es el que se pondrá en el vehículo a rastrear), asegurate que tenga un chip con los datos encendidos, es importante para la comunicación con nuestros servidores.</p>
               <center>
              <a href="https://play.google.com/store/apps/details?id=com.localizaminave.gps" target="_blank"> <img src="img/play.png" width="50%" style="margin-top: 10px;"></a>

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
               En el menú, selecciona mis dispositivos, haz clic en el botón agregar dispositivo (+), una vez registrado escanea el código QR generado con la aplicación <span style="color:#00bcd4;">Gps Tracker</span> de localizaminave, con esto se vinculará el equipo celular con nuestros servidores.</p>

               <img src="img/home/paso-2.jpg" width="100%" style="margin-top: 10px;">


            </div>
         </div>
      </div>

        <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <!--h4 class="card-title mb-0">4.- Pagar Licencia y Licencia gratuita</h4-->
                <h4 class="card-title mb-0">4.- Habilitar aplicación Gps Tracker</h4>
              
              
              <p style="text-align:justify;">

              Abrir la aplicación <span style="color:#00bcd4;">gps tracker</span> (la que instalaste en tu dispositivo) y dar clic al botón de LOCALIZAME con esto el dispositivo comenzará a enviar métricas gps, en el menu Rastrear del sitio web podrás seleccionar tu vehículo a localizar, así de fácil, gracias por ser parte de localiza mi nave</p>

              <center>
               <br>
                <stripe-buy-button
                                 buy-button-id="buy_btn_1My6UyA94PugK9gPoWX1R6XA"
                                 publishable-key="pk_live_51My4BjA94PugK9gPVi42fynUV5Z1ytdMU1DAqHC6Zsie4QHefYZ2hirnb2QBw73Xpkr2kd4pr4sxcrR2eH9r0rM50095ZYctPa"
                               >
                 </stripe-buy-button></center>

              
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


