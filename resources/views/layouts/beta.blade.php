<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" value="notranslate">
    <title>Gps Tracker</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <meta name="description" content="Somos una empresa con 3 años de experiencia, especializada en soluciones de localización satelital y telemática aplicadas a logística, distribución y seguridad." />

      <!-- Open Graph data -->
      <meta property="og:title" content="Rastreo en tiempo real"/>
      <meta property="og:type" content="article" />
      <meta property="og:url" content=" https://localizaminave.com" />
      <meta property="og:image" content="https://localizaminave.com/img/zfunciones.jpeg" />
      <meta property="og:description" content="Conóce en donde se encuentran tus seres queridos, localizador familiar preciso y seguro, encuentra a sus seres queridos y sepa dónde están. Ahora es el mejor momento para garantizar la seguridad de su familia. Podrás localizarlos en tiempo real, compara nuestra plataforma." />
      <meta property="fb:app_id" content="2813051298827331" />
      

    

    <link href="css/vendors.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/themes//style.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/jquery.dataTables.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma@4.0.5/bulma.css" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   



    

    <style type="text/css">
      /*footer {
    min-height: 20px;
    background-color: #e3f2fd;
    width: 100%;
    position: fixed;
    bottom: 0;
    z-index: 100;
}*/
    .sidenav li>a {
        font-size: 18px;
      }
     #inferior{
     
      position:absolute; /*El div será ubicado con relación a la pantalla*/
      left:0px; /*A la derecha deje un espacio de 0px*/
      right:0px; /*A la izquierda deje un espacio de 0px*/
      bottom:50px; /*Abajo deje un espacio de 0px*/
      height:50px; /*alto del div*/
      z-index:100;
     
       }

       .parpadea {
           
           animation-name: parpadeo;
           animation-duration: 1s;
           animation-timing-function: linear;
           animation-iteration-count: infinite;

           -webkit-animation-name:parpadeo;
           -webkit-animation-duration: 1s;
           -webkit-animation-timing-function: linear;
           -webkit-animation-iteration-count: infinite;
         }

         @-moz-keyframes parpadeo{  
           0% { opacity: 1.0; }
           50% { opacity: 0.0; }
           100% { opacity: 1.0; }
         }

         @-webkit-keyframes parpadeo {  
           0% { opacity: 1.0; }
           50% { opacity: 0.0; }
            100% { opacity: 1.0; }
         }

         @keyframes parpadeo {  
           0% { opacity: 1.0; }
            50% { opacity: 0.0; }
           100% { opacity: 1.0; }
         }

     


    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


@guest
  @if (Route::has('register'))
     @endif

        @else
    <!--script type="text/javascript">
          
          function inactividad() {

             Swal.fire({
                      title:"Tu sesión ha expirado, vuelve a hacer login",
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: 'Aceptar',
                      denyButtonText: `Don't save`,
                    }).then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {

                        $("#logout-form").submit();  // 10 minutos 600000 milisegundos
                      //  window.location.href="login";

                      } 
                    });

              
          }
          var t=null;


          function contadorInactividad() {
              t=setTimeout("inactividad()",3600000);
          }


          window.onblur=window.onmousemove=function() {
              if(t) clearTimeout(t);
              contadorInactividad();
          }

          window.onscroll = function() {

            if(window.scrollY>0 || window.scrollX>0){
              if(t) clearTimeout(t);
              contadorInactividad();

            }
            

          };


</script-->

@endguest

</head>
<body>
   <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your plugin de chat code -->
      <div class="fb-customerchat"
        attribution="biz_inbox"
        greeting_dialog_display="hide"
        page_id="102256168946438">
      </div>
<div id="app">
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

<header class="page-topbar" id="header">
  <div class="navbar navbar-fixed">
    <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-shadow" style="background-color:black !important;opacity: .9 !important;">
      <div class="nav-wrapper">
        </div-->
        <ul class="navbar-list right">
         
       

           @guest
             @if (Route::has('register'))
           

            <li tabindex="0">
                <a class="text-darken-1" href="{{ route('register') }}">
               Regístrate</a>
              </li>

              @endif

        @else

          

          <li>
            <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
              <span>{{ Auth::user()->name }}</span>
              <span class="avatar-status avatar-online">
                <img src="img/cuenta.jpg" alt="avatar">
              </span>
            </a>

            
            <ul class="dropdown-content" id="profile-dropdown" tabindex="0">


             <li tabindex="0">
                <a class="grey-text text-darken-1" href="micuenta">
                  <i class="material-icons">help_outline</i>Mi cuenta</a>
              </li>
             
              
              <li class="divider" tabindex="0"></li>
              <li tabindex="0">
                <a class="grey-text text-darken-1" href="facturacion">
                  <i class="material-icons">lock_outline</i> Factura</a>
              </li>
              <li tabindex="0">

                <a class="grey-text text-darken-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="material-icons">keyboard_tab</i> {{ __('Salir') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                <!--a class="grey-text text-darken-1" href="user-login.html">
                  <i class="material-icons">keyboard_tab</i> Logout </a-->
              </li>
            </ul>
          </li>
          
        </ul>

      @endguest
        <!-- translation-button-->
        <!-- notifications-dropdown-->
        <!-- profile-dropdown-->
      </div>
      <nav class="display-none search-sm">
        <div class="nav-wrapper">
          <form id="navbarForm">
            <div class="input-field search-input-sm">
              <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
              <label class="label-icon active" for="search">
                <i class="material-icons search-sm-icon">search</i>
              </label>
              <i class="material-icons search-sm-close">close</i>
              <ul class="search-list collection search-list-sm display-none ps">
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                  <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                  <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
              </ul>
            </div>
          </form>
        </div>
      </nav>
    </nav>
  </div>
</header>

 <?php

          function isMobile() {
                      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
                    }
?>

<?php if(!isMobile()) { ?>

  <script type="text/javascript">
    //document.body.style.zoom = "85%";

  </script>

    

 <?php } ?>



<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
  <div class="brand-sidebar" style="background-color:black !important;">
    <h1 class="logo-wrapper">
      <a class="brand-logo darken-1" href="index">
        <img src="images/color.png" alt="materialize logo">
        <span class="logo-text hide-on-med-and-down">Gps Tracker</span>
      </a>

      <a class="navbar-toggler" href="#" style="display:none;">
        <i class="material-icons">radio_button_checked</i>
      </a>
    </h1>
  </div>


  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow ps ps--active-y" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
    



    <li class="navigation-header">
     <?php if(isMobile()) { ?>
      <img src="images/color.png" alt="materialize logo" width="80">

    <?php } ?>
      <!--a class="navigation-header-text" style="color:#00bcd4;">Localiza mi nave</a-->
      <i class="navigation-header-icon material-icons">more_horiz</i>
    </li>


       <div class="card  darken-1" style="height:auto;font-size: 14px;">
        <div class="card-content white-text">
          <h6><b>Ubicación actual</b></h6>

          <span id="miubicacion" style="color:black !important;"></span>

          <br>
          <span id="estas" style="color:black !important;"></span>

          <i class="material-icons" style="color:black;cursor:pointer;" id="comparte">share</i>

        </div>

         <!--a class="modal-close waves-effect waves-light btn" id="localizar"><i class="material-icons">location_on</i>Localizar</a-->
        
      </div>

      <div class="card  darken-1 parpadea" style="background-color: red;text-align: center;color: #fff;display: none;" id="resplandorrojo">

        Alerta <i class="material-icons">notifications_active</i>
      </div>

      

      <div class="card  darken-1" style="height:auto;">
        <div class="card-content black-text">
           <i class="material-icons">update</i> <span id="reg"></span><br>
           <i class="material-icons">wb_incandescent</i> Temperatura :<span id="tem"></span><br>
           <i class="material-icons">cloud_queue</i> Clima : <span id="cli"></span><br>
           <i class="material-icons">network_check</i> <span id="vel"></span><br>
           <i class="material-icons">battery_std</i> <span id="bat"></span><br>
           <i class="material-icons"  id="enmov">fiber_manual_record</i> <span id="mov"></span><br>
           <hr style="margin-top:15px;">
           <h4 class="card-title mb-0 " >Parking</h4>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="fijaubi" name="fijaubi">
                       <span class="lever"></span> On </label>
                   </div>

                    <hr style="margin-top:15px;">
                   <h4 class="card-title mb-0"><b>Geocerca</b></h4>
                   <!-- Switch -->
                   <div class="switch">
                     <label> Off <input type="checkbox" id="activageocerca" name="activageocerca">
                       <span class="lever"></span> On </label>
                     <!--span id="geocercaactual" class="lever"></span--><br>
                    <center>
                     <table>
                    <thead>
                      <tr>
                          
                          <th><i class="material-icons" id='menos' style="cursor:pointer;font-size: 50px;color: black;">do_not_disturb_on</i></th>
                          <th><span id='geo' style="font-size:18px;">0 mtros.</span></th>
                          <th><i class="material-icons" id='mas'  style="cursor:pointer;font-size: 50px;color: #00bcd4;">add_circle</i></th>
                      </tr>
                    </thead>
                   </table>
                   </center>



                   </div>

          

      </div></div>


   

    @if (Auth::guest())
    
    @else
    

    @endif

   

    @if (Auth::guest())



     <!--li class="bold">
      <a class="waves-effect waves-cyan " href="register">
        <i class="material-icons">person_add</i>
        <span class="menu-title" data-i18n="User Profile">Regístrate</span>
      </a>
    </li-->

     <!--li class="bold">
      <a class="waves-effect waves-cyan " href="login">
        <i class="material-icons">vpn_key</i>
        <span class="menu-title" data-i18n="User Profile">Login</span>
      </a>
    </li-->


    
    @else


    
   
   @endif
   <center>
    <!--img src="img/tracking-o.gif" width="120" style="margin-top:50px;"-->
  </center>

   <!--div id="inferior">
    <center>

     <span style="font-size:12px;">© <?php echo date("Y");?> <a href="https://localizaminave.com" target="_blank" style="color:#00bcd4;">Gps Tracker &#174;</a> All rights reserved.</span></center>
  </div-->


    
    <!--div class="ps__rail-x" style="left: 0px; bottom: -656px;">
      <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 656px; height: 265px; right: 0px;">
      <div class="ps__thumb-y" tabindex="0" style="top: 82px; height: 33px;"></div>
    </div-->
  </ul>
  <div class="navigation-background"></div>
  <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out">
    <i class="material-icons">menu</i>
  </a>
</aside>




   <script src="js/vendors.min.js" ></script>
   <script src="js/plugins.min.js" ></script>
   <script src="js/customizer.min.js" ></script>
   <script src="js/search.min.js" ></script>
   <script src="js/jquery.dataTables.js" ></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


   <script type="text/javascript">
  

  // Or with jQuery

  $(document).ready(function(){
    $('.parallax').parallax();
    //$(".navbar-toggler")[0].click();
  });
   </script>

    <script>
        var token="{{ csrf_token() }}";



    </script>

      @if (Auth::guest())
      <script type="text/javascript">
         var sesion="";
         var email="";
      </script>
      @else
      <script type="text/javascript">
         var sesion="{{ auth()->user()->name}}";
         var email="{{ auth()->user()->email}}";
      </script>
      @endif

        <main class="py-4">
            @yield('content')





        </main>

    <style type="text/css">
      
      body {
        margin: 0;
        margin-bottom: 40px;
      }
    footer {
      background-color: black;
      position:absolute;
      bottom: 0;
      width: 100%;
      height:45px !important;
      color: white;
      //z-index: 2000;
    }
    </style>

    <script type="text/javascript">
      $(document).ready(function(){
          $('.modal').modal();
          $('select').formSelect();
          $('.fixed-action-btn').floatingActionButton();
          $('.tooltipped').tooltip();
          //$('.fixed-action-btn').addClass( "active" );
          //$("#menuf").trigger("click");
     });
    </script>

     <style type="text/css">
     

     

      .modal-overlay{

        opacity: 0.7 !important;
      }

      @keyframes wobble {
  16.65% {
    -webkit-transform: translateY(8px);
    -ms-transform: translateY(8px);
    transform: translateY(8px);
  }
  33.3% {
    -webkit-transform: translateY(-6px);
    -ms-transform: translateY(-6px);
    transform: translateY(-6px);
  }
  49.95% {
    -webkit-transform: translateY(4px);
    -ms-transform: translateY(4px);
    transform: translateY(4px);
  }
  66.6% {
    -webkit-transform: translateY(-2px);
    -ms-transform: translateY(-2px);
    transform: translateY(-2px);
  }
  83.25% {
    -webkit-transform: translateY(1px);
    -ms-transform: translateY(1px);
    transform: translateY(1px);
  }
  100% {
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.wobble {
  -webkit-animation-name: wobble;
  animation-name: wobble;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
  -webkit-animation-iteration-count: 1;
  animation-iteration-count: 1;
}
     </style>


   <script>
function bigImg(x) {
 
  console.log("agrandammos");



}

function normalImg(x) {
 
}
</script>


     <!--div class="fixed-action-btn wobble" id="menuf">
  <a class="btn-floating btn-large black" >
    <i class="large material-icons">dashboard</i>
  </a>
  <ul>
    <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="notificaciones"><i class="material-icons">notifications_active</i>Noticación</a></li>
    <li onmouseover="bigImg(this)" onmouseout="normalImg(this)" ><a class="btn-floating black modal-trigger tooltipped" href="#online" data-position="left" data-tooltip="Localizar" id="lo"><i class="material-icons">location_on</i>Rastrear</a></li>
    <li><a href="dispositivos" class="btn-floating green tooltipped" data-position="left" data-tooltip="Mis vehículos"><i class="material-icons">directions_car</i>Mis vehículos</a></li>
    <li><a href='index' class="btn-floating blue tooltipped" data-position="left" data-tooltip="Home"><i class="material-icons">home</i></a></li>
  </ul>
</div-->








    <script>
    $(function () {
        //$(".navbar-toggler").click();
       
    });

    
</script>


</body>
</html>
