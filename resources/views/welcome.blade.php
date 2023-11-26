@extends('layouts.horizontal')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

 

 <script src="https://js.stripe.com/v3/"></script>
 <script src="js/script.js" defer></script>

<script type="text/javascript">

     $(document).ready(function(){

        $('.collapsible').collapsible();
    
      $("#basic-plan-btn").click(function(){

        $("#plan1").css("display","");

       });
     });

</script>


<!--div id="main"-->
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
       body{

      // background-image: url('img/prueba8.jpg');
       background-repeat: no-repeat;
       background-size: cover;
       background-color: #fff;

    }

   </style>

  <div class="col s12 m2 l12" style="background-color: #fff;opacity: .95;">
   
            <center><!--:#00bcd4-->
            <span style="color:#000;font-size: 18px;"> Expertos en localización vehicular, controla tus vehículos con nuestro centro de monitoreo.</span>
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


 <img src="img/home/img-home-9.jpeg" width="100%">   

<!--p style="text-align: justify;color: #000;">El JR301 es un rastreador GPS de activos 4G Cat 1 que permite un tiempo de espera ultralargo gracias a una batería de gran capacidad de 10 000 mAh y una carcasa duradera. 

<br><br>Con múltiples sistemas de posicionamiento y cobertura de señal interior y exterior, el dispositivo también admite alertas instantáneas de eventos atípicos como extracción del dispositivo, vibración, etc. 

<br><br>También ofrecemos a los usuarios monitoreo remoto del objetivo a través de nuestra plataforma en la nube y aplicación móvil, que es adecuada para escenarios de aplicación como alquiler de vehículos, gestión de flotas, transporte logístico, etc.
</p-->
</div>







<div class="col s12 m2 l4 animate fadeRight" style="color:#000;">
   
    <img src="img/home/img-home-8.jpeg" width="100%">

    <center><b>Alerta eliminada</b></center>

    <p style="text-align:justify;font-size: 14px;">

        Cuando el dispositivo está conectado a un vehículo, el botón antimanipulación permanecerá presionado. Si el dispositivo está desconectado, el botón antimanipulación retrocederá, lo que hará que el dispositivo envíe una alerta de manipulación. En el modo de espera prolongado, el dispositivo habilitará el seguimiento durante 20 minutos después de que se envíe el mensaje de alerta. La función de alerta de manipulación se puede desactivar mediante un comando.

   </p>



</div>


<div class="col s12 m2 l4 animate fadeRight" style="color:#000;">
   
    <img src="img/home/img-home-5.jpeg" width="100%">

    <center><b>IP65 a prueba de agua</b></center>
    <p style="text-align:justify;font-size: 14px;">
    El diseño robusto y resistente al polvo y al agua IP65 garantiza un rendimiento óptimo continuo, incluso en las condiciones más duras.</p>

</div>



<div class="col s12 m2 l4 animate fadeRight" style="color:#000;">
  <img src="img/home/img-home-10.jpeg" width="100%">

    <center><b>Tamaño del rastreador</b></center>
    <p style="text-align:justify;font-size: 14px;">
   
    Dimensiones: 6,1*10,8*3 cm
    Peso: 245g</p>
</div>


<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">

</div>



<div class="col s12 m2 l4 animate fadeRight" style="color:#000;">
   
    <img src="img/home/img-home-6.jpeg" width="100%">

    <center><b>Posicionamiento preciso</b></center>

    <p style="text-align:justify;font-size: 14px;">

        La frecuencia de actualización de la ubicación del GPS es de hasta 10 s, el posicionamiento frecuente hace que su ruta histórica sea más clara.

   </p>



</div>


<div class="col s12 m2 l4 animate fadeRight" style="color:#000;">
   
    <img src="img/home/img-home-7.jpeg" width="100%">

    <center><b>Personaliza vallas para todos los vehículos.</b></center>
    <p style="text-align:justify;font-size: 14px;">
    <li>Reciba una alarma cuando un vehículo entre o salga del límite de la cerca.<br>
    <li>Admite la búsqueda de puntos de referencia, localiza con precisión el centro del círculo.<br>
    <li>Radio de soporte personalizado.</p>

</div>



<div class="col s12 m2 l4 animate fadeRight" style="color:#000;">
  <center><img src="img/home/disloca.jpeg" width="65%"></center>

    <center><b>Alerta múltiple</b></center>
    <p style="text-align:justify;font-size: 14px;">
   
    Puede iniciar sesión en la plataforma de seguimiento de localizaminave.com en su aplicación móvil/computadora/tableta para recibir varias alertas: Alerta de batería baja, Alerta eliminada, Alerta de vibración, Alerta de exceso de velocidad, Geo-valla, Alerta de apagado....</p>
</div>

<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <img src="img/home/img-home-3.jpeg" width="100%">
</div>









<div class="col s12 m2 l12 animate fadeRight" style="color:#000;">
   <center><h3 style="font-weight: bold;font-family: secondary; font-size: 25px;color:#000">Características</h3></center>
</div>

<div class="col s12 m2 l6 animate fadeRight" >


  <ul class="collapsible popout">
    <li>
      <div class="collapsible-header"><i class="material-icons">expand_more</i>Posicionamiento GPS</div>
      <div class="collapsible-body">
          
          <table class="striped">
    
    <tr>
        <td><img src="img/c1.png"></td>
        <td>
           
            <span style="font-size: 22px;color: #000;">Posicionamiento GPS</span>
            <p style="text-align: justify;">
            Una sinergia de múltiples sistemas de posicionamiento garantiza que las ubicaciones se muestren con precisión en la plataforma en la nube.
            </p> 
        </td>
    </tr>
</table>
      </div>
    </li>


    <li>
      <div class="collapsible-header"><i class="material-icons">expand_more</i>Batería recargable de 10.000 mAh.</div>
      <div class="collapsible-body">
          
          <table class="striped">
    
    <tr>
        <td><img src="img/c2.png"></td>
        <td>
            <span style="font-size: 22px;color: #000;">Batería recargable de 10.000 mAh.</span>
           <p style="text-align: justify;">
            
            La batería de alta capacidad admite aplicaciones de espera prolongada y se recarga fácilmente para volver a implementarla.
            </p> 
        </td>
    </tr>
</table>
      </div>
    </li>




    <li>
      <div class="collapsible-header"><i class="material-icons">expand_more</i>Múltiples alertas.</div>
      <div class="collapsible-body">
          
        <table class="striped">
    
    <tr>
        <td><img src="img/c3.png"></td>
        <td>
            <span style="font-size: 22px;color: #000;">Múltiples alertas.</span>
           <p style="text-align: justify;">
            
           
           Alertas instantáneas de eventos atípicos como retiro de tapa, retiro de dispositivo, vibración anormal, batería baja, etc.
            </p> 
        </td>
    </tr>
</table>

      </div>
    </li>



     <li>
      <div class="collapsible-header"><i class="material-icons">expand_more</i>Red LTE y GSM.</div>
      <div class="collapsible-body">
         <table class="striped">
    
    <tr>
        <td><img src="img/c5.png"></td>
        <td>
            <span style="font-size: 22px;color: #000;">Red LTE y GSM.</span>
           <p style="text-align: justify;">
           
             Comunicación a través de redes 4G LTE con respaldo 2G GSM.
            </p> 
        </td>
    </tr>
  </table>

      </div>
    </li>

    <li>
      <div class="collapsible-header"><i class="material-icons">expand_more</i>Escucha remota (VoLTE)</div>
      <div class="collapsible-body">
         <table class="striped">
    
    <tr>
        <td><img src="img/c5.png"></td>
        <td>
            <span style="font-size: 22px;color: #000;">Escucha remota (VoLTE)</span>
           <p style="text-align: justify;">
           
             Comunicación a través de redes 4G LTE con respaldo 2G GSM.
            </p> 
        </td>
    </tr>
  </table>

      </div>
    </li>


        <li>
      <div class="collapsible-header"><i class="material-icons">expand_more</i>Base magnética fuerte.</div>
      <div class="collapsible-body">

 <table class="striped">
    
    <tr>
        <td><img src="img/c4.png"></td>
        <td>
            <span style="font-size: 22px;color: #000;">Base magnética fuerte.</span>
           <p style="text-align: justify;">
            
           
           
            Instalación casi nula; el LL301 se fija firmemente y sin esfuerzo a la mayoría de las superficies metálicas.
            </p> 
        </td>
    </tr>
</table>


      </div>
    </li>




  </ul>
















</div>


<div class="col s12 m2 l6 animate fadeRight">




      

 <center><img src="img/satelital-copia.png" width="100%" class="responsive-img"></center>








</div>









 <!--div class="col s12 m2 l12 animate fadeRight">
        





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
        
            
        
      </div-->




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
              
              
              <p style="text-align: justify;font-size: 14px;">
               Es lógico que si desea adquirir un sistema GPS tracker lo que requiere conocer es la ubicación en tiempo real sobre los lugares a los que se desplazan sus activos, esto puede lograrse al instalar el dispositivo GPS en cada una de las unidades que quiera monitorear y los datos de ubicación podrá conocerlos por medio de la plataforma.
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
              
              
               <p style="text-align: justify;font-size: 14px;">
                  Conozca el histórico de recorridos de los dispositivos, puedes consultar hasta 1 año de histórico, podrás descargar la información en un reporte excel.
               </p>

            <img src="img/home/rutas.png" width="100%">
            <div id="espacio" style="width:100%;height:60px;"></div>

            </div>
         </div>
      </div>




    <div class="col s12 m5 l12 animate fadeRight" >
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b>Estado actual de activos</b></h4></center>
              
              
               <p style="text-align: justify;font-size: 14px;">
                  Verifique el estatus de sus activos, conozca si se encuentran con o sin movimiento, detecte las alertas de parking, alertas de geocercas, monitorea las métricas de velocidad y ubicación en tiempo real.
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
              
              
               <p style="text-align: justify;font-size: 14px;">
                 Comparte la ubicación de tus activos con las personas que desees, sin tiempo limite, la ubicación se comparte en tiempo real, compara nuestra plataforma, qué esperas comienza a localizar a tus seres queridos, flota,  de una forma fácil y precisa.
               </p>

            <center>
            <img src="img/ubica.jpg" width="50%" style="margin-top: 10px;">
            </center>
   
               
            </div>
         </div>
      </div>

 <!--div class="col s12 m5 l12 animate fadeRight" style=" background-image: url('img/prueba12.jpg'); background-repeat: no-repeat;background-size: cover;">
      <div class="card" style="opacity:.9">
            <div class="card-content">
               <center>

                <h3 class="card-title mb-0"><i class="material-icons right">gps_fixed</i><b style="font-size:24px">Aquiere tu Gps Tracker</b></h3>
            </center><br>
              
            

      <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Plataforma de monitoreo propia</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Alertas vía whatsapp y correo electrónico</li>
      </ul>

               

              <center><img src="img/LL301.png" width="20%"></center>



             <a class="btn waves-effect waves-light" id="basic-plan-btn"  style="width:100%;background-color: black;">Comprar
                <i class="material-icons right">send</i>
                <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan1">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                </div>
              </a>


            </div>
         </div>

</div-->






      <!--script async src="https://js.stripe.com/v3/pricing-table.js"></script>
<stripe-pricing-table pricing-table-id="prctbl_1NpFi5A94PugK9gPtArTVENl"
publishable-key="pk_live_51My4BjA94PugK9gPVi42fynUV5Z1ytdMU1DAqHC6Zsie4QHefYZ2hirnb2QBw73Xpkr2kd4pr4sxcrR2eH9r0rM50095ZYctPa">
</stripe-pricing-table-->



    



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






  <!--div class="col s12 m2 l12 animate fadeRight">
      
         <div class="card" style="background-color: #000;padding: 1px;border-radius: 15px;cursor: pointer;">


          
            
               <center><h5 style="color:#fff !important;">Conoce nuestros planes</h5></center>
          

         </div>
      </div>

<!--div class="col s12 m2 l12 animate fadeRight">
      <center>
      <img src="img/gratis3.jpg" width="100%"></center>

</div>

<center>
 <stripe-buy-button
                  buy-button-id="buy_btn_1My6UyA94PugK9gPoWX1R6XA"
                  publishable-key="pk_live_51My4BjA94PugK9gPVi42fynUV5Z1ytdMU1DAqHC6Zsie4QHefYZ2hirnb2QBw73Xpkr2kd4pr4sxcrR2eH9r0rM50095ZYctPa"
                >
  </stripe-buy-button></center-->
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
<!--/div-->


 


@endsection


