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


   <div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect" style="color:#fff !important;">Comienza ahora</a>
    </div>
    <div class="carousel-item white white-text" href="#one!" style="background-image:url('img/2mis beneficios-02.png');background-repeat: no-repeat;background-size:  1100px 250px;">
      <!--h2>Localiza mi nave </h2>
      <p class="orange-text">Expertos en localización vehicular</p-->
    </div>
    <div class="carousel-item white white-text" href="#two!" style="background-image:url('img/3mis beneficios-03.png');background-repeat: no-repeat;background-size: 1100px 250px;">
      <!--h2>Localiza mi nave </h2>
      <p class="orange-text">Expertos en localización vehicular</p-->
    </div>
    <div class="carousel-item white white-text" href="#three!" style="background-image:url('img/2mis beneficios-04.png');background-repeat: no-repeat;background-size:  1100px 250px;">
      <!--h2>Localiza mi nave</h2>
      <p class="orange-text">Expertos en localización vehicular</p-->
    </div>
    <div class="carousel-item white white-text" href="#four!" style="background-image:url('img/2mis beneficios-05.png');background-repeat: no-repeat;background-size:  1100px 250px;">
      <!--h2>Localiza mi nave</h2>
      <p class="orange-text">Expertos en localización vehicular</p-->
    </div>

     <div class="carousel-item white white-text" href="#four!" style="background-image:url('img/2mis beneficios-06.png');background-repeat: no-repeat;background-size:  1100px 250px;">
      <!--h2>Localiza mi nave</h2>
     <p class="orange-text">Expertos en localización vehicular</p-->
    </div>

     <div class="carousel-item white white-text" href="#four!" style="background-image:url('img/2mis beneficios-07.png');background-repeat: no-repeat;background-size: 1100px 250px;">
      <!--h2>Localiza mi nave</h2>
     <p class="orange-text">Expertos en localización vehicular</p-->
    </div>
  </div>


<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <center><h2 style="font-weight: bold;font-family: secondary; font-size: 30px;">GPS tracker para un adecuado monitoreo de vehículos</h2></center>

<p style="text-align: justify;">
Antes de adentrarnos a los detalles y beneficios que puede brindarle su GPS tracker a su empresa, es necesario que sepa que un GPS tracker no funciona por sí solo, para acceder a los datos de ubicación, métricas de rendimiento y demás herramientas, deberá implementar una plataforma de control vehicular con sistema GPS tracker. 
</p>

<p style="text-align: justify;">
Dicho esto, un GPS tracker, conocido también como GPS para carros o rastreador GPS, es un dispositivo que se instala en los vehículos con la finalidad de localizarlos, a través de señales móviles, en cualquier lugar donde se encuentren.
</p>

<p style="text-align: justify;">
La función del GPS tracker es simple, se coloca este dispositivo a las unidades que desee monitorear y tendrá acceso a la ubicación precisa de ellas. Esto es posible gracias a que la señal enviada por GPS viaja a gran velocidad, lo que le brinda los datos de ubicación y demás de manera inmediata.
</p>


</div>


</div>



  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #00bcd4;border-radius: 15px;">
            <div class="card-content">
              <center> <h5 style="color:#fff !important;"><b>Funciones de una plataforma de control vehicular con sistema GPS tracker</h5></b></center>
        
            </div>
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
               <center><h4 class="card-title mb-0"><b>Historial de rutas y kilometrajes</b></h4></center>
              
              
               <p style="text-align: justify;">
                  Conozca el histórico de recorridos o la cantidad de kilómetros de las unidades de su flota vehicular y verifique que las entregas previamente planificadas se han cumplido en el tiempo establecido
               </p>

            <img src="img/home/rutas.png" width="100%">


            </div>
         </div>
      </div>




   



       <div class="col s12 m5 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b>Estado actual del vehículo</b></h4></center>
              
              
               <p style="text-align: justify;">
                  Verifique el uso adecuado que le están dando sus choferes a sus unidades, conozca si éstas se encuentran encendidas o apagadas, con o sin movimiento.
               </p>

                <img src="img/home/vehiculos.png" width="100%">
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


