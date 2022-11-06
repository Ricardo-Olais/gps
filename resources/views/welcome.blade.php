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
       p{

        font-size: 18px;
       }
   </style>

  <div class="col s12 m2 l12" style="background-color: #fff;">
   
            <center>
            <span style="color:#00bcd4;font-size: 18px;"> Expertos en localización vehicular, controla tus vehículos con nuestro centro de monitoreo.</span>
              <video  autoplay muted loop id="video"  src="img/home/home.mp4"></video>

              <div id="iniciogps" style="margin-top:-45px;">
                  <a href="dispositivos" class="waves-effect waves-light btn" style="border-radius: 7px;">Prueba Gratis 1 mes</a>
              </div>
            </center>
      
  </div>


<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <center><h3 style="font-weight: bold;font-family: secondary; font-size: 25px;color:#00bcd4">GPS tracker (Conóce en donde se encuentran tus seres queridos.)</h3></center>
</div>

 <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <p style="text-align: justify;">
         <span style="color:#00bcd4;">Gps Tracker</span> de Localizaminave es una aplicación que permite instalarse en dispositivos android para obtener y monitorear la ubicación de personas, de tu auto. No se requiere comprar ningún localizador, solo instala en el dispositivo que desees localizar y rastrea desde la plataforma <a href="https://localizaminave.com/" style="color:#00bcd4;">https://localizaminave.com</a>

         <center>
              <a href="https://play.google.com/store/apps/details?id=family.tracker.my&hl=es_MX"> <img src="img/play.png" width="30%" style="margin-top: 10px;"></a>

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




  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #00bcd4;">
            
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
<div class="row">
    
        <div class="content-wrapper-before blue-grey lighten-5"></div>
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">






  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #00bcd4;">
           
               <center><h5 style="color:#fff !important;">Conoce nuestros planes</h5></center>
          

         </div>
      </div>

       <div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_not_fixed</i>Prueba Gratuita (1 mes)</b></h4></center><br>
              
              
               <p style="text-align:justify;">Conoce la ubicación de tus seres queridos, de tu auto, motocicleta, en tiempo real.<br>
               Podrás tener la tranquilidad de saber dónde se encuentran en todo momento a través de tu PC o smartphone.</p>

              <center><img src="img/home/real.png" width="50%"></center>

             <a href='dispositivos' class="btn waves-effect waves-light" type="submit" name="action" style="width:100%;background-color: #fff;color:#000;">Conseguir Plan
                <i class="material-icons right">send</i>
              </a>


            </div>
         </div>
      </div>


      <div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_fixed</i>Plan Mensual $29.00 MXN</b></h4></center><br>
              
              
               <p style="text-align:justify;">Conoce la ubicación de tus seres queridos, de tu auto, motocicleta, en tiempo real.<br>
               Podrás tener la tranquilidad de saber dónde se encuentran en todo momento a través de tu PC o smartphone.</p>

              <center><img src="img/home/real.png" width="50%"></center>

             <a href='dispositivos' class="btn waves-effect waves-light" type="submit" name="action" style="width:100%;background-color: black;">Conseguir Plan
                <i class="material-icons right">send</i>
              </a>


            </div>
         </div>
      </div>

          <div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_fixed</i>Plan anual $299.00 MXN</b></h4></center><br>
              
               <p style="text-align:justify;">Conoce la ubicación de tus seres queridos, de tu auto, motocicleta, en tiempo real.<br>
               Podrás tener la tranquilidad de saber dónde se encuentran en todo momento a través de tu PC o smartphone.</p>

              <center><img src="img/home/real.png" width="50%"></center>

              <a href='dispositivos' class="btn waves-effect waves-light" type="submit" name="action" style="width:100%;">Conseguir Plan
                <i class="material-icons right">send</i>
              </a>





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


