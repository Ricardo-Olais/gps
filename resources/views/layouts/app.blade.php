<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" value="notranslate">
    <title>Gps Tracker</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--meta name="theme-color" content="#00bcd4" /-->
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
      z-index:0;
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
   // document.body.style.zoom = "90%";

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
    <li class="bold">
      <a class="waves-effect waves-cyan " href="index">
        <i class="material-icons">home</i>
        <span class="menu-title" data-i18n="User Profile">Inicio</span>
      </a>
    </li>

    @if (Auth::guest())
    
    @else
     <li class="bold">
  
      <a class="waves-effect waves-cyan " href="tracker">
        <i class="material-icons" style="color:#00bcd4;">location_on</i>
        <span class="menu-title" data-i18n="User Profile">Rastrear</span>
      </a>
 
    </li>

      <li class="bold">
      <a class="waves-effect waves-cyan " href="dispositivos">
        <i class="material-icons">drive_eta</i>
        <span class="menu-title" data-i18n="User Profile">Mis dispositivos</span>
      </a>
    </li>
    @endif

    <li class="bold">
      <a class="waves-effect waves-cyan" href="como-funciona">
        <i class="material-icons">help_outline</i>
        <span class="menu-title" data-i18n="Support">Cómo funciona</span>
      </a>
    </li>
    <li class="bold">
      <a class="waves-effect waves-cyan " href="compra_gps">
        <i class="material-icons">monetization_on</i>
        <span class="menu-title" data-i18n="User Profile">Comprar</span>
      </a>
    </li>
   

    @if (Auth::guest())

     <li class="bold">
      <a class="waves-effect waves-cyan " href="register">
        <i class="material-icons">person_add</i>
        <span class="menu-title" data-i18n="User Profile">Regístrate</span>
      </a>
    </li>

     <li class="bold">
      <a class="waves-effect waves-cyan " href="login">
        <i class="material-icons">vpn_key</i>
        <span class="menu-title" data-i18n="User Profile">Rastrear</span>
      </a>
    </li>


    
    @else


    
     <li class="bold">
      <a class="waves-effect waves-cyan " href="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="material-icons">settings_power</i>
        <span class="menu-title" data-i18n="User Profile">Salir</span>
        <form id="logout-form" action="logout" method="POST" class="d-none">
            @csrf
        </form>
      </a>
    </li>
   @endif
   <center>
    <!--img src="img/tracking-o.gif" width="120" style="margin-top:50px;"-->
  </center>

   <div id="inferior">
    <center>

     <span style="font-size:12px;">© <?php echo date("Y");?> <a href="https://localizaminave.com" target="_blank" style="color:#00bcd4;">Gps Tracker &#174;</a> All rights reserved.</span></center>
  </div>


    
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
             <div class="parallax-container">
                <div class="parallax"><img src="img/home/fondo-carro.jpeg"></div>
              </div>
        </main>

      <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-white gradient-shadow navbar-border navbar-shadow" style="opacity: .9 !important;">
      <div class="footer-copyright">
        <div class="container">

          

          <span class="left hide-on-small-only"><a href="privacy-policy">Política de privacidad</a></span>


          <span class="right hide-on-small-only"><a href="terminos">Términos y condiciones</a></span></div>
      </div>
    </footer>


    </div>

    <script>
    $(function () {
        //$(".navbar-toggler").click();
       
    });

    
</script>


</body>
</html>
