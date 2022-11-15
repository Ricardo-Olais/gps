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
    </style>

    <script>
        var token="{{ csrf_token() }}";

    </script>

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






   <script src="js/vendors.min.js" ></script>
   <script src="js/plugins.min.js" ></script>
   <script src="js/customizer.min.js" ></script>
   <script src="js/search.min.js" ></script>


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

        <main class="py-4">
            @yield('content')
             
        </main>

      <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-white gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>© <?php echo date("Y");?>       <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">Gps Tracker</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">Localizaminave.com.mx</a></span></div>
      </div>
    </footer>


    </div>


</body>
</html>
