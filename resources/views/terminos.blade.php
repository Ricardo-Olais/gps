@extends('layouts.app')

@section('content')

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.carousel').carousel();


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
    setTimeout(autoplay, 6000);
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

      <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
              <center> <h4 class="card-title mb-0"><b>Términos y condiciones</b></h4></center>
              
              
               

                    <p style="text-align: justify;margin-top: 10px;">
                        1. Este es un contrato obligatorio en términos legales.<br>
                        <br>
                        Este Contrato de Servicio con el Cliente (el "Acuerdo" o el "Contrato") establece los términos y condiciones de conformidad a través de los cuales Localiza mi nave GPS, acepta proveer al Cliente, quien firma este
                        contrato, con algunos servicios de geolocalización (los "Servicios"). Al hacer clic en el recuadro de la página Web de activación del sitio https://localizaminave.com.mx identificado con la leyenda "He leído y
                        aceptado los términos y condiciones del Acuerdo Comercial con el cliente," o en su defecto, al estampar su firma autógrafa en los espacios destinados para ello en el presente Acuerdo, El Cliente acepta quedar
                        obligado por los términos y condiciones establecidos en el mismo. El Cliente también acepta los términos y condiciones de este Acuerdo pagando y usando los Servicios. Si el cliente no está de acuerdo con los términos
                        y condiciones del presente Acuerdo, el Cliente no podrá acceder a los Servicios y por consecuencia, tampoco utilizarlos. En algunos aspectos los Servicios podrían utilizar Google Maps u OpenStreetMap. Para mayor
                        información sobre los términos y condiciones consulte los sitios web de cada referido.<br>
                    </p>

                    <p style="text-align: justify;">
                        2. El Cliente está de acuerdo en que Localiza mi nave GPS, como proveedor de El Cliente, puede monitorear, recolectar, utilizar, comunicar, retener, y revelar la información de ubicación de su(s) Localizador(es).<br>
                        <br>
                        2.1 El Cliente acepta que Localiza mi nave GPS podrá utilizar los datos de un Localizador GSM (el "Localizador celular") , el cual el cliente debe de colocar dentro de su vehículo, y junto con su tecnología de
                        comunicación y localización, monitorear y colectar coordenadas de satélites de posicionamiento global ("GPS") mostrando la localización de su unidad. <br>
                        <br>

                        2.2. El Cliente acepta que Localiza mi nave GPS puede transmitir información de localización a través de tecnologías y redes de comunicación elegidas por Localiza mi nave GPS o, a solicitud del Cliente, Localiza mi nave GPS
                        podría transmitir información de localización al cliente en parte a través de las tecnologías y redes de comunicación elegidas por el cliente, como cuando el cliente opta por recibir información de ubicación a través
                        de mensajes de texto ("SMS") directamente a su teléfono celular. Localiza mi nave GPS se reserva el derecho de cobrar una cuota económica al Cliente por los SMS enviados a su teléfono celular ó por los datos de internet
                        empleados.<br>

                        2.3 Localiza mi nave GPS podría eliminar de sus sistemas informáticos y sus medios de respaldo la información del Cliente, incluyendo pero no limitado a, posiciones geográficas y de telemetría obtenidos a través de los
                        sistemas GPS del Cliente en cualquiera de los siguientes casos:<br>
                        <br>
                        • Si el cliente no ha liquidado su cuota de servicio después de dos días del vencimiento<br>
                        • A solicitud del cliente siempre y cuando ninguna autoridad legalmente establecida solicite lo contrario<br>
                        • Si el cliente termina de manera anticipada el contrato con Localiza mi nave GPS<br>
                        • Si Localiza mi nave GPS a su sola discreción considera que el cliente ha incumplido cualquier punto de este Contrato<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        3. El Cliente tiene prohibido utilizar los Servicios para propósitos ilegales de acuerdo a lo que indican las leyes aplicables de los Estados Unidos Mexicanos, sin importar donde resida el Cliente.<br>
                        <br>
                        El Cliente no debe utilizar, y no permitirá a ninguna persona a usar los Servicios de ninguna manera que viole alguna ley federal, estatal o local, o para cualquier fin ilícito o ilegal incluyendo, pero no limitado
                        a: acoso, calumnias, difamaciones, explotación o vigilancia de cualquier persona sin su consentimiento con fines distintos a su propia seguridad y/o administración de los recursos propiedad del cliente.<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        4. El Cliente se compromete a ciertas garantías.<br>
                        <br>
                        El Cliente garantiza a Localiza mi nave GPS que:<br>
                        <br>
                        4.1. El Cliente utilizará los Servicios únicamente según lo estipulado en este Acuerdo;<br>
                        <br>
                        4.2. El cliente es mayor de 18 años de edad y tiene el derecho o ha obtenido cualquier autorización requerida para:<br>
                        <br>
                        (a) Supervisar la ubicación del vehículo o los vehículos<br>
                        (b) Consentir que Localiza mi nave GPS puede supervisar, recopilar, utilizar, comunicar, mantener y divulgar información de ubicación tal como se describe en el presente Acuerdo;<br>
                        <br>
                        4.3 Cualquier información que el cliente proporcione o divulgue a Localiza mi nave GPS será precisa, completa y actual, y<br>
                        <br>
                        4.4. El Cliente notificará a Localiza mi nave GPS de cualquier cambio en la información que haya proporcionado de manera previa a Localiza mi nave GPS mediante el uso de los métodos para ponerse en contacto con Localiza mi nave como se indica en la sección "Contactános" de https://localizaminave.com.mx<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        5. Localiza mi nave GPS no cobrará al cliente un cargo por concepto de cancelación o término anticipado si el Cliente termina los Servicios<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        6. El cliente es responsable de todos los cargos incurridos por la conexión con los Servicios independientemente de quién los ocasione, así como también Localiza mi nave GPS se deslinda de la cobertura del proveedor de
                        red que el cliente elija<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        7. El cliente debe utilizar la información de seguridad que Localiza mi nave GPS le proporcione.<br>
                        <br>
                        Localiza mi nave GPS proporcionará al Cliente un nombre de usuario, contraseña u otra información de seguridad ("Información de Seguridad"), misma que el Cliente debe utilizar para acceder y utilizar los Servicios. El
                        Cliente deberá mantener la confidencialidad de la Información de Seguridad y será responsable de todas las actividades realizadas con la Información de Seguridad proporcionada. El Cliente deberá notificar a Localiza mi nave inmediatamente cualquier uso no autorizado de la Información de Seguridad.<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        8. Localiza mi nave GPS no será responsable por cualquier daño que el Cliente u otros puedan sufrir como resultado del funcionamiento incorrecto parcial o total del equipo o de los sistemas de comunicación o de la
                        pérdida, revelación, o uso por un tercero de la Información de Seguridad del Cliente, independientemente de si la divulgación o uso sea con o sin el conocimiento o consentimiento del cliente.<br>
                    </p>

                    <p style="text-align: justify;">
                        9. Localiza mi nave GPS no será responsable por cualquier pérdida, cancelación, anulación, invalidación o reclamo que un tercero pudiera realizar al Cliente como consecuencia del uso o instalación del localizador en el
                        activo del cliente. El cliente está enterado que todas las marcas de vehículos y maquinaria podrían cancelar garantías ante la instalación de cualquier dispositivo en el vehículo, Localiza mi nave GPS no se
                        responsabiliza del robo de vehículos.<br>
                        <br>
                    </p>

                    <p style="text-align: justify;">
                        10. Los clientes deben pagar a sus compañías de telefonía móvil por datos usados para el servicio de internet, indispensable para enviar la localización enviados a Localiza mi nave GPS de conformidad con los términos de
                        sus acuerdos de telefonía móvil. <br>
                        <br>
                    </p>
           
             


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


