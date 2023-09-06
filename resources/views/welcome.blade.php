@extends('layouts.app')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

 <script async src="https://js.stripe.com/v3/buy-button.js"></script>





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
   
            <center><!--:#00bcd4-->
            <!--span style="color:#000;font-size: 18px;"> Expertos en localización vehicular, controla tus vehículos con nuestro centro de monitoreo.</span-->
              <video  autoplay muted loop id="video"  src="img/home/home.mp4"></video>


             

              <!--div id="iniciogps" style="margin-top:-45px;">
                  <a href="dispositivos" class="waves-effect waves-light btn" style="border-radius: 7px;">Totalmente Gratis</a>
              </div-->





            </center>
      
  </div>


<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <center><h3 style="font-weight: bold;font-family: secondary; font-size: 25px;color:#000">LL301 Rastreador GPS</h3></center>
</div>



<div class="col s12 m2 l12 animate fadeRight">

<p style="text-align: justify;">El LL301 es un rastreador GPS de activos 4G Cat 1 que permite un tiempo de espera ultralargo gracias a una batería de gran capacidad de 10 000 mAh y una carcasa duradera. 

<br><br>Con múltiples sistemas de posicionamiento y cobertura de señal interior y exterior, el dispositivo también admite alertas instantáneas de eventos atípicos como extracción del dispositivo, vibración, etc. 

<br><br>También ofrecemos a los usuarios monitoreo remoto del objetivo a través de nuestra plataforma en la nube y aplicación móvil, que es adecuada para escenarios de aplicación como alquiler de vehículos, gestión de flotas, transporte logístico, etc.
</p>
</div>

<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <center><h3 style="font-weight: bold;font-family: secondary; font-size: 25px;color:#000">Características</h3></center>
</div>

<div class="col s12 m2 l6 animate fadeRight">

<table>
    
    <tr>
        <td><img src="img/c1.png"></td>
        <td>
           
            <span style="font-size: 22px;">Posicionamiento GPS</span>
            <p style="text-align: justify;">
            Una sinergia de múltiples sistemas de posicionamiento garantiza que las ubicaciones se muestren con precisión en la plataforma en la nube.
            </p> 
        </td>
    </tr>
</table>


<table>
    
    <tr>
        <td><img src="img/c2.png"></td>
        <td>
            <span style="font-size: 22px;">Batería recargable de 10.000 mAh.</span>
           <p style="text-align: justify;">
            
            La batería de alta capacidad admite aplicaciones de espera prolongada y se recarga fácilmente para volver a implementarla.
            </p> 
        </td>
    </tr>
</table>

<table>
    
    <tr>
        <td><img src="img/c3.png"></td>
        <td>
            <span style="font-size: 22px;">Múltiples alertas.</span>
           <p style="text-align: justify;">
            
           
           Alertas instantáneas de eventos atípicos como retiro de tapa, retiro de dispositivo, vibración anormal, batería baja, etc.
            </p> 
        </td>
    </tr>
</table>

<table>
    
    <tr>
        <td><img src="img/c4.png"></td>
        <td>
            <span style="font-size: 22px;">Base magnética fuerte.</span>
           <p style="text-align: justify;">
            
           
           
            Instalación casi nula; el LL301 se fija firmemente y sin esfuerzo a la mayoría de las superficies metálicas.
            </p> 
        </td>
    </tr>
</table>



</div>


<div class="col s12 m2 l6 animate fadeRight">

        <table>
    
    <tr>
        <td><img src="img/c5.png"></td>
        <td>
            <span style="font-size: 22px;">Red LTE y GSM.</span>
           <p style="text-align: justify;">
           
             Comunicación a través de redes 4G LTE con respaldo 2G GSM.
            </p> 
        </td>
    </tr>
  </table>


<table>
    
    <tr>
        <td><img src="img/c6.png"></td>
        <td>
            <span style="font-size: 22px;">Escucha remota (VoLTE)</span>
           <p style="text-align: justify;">
           
             
             El micrófono discreto permite el monitoreo de audio remoto del entorno alrededor del dispositivo.
            </p> 
        </td>
    </tr>
  </table>


  <table>
    
    <tr>
        <td><img src="img/c7.png"></td>
        <td>
            <span style="font-size: 22px;">Múltiples modos de trabajo.</span>
           <p style="text-align: justify;">
           
             
             Modos de trabajo configurables según sus demandas reales.
            </p> 
        </td>
    </tr>
  </table>



</div>






 <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->





         <p style="text-align: justify;">
         <span style="color:#00bcd4;">Gps Tracker</span> de Localizaminave es una aplicación que permite instalarse en dispositivos android para obtener y monitorear la ubicación de personas, de tu auto. No se requiere comprar ningún localizador, solo instala en el dispositivo que desees localizar y rastrea desde la plataforma <a href="https://localizaminave.com/" style="color:#00bcd4;">https://localizaminave.com</a>

         <center>
              <a href="https://play.google.com/store/apps/details?id=com.localizaminave.gps" target="_blank"> <img src="img/play.png" width="40%" style="margin-top: 10px;"></a>

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
         <div class="card" style="background-color: #00bcd4;padding: 1px;border-radius: 15px;">
            
              <center><b><h5 style="color:#fff;">Funciones de sistema GPS tracker</h5></b></center>
        
         </div>
    </div>


      <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h2 class="card-title mb-0"><b>Ubicación en tiempo real</b></h2></center>
              
              
              <p style="text-align: justify;">
               Es lógico que si desea adquirir un sistema GPS tracker lo que requiere conocer es la ubicación en tiempo real sobre los lugares a los que se desplazan sus dispositivos, esto puede lograrse al instalar el dispositivo GPS en cada una de las unidades que quiera monitorear y los datos de ubicación podrá conocerlos por medio de la plataforma.
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
                  Conozca el histórico de recorridos de los dispositivos, puedes consultar hasta 1 año de histórico, podrás descargar la información en un reporte excel.
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
                  Verifique el estatus de sus dispositivos, conozca si se encuentran con o sin movimiento, detecte las alertas de parking, alertas de geocercas, monitorea las métricas de velocidad y ubicación de tus dispositivos.
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
                 Comparte la ubicación de tus vehículos con las personas que desees, sin tiempo limite, la ubicación se comparte en tiempo real, compara nuestra plataforma, te proporcionamos una licencia gratuita por un mes, qué esperas comienza a localizar a tus seres queridos de una forma fácil y precisa.
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
    
      
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">






  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #000;padding: 1px;border-radius: 15px;cursor: pointer;">


          
            
               <center><h5 style="color:#fff !important;">Conoce nuestros planes</h5></center>
          

         </div>
      </div>

<div class="col s12 m2 l12 animate fadeRight">
      <center>
      <img src="img/gratis3.jpg" width="100%"></center>

</div>

<center>
 <stripe-buy-button
                  buy-button-id="buy_btn_1My6UyA94PugK9gPoWX1R6XA"
                  publishable-key="pk_live_51My4BjA94PugK9gPVi42fynUV5Z1ytdMU1DAqHC6Zsie4QHefYZ2hirnb2QBw73Xpkr2kd4pr4sxcrR2eH9r0rM50095ZYctPa"
                >
  </stripe-buy-button></center>
       <!--div class="col s12 m2 l4 animate fadeRight">
       
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_not_fixed</i>Prueba Gratuita (1 mes)</b></h4></center><br>
              
              
                <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 mes)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Notificaciones vía whatsapp y correo electrónico</li>
      </ul>

              <center><img src="img/home/real.png" width="50%"></center>

           
              <center>






            </div>
         </div>
      </div-->


      <!--div class="col s12 m2 l4 animate fadeRight">
      
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_fixed</i>Plan Mensual $29.00 MXN</b></h4></center><br>
              
              
               <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Notificaciones vía whatsapp y correo electrónico</li>
      </ul>

               

              <center><img src="img/home/rutas.png" width="50%"></center>

             <a href='dispositivos' class="btn waves-effect waves-light" type="submit" name="action" style="width:100%;background-color: black;">Conseguir Plan
                <i class="material-icons right">send</i>
              </a>


            </div>
         </div>
      </div-->

          <!--div class="col s12 m2 l4 animate fadeRight">
        
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_fixed</i>Plan anual $299.00 MXN</b></h4></center><br>
              
               <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Notificaciones vía whatsapp y correo electrónico</li>
      </ul>

              <center><img src="img/home/vehiculos.png" width="50%"></center>

              <a href='dispositivos' class="btn waves-effect waves-light" type="submit" name="action" style="width:100%;">Conseguir Plan
                <i class="material-icons right">send</i>
              </a>





            </div>
         </div>
      </div-->



      



      


</div>
</div>
</div>
</div>



</div>
</div>


 


@endsection


