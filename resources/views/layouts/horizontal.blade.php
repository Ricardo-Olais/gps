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
      .sidenav li > a {
        font-size: 18px;
      }
      #inferior {
        position: absolute; /*El div será ubicado con relación a la pantalla*/
        left: 0px; /*A la derecha deje un espacio de 0px*/
        right: 0px; /*A la izquierda deje un espacio de 0px*/
        bottom: 50px; /*Abajo deje un espacio de 0px*/
        height: 50px; /*alto del div*/
        z-index: 100;
      }

      .parpadea {
        animation-name: parpadeo;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;

        -webkit-animation-name: parpadeo;
        -webkit-animation-duration: 1s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
      }

      @-moz-keyframes parpadeo {
        0% {
          opacity: 1;
        }
        50% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }

      @-webkit-keyframes parpadeo {
        0% {
          opacity: 1;
        }
        50% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }

      @keyframes parpadeo {
        0% {
          opacity: 1;
        }
        50% {
          opacity: 0;
        }
        100% {
          opacity: 1;
        }
      }



    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



</head>
<body>

   <?php

          function isMobile() {
                      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
                    }
?>
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



 <div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper" style="background-color:black;">
      <a href="#!" class="brand-logo">
          <img src="images/color.png" alt="materialize logo" width="60">
      </a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="font-size: 45px !important;">menu</i></a>
      <ul class="right hide-on-med-and-down">

        @if (Auth::guest())

            <li class="bold">
              <a class="waves-effect waves-cyan " href="login">
                <i class="material-icons" style="color:#00bcd4;">location_on</i>
                <span class="menu-title" data-i18n="User Profile">Iniciar Sesión</span>
              </a>
            </li>
        
           <li class="bold">
            <a class="waves-effect waves-cyan " href="register">
              <i class="material-icons">person_add</i>
              <span class="menu-title" data-i18n="User Profile">Regístrate</span>
            </a>
          </li>
         @else
            <ul class="navbar-list right">
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



   @endif
        <!--li><a href="tracker"><i class="material-icons" style="color:#00bcd4;">location_on</i> Rastrear</a></li>
        <li><a href="dispositivos"><i class="material-icons">drive_eta</i> Mis dispositivos</a></li>
        <li><a href="compra_gps"><i class="material-icons">monetization_on</i> Comprar</a></li>
        <li><a href="register"><i class="material-icons">person_add</i> Regístrate</a></li>
        <li><a href="login"><i class="material-icons">vpn_key</i> Login</a></li-->


      </ul>
    </div>
  </nav>
</div>

  <ul class="sidenav" id="mobile-demo">
     <li><a href="index"><i class="material-icons">home</i> Inicio</a></li>
        <li><a href="tracker"><i class="material-icons" style="color:#00bcd4;">location_on</i> Rastrear</a></li>
        <li><a href="compra_gps"><i class="material-icons">monetization_on</i> Planes de Servicio</a></li>

        @if (Auth::guest())

          <li class="bold">
            <a class="waves-effect waves-cyan " href="register">
              <i class="material-icons">person_add</i>
              <span class="menu-title" data-i18n="User Profile">Regístrate</span>
            </a>
          </li>

          <li class="bold">
              <a class="waves-effect waves-cyan " href="login">
                <i class="material-icons" style="color:#00bcd4;">location_on</i>
                <span class="menu-title" data-i18n="User Profile">Iniciar Sesión</span>
              </a>
            </li>
        
        



           @else
           <li><a href="dispositivos"><i class="material-icons">drive_eta</i> Dispositivos</a></li>
           <li><a href="reportes"><i class="material-icons">description</i> Reportes</a></li>





           <?php if(isMobile()) { ?>



           <ul class="navbar-list right">
             <li>
            <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
              <span><b>{{ Auth::user()->name }}</b></span>
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

              </li>
            </ul>
          </li>
          
        </ul>

      <?php } ?>



        @endif
        


        


        
        <!--li><a href="register"><i class="material-icons">person_add</i> Regístrate</a></li-->
        <!--li><a href="login"><i class="material-icons">vpn_key</i> Login</a></li-->
  </ul>


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
   // $('.sidenav').sidenav();
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


        <footer class="page-footer" style="background-color:black;">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Localizaminave.com</h5>
                <p class="grey-text text-lighten-1" style="font-size:18px;">Conoce en donde se encuentran tus seres queridos, localizador familiar, preciso y seguro. Ahora es el mejor momento para garantizar la seguridad de su familia. Podrás localizarlos en tiempo real.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Legal</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="terminos">Términos y condiciones</a></li>
                  <li><a class="grey-text text-lighten-3" href="privacy-policy">Política de privacidad</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contáctanos</a></li>
                  <li><a class="grey-text text-lighten-3" href="como-funciona">Cómo funciona</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            ©<?php echo date("Y"); ?> Copyright localizaminave.com
            <!--a class="grey-text text-lighten-4 right" href="#!">More Links</a-->
            </div>
          </div>
        </footer>
            

        </main>

    <style type="text/css">
      
      body {
        margin: 0;
        margin-bottom: 40px;
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }



  main {
    flex: 1 0 auto;
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


  




</body>
</html>
