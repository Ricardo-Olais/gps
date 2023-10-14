@extends('layouts.horizontal')

@section('content')
 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
 <script src="https://js.stripe.com/v3/"></script>
 <script src="js/script.js" defer></script>
 <script async src="https://js.stripe.com/v3/buy-button.js"></script>


 <?php
    session_start(); 
    $_SESSION["id"]=@$_REQUEST['id'];

 ?>

<script type="text/javascript">
  

  $(document).ready(function(){
   $('.fixed-action-btn').floatingActionButton();


   $("#gratis").click(function(){

        $("#basico").css("display","");



   });

   $("#basic-plan-btn").click(function(){

        $("#plan1").css("display","");

   });

    $("#pro-plan-btn").click(function(){

        $("#plan2").css("display","");

   });




  });
</script>

<style type="text/css">
   body{

     //  background-image: url('img/prueba11.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-color: #000;
    }

    .card, .card-panel{
      border-color: red;
      box-shadow: 0 2px 2px 0 rgba(0,0,0,.10), 0 3px 1px -2px rgba(0,0,0,.12), 0 1px 5px 0 rgba(0,0,0,.9);
     }

     .centrado{
    position: absolute;
    top: 50%;
    left: 55%;
    transform: translate(-50%, -50%);
    font-size: 30px;
}
</style>

<!--div id="main"-->
  <div class="row">
    <div class="col s12">
      <div class="container">
        <div class="section">
          <!-- Current balance & total transactions cards-->
          <div class="row vertical-modern-dashboard">

            <div class="col s12 m5 l12 animate fadeRight">



              <img src="img/prueba12-min.jpg" width="100%">


              <!--div class="centrado">Expertos en localización</div-->



            </div>

            <center><span style="font-size:24px;">Planes y precios de Gps Tracker</span></center>
            <div class="col s12 m5 l4 animate fadeRight">
              <div class="card" style="opacity:1;border-color: coral !important;">
                <div class="card-content">
                  <center>
                    <h6 class="card-title mb-0">
                      <i class="material-icons right">gps_fixed</i>
                      <b style="font-size:18px">Dispositivo + plataforma básica pago único x $2900.00 MXN</b>
                    </h6>
                  </center>
                  <br>
                  <ul class="collection with-header" style="color:#000">

                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">phonelink_ring</i> Dispositivo GPS
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real
                    </li>
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo
                    </li-->
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Plataforma de monitoreo propia
                    </li-->
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas
                    </li-->
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija
                    </li-->
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 mes)
                    </li-->
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo
                    </li-->
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">notifications</i> Alertas vía whatsapp y correo electrónico
                    </li>
                  </ul>
                  <center>
                    <img src="img/LL301.png" width="20%">
                  </center>
                  <a class="btn waves-effect waves-light" id="basic-plan-btn" style="width:100%;background-color: black;">Comprar <i class="material-icons right">send</i>
                    <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan1">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col s12 m5 l4 animate fadeRight">
              <div class="card" style="opacity:1;background-color:#B4F6E2;">
                <div class="card-content">
                  <center>
                    <h6 class="card-title mb-0">
                      <i class="material-icons right">gps_fixed</i>
                      <b style="font-size:18px">Dispositivo + plataforma Pro </b>
                      <b style="color:#000;font-size: 20px;">(Recomendado)</b>
                    </h6>
                  </center>
                  <br>
                  <ul class="collection with-header" style="color:#000">

                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">phonelink_ring</i> Dispositivo GPS
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real
                    </li>
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo
                    </li-->
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Plataforma de monitoreo propia
                    </li-->
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas
                    </li>
                    <!--li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija
                    </li-->
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">notifications</i> Alertas vía whatsapp y correo electrónico
                    </li>
                  </ul>
                  <center>
                    <img src="img/LL301.png" width="20%">
                  </center>
                  <a class="btn waves-effect waves-light" id="basic-plan-btn-2" style="width:100%;background-color: #00bcd4;">Comprar <i class="material-icons right">send</i>
                    <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan2">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col s12 m5 l4 animate fadeRight">
              <div class="card" style="opacity:1">
                <div class="card-content">
                  <center>
                    <h6 class="card-title mb-0">
                      <i class="material-icons right">gps_fixed</i>
                      <b style="font-size:18px">Plan PRO + subscripción mensual </b>
                    </h6>
                  </center>
                  <br>
                  <ul class="collection with-header" style="color:#000">
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Plataforma de monitoreo propia
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">notifications</i> Alertas vía whatsapp y correo electrónico
                    </li>
                  </ul>
                 
                  <a class="btn waves-effect waves-light" id="basic-plan-btn-3" style="width:100%;background-color: black;">Comprar <i class="material-icons right">send</i>
                    <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan3">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                  </a>
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
            <div class="col s12 m5 l2 animate fadeRight"></div>
            <div class="col s12 m5 l4 animate fadeRight">
              <div class="card" style="opacity:1">
                <div class="card-content">
                  <center>
                    <h6 class="card-title mb-0">
                      <i class="material-icons right">gps_fixed</i>
                      <b style="font-size:18px">Plan sin dispositivo + plataforma básica $300 MXN</b>
                    </h6>
                  </center>
                  <br>
                  <ul class="collection with-header" style="color:#000">

                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">phonelink_ring</i> Instala la app GPS Tracker 
                      <center>
                     <a href="https://play.google.com/store/apps/details?id=com.localizaminave.gps" target="_blank"> <img src="img/play.png" width="40%" style="margin-top: 10px;"></a></center>
                    </li>

                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Plataforma de monitoreo propia
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">notifications</i> Alertas vía whatsapp y correo electrónico
                    </li>
                  </ul>
               
                  <a class="btn waves-effect waves-light" id="basic-plan-btn-4" style="width:100%;background-color: black;">Comprar <i class="material-icons right">send</i>
                    <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan4">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col s12 m5 l4 animate fadeRight">
              <div class="card" style="opacity:1;">
                <div class="card-content">
                  <center>
                    <h6 class="card-title mb-0">
                      <i class="material-icons right">gps_fixed</i>
                      <b style="font-size:18px">Plan sin dispositivo + plataforma Pro </b>
                    </h6>
                  </center>
                  <br>
                  <ul class="collection with-header" style="color:#000">
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">phonelink_ring</i> Instala la app GPS Tracker
                      <center>
                     <a href="https://play.google.com/store/apps/details?id=com.localizaminave.gps" target="_blank"> <img src="img/play.png" width="40%" style="margin-top: 10px;"></a></center>
                    </li>
                    
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Plataforma de monitoreo propia
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat
                    </li>
                    <li class="collection-item">
                      <i class="material-icons" style="color:#00bcd4;">notifications</i> Alertas vía whatsapp y correo electrónico
                    </li>
                  </ul>
                
                  <a class="btn waves-effect waves-light" id="basic-plan-btn-5" style="width:100%;background-color: black;">Comprar <i class="material-icons right">send</i>
                    <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan5">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/div-->
 


@endsection


