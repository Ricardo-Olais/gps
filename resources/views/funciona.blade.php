@extends('layouts.app')

@section('content')
 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
<script type="text/javascript">
  

  $(document).ready(function(){
   $('.fixed-action-btn').floatingActionButton();


  });
</script>

<div id="main" >
      <div class="row">

      <div class="fixed-action-btn">
           <a class="btn-floating btn-large red">
             <i class="large material-icons">sms</i>
           </a>
           <ul>
             <li><a class="btn-floating" style="background-color: #66E209;"><iconify-icon icon="mdi:whatsapp" style='font-size: 40px';></iconify-icon></a></li>
             <li><a class="btn-floating  darken-1" style="background-color: #09A0E2;"><iconify-icon icon="fa-brands:facebook-messenger" style='font-size: 40px';></iconify-icon></a></li>
             <!--li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
             <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li-->
           </ul>
         </div>


        <div class="content-wrapper-before blue-grey lighten-5"></div>
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
              
              
               Únete a nosotros, ve al apartado de registro, ingresa tus datos (son pocos).

               <img src="img/home/paso-1.jpg" width="100%">


            </div>
         </div>
      </div>

          <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">2.- Regístra tus dispositivos</h4>
              
              <p style="text-align:justify;">
               En mi cuenta, selecciona mis vehículos, haz clic en el botón agregar vehículo (+), una vez registrado, descarga nuestra aplicación. </p>

               <img src="img/home/paso-2.jpg" width="100%">


            </div>
         </div>
      </div>

        <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">3.- Instalación fácil</h4>
              
              
              <p style="text-align:justify;">
               Una vez descargada la aplicación, debes de instalarla en algún equipo celular con sistema operativo Android (este dispositivo es el que se pondrá al vehículo a rastrear), asegurate que tenga un chip con los datos encendidos, es importante para la comunicación con nuestros servidores.</p>

              <img src="img/home/paso-4.png" width="100%">


            </div>
         </div>
      </div>

       <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">4.- Configuración de aplicación Android</h4>
              
              
              <p style="text-align:justify;">
              Una vez instalada la aplicación, ingresa el id de dispositivo que aparece al abrir la aplicación instalada ejemplo: 13709f71c31ya970, ingresamos ese identificador en el apartado mis vehículos y damos clic en el botón de guardar, saldrá una ventana de confirmación.</p>

               



            </div>
         </div>
      </div>

        <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">5.- Pagar Licencia</h4>
              
              
              <p style="text-align:justify;">
              Seleccionamos Pagar Licencia y elegimos el plan que más te convenga, una vez pagada, abrir la aplicación gps (la que instalaste en tu dispositivo) y dar clic al botón de LOCALIZAME, en el apartado Rastrear del sitio web podrás seleccionar tu vehículo a localizar.</p>


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


