@extends('layouts.app')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.carousel').carousel();
    $('.fixed-action-btn').floatingActionButton();


     var instance = M.Carousel.init({
    fullWidth: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true
  });

  $('.carousel').carousel({
    padding: 200    
});
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 7000);
}




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


   <style type="text/css">
       
       #video{

        width: 100%;
        outline:none;
        border:none;
       
       }
   </style>

  <div class="col s12 m2 l12" style="background-color: #fff;">
   
            <center>
            <span style="color:#00bcd4;"> Expertos en localización vehicular, controla tus vehículos con nuestro centro de monitoreo, solo pagas por el uso de la plataforma.</span>
              <video  autoplay muted loop id="video"  src="img/home/home.mp4"></video>

              <div id="iniciogps" style="margin-top:-45px;">
                  <a class="waves-effect waves-light btn">Comenzar Ahora</a>
              </div>
            </center>
      
  </div>


<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <center><h2 style="font-weight: bold;font-family: secondary; font-size: 30px;">GPS tracker para un adecuado monitoreo de vehículos</h2></center>
</div>

 <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         
            
             
        <p style="text-align: justify;">
        Dale una segunda vida a tu celular, úsalo como GPS tracker, nuestra aplicación se instala fácilmente en equipos con sistema Android. Es importante que cuente con datos para que se comunique con  nuestros servidores.
        </p>

        <p style="text-align: justify;margin-top: 15px;">
        Antes de adentrarnos a los detalles y beneficios que puede brindarle nuestro servicio de GPS, es necesario que sepa que un GPS tracker no funciona por sí solo, para acceder a los datos de ubicación, métricas de rendimiento y demás herramientas, deberá implementar una plataforma de control vehicular con sistema GPS tracker <span style="color:#00bcd4;">(localizaminave.com.mx)</span>
        </p>

        <p style="text-align: justify;margin-top: 15px;">
        Dicho esto, un GPS tracker, conocido también como GPS para carros o rastreador GPS, es un dispositivo que se instala en los vehículos con la finalidad de localizarlos, a través de señales móviles, en cualquier lugar donde se encuentren.
        </p>

        <p style="text-align: justify;margin-top: 15px;">
        La función del GPS tracker es simple, se coloca este dispositivo a las unidades que desee monitorear y tendrá acceso a la ubicación precisa de ellas. Esto es posible gracias a que la señal enviada por GPS viaja a gran velocidad, lo que le brinda los datos de ubicación y demás de manera inmediata.
        </p>
        
            
        
      </div>




  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #00bcd4;border-radius: 15px;">
            
              <center><b><h5 style="color:#fff;">Funciones de sistema GPS tracker</h5></b></center>
        
         </div>
    </div>


      <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h2 class="card-title mb-0"><b>Ubicación en tiempo real</b></h2></center>
              
              
              <p style="text-align: justify;">
               Es lógico que si desea adquirir un sistema GPS tracker lo que requiere conocer es la ubicación en tiempo real sobre los lugares a los que se desplazan sus vehículos, esto puede lograrse al instalar el dispositivo GPS en cada una de las unidades que quiera monitorear y los datos de ubicación podrá conocerlos por medio de la plataforma.
              </p>


              <img src="img/home/real.png" width="100%">

            </div>
         </div>
      </div>

      <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b>Historial de rutas</b></h4></center>
              
              
               <p style="text-align: justify;">
                  Conozca el histórico de recorridos de los vehículos, puedes consultar hasta 1 año de histórico, podrás descargar la información en un reporte excel.
               </p>

            <img src="img/home/rutas.png" width="100%">
            <div id="espacio" style="width:100%;height:60px;"></div>

            </div>
         </div>
      </div>




    <div class="col s12 m5 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b>Estado actual del vehículo</b></h4></center>
              
              
               <p style="text-align: justify;">
                  Verifique el estatus de sus vehículos, conozca si se encuentran con o sin movimiento, detecte las alertas de parking, alertas de geocercas.
               </p>

                <img src="img/home/vehiculos.png" width="100%">
            </div>
         </div>
      </div>


      <div class="col s12 m5 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b>Comparte la ubicación</b></h4></center>
              
              
               <p style="text-align: justify;">
                 Comparte la ubicación de tus vehículos con las personas que desees, sin tiempo limite, la ubicación se comparte en tiempo real.
               </p>

            <center>
            <img src="img/ubica.jpg" width="50%" style="margin-top: 10px;">
            </center>
   
               
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


