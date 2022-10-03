<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="css/vendors.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/themes//style.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/jquery.dataTables.css" rel="stylesheet">

    

    <style type="text/css">
      /*footer {
    min-height: 20px;
    background-color: #e3f2fd;
    width: 100%;
    position: fixed;
    bottom: 0;
    z-index: 100;
}*/
    </style>

</head>
<body>
<div id="app">

<header class="page-topbar" id="header">
  <div class="navbar navbar-fixed">
    <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-shadow" style="background-color:black !important;">
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
              <span class="avatar-status avatar-online">
                <img src="https://pixinvent.com/materialize-material-design-admin-template/app-assets/images/avatar/avatar-7.png" alt="avatar">
                <i></i>
              </span>
            </a>
            <ul class="dropdown-content" id="profile-dropdown" tabindex="0">

                

              <li tabindex="0">
                <a class="grey-text text-darken-1" href="user-profile-page.html">
                  <i class="material-icons">person_outline</i>{{ Auth::user()->name }}</a>
              </li>

          
             
              <li tabindex="0">
                <a class="grey-text text-darken-1" href="page-faq.html">
                  <i class="material-icons">help_outline</i> Ayuda</a>
              </li>
              <li class="divider" tabindex="0"></li>
              <li tabindex="0">
                <a class="grey-text text-darken-1" href="user-lock-screen.html">
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
          <li>
            <a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right">
              <i class="material-icons">format_indent_increase</i>
            </a>
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



<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
  <div class="brand-sidebar" style="background-color:black !important;">
    <h1 class="logo-wrapper">
      <a class="brand-logo darken-1" href="index.html">
        <img src="images/color.png" alt="materialize logo">
        <span class="logo-text hide-on-med-and-down">Gps Tracker</span>
      </a>
      <a class="navbar-toggler" href="#">
        <i class="material-icons">radio_button_checked</i>
      </a>
    </h1>
  </div>


  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow ps ps--active-y" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
    



    <li class="navigation-header">
      <a class="navigation-header-text">Localiza mi nave</a>
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
        <i class="material-icons" style="color:Red;">location_on</i>
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
      <a class="waves-effect waves-cyan " href="planes">
        <i class="material-icons">monetization_on</i>
        <span class="menu-title" data-i18n="User Profile">Nuestros planes</span>
      </a>
    </li>
    <li class="bold">
      <a class="waves-effect waves-cyan " href="terminos">
        <i class="material-icons">view_headline</i>
        <span class="menu-title" data-i18n="User Profile">Términos y condiciones</span>
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
      <a class="waves-effect waves-cyan " href="{{ route('login') }}">
        <i class="material-icons">vpn_key</i>
        <span class="menu-title" data-i18n="User Profile">Login</span>
      </a>
    </li>
    
    @else


    
     <li class="bold">
      <a class="waves-effect waves-cyan " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="material-icons">settings_power</i>
        <span class="menu-title" data-i18n="User Profile">Salir</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </a>
    </li>
   @endif


    
    <div class="ps__rail-x" style="left: 0px; bottom: -656px;">
      <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 656px; height: 265px; right: 0px;">
      <div class="ps__thumb-y" tabindex="0" style="top: 82px; height: 33px;"></div>
    </div>
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


   <script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.parallax').parallax();
  });
   </script>

    <script>
        var token="{{ csrf_token() }}";

    </script>

        <main class="py-4">
            @yield('content')
             <div class="parallax-container">
                <div class="parallax"><img src="img/home/fondo-carro.jpeg"></div>
              </div>
        </main>

      <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-white gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>© <?php echo date("Y");?>       <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">Gps Tracker</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">Localizaminave.com.mx</a></span></div>
      </div>
    </footer>


    </div>


</body>
</html>
