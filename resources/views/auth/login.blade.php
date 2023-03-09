@extends('layouts.app')

@section('content')

<style type="text/css">
    
    body{

        background-image: url('images/mapa2.png');
        background-repeat: no-repeat;
        background-size: cover;
        
    }

    span.field-icon {
    float: right;
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
    z-index: 2;
}

.parallax-container{

    display: none !important;
}

.footer {

    position:fixed; 
    bottom: 0;
    width: 100%;
}
</style>

<script type="text/javascript">
    $(document).ready(function(){



   
     $("#slogin2").submit(function(){

     

        $("#slogin").css("display","");

      

       });

    });

</script>

<script>
$(document).ready(function () {
 var clicked = 0;

  $(".toggle-password").click(function (e) {
     e.preventDefault();

    $(this).toggleClass("toggle-password");
      if (clicked == 0) {
        $(this).html('<span class="material-icons">visibility_off</span >');
         clicked = 1;
      } else {
         $(this).html('<span class="material-icons">visibility</span >');
          clicked = 0;
       }

    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
       input.attr("type", "text");
    } else {
       input.attr("type", "password");
    }
   });
});
</script>

 <div id="main">
  <div class="row  vertical-modern-dashboard">



   <div class="col s7">
      <img src="images/color.png" width="140" style="margin-top:50%;margin-left: 250px;">
    
   </div>


    <div class="col s12 m2 l4 center-a" >
      <div class="card" style="border-radius: 10px;opacity:.9;">
        <div class="card-content">
          <center><span class="card-title"><b>Acceso a Gps Tracker <i class="material-icons right">location_on</i></b></span></center>
          
          <div class="card-body" style="margin-top:20px;">
                    <form method="POST" action="{{ route('login') }}" id="slogin2">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="font-size: 18px;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color:red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    <div class='input-field col-md-12'>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password" style="font-size: 18px;">
                     <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Contraseña</label>
                      <span toggle="#password" class="field-icon toggle-password"><span class="material-icons">visibility</span></span>
                     </div>

                    <div class="form-group row">
                         
                            <div class="col-md-6">
                               

                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="color:red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="form-group row mb-0">
                           
                                <center>

                        <label for="password"></label>
      
                              
                        <button type="submit" class="waves-effect waves-light btn" style="width: 100%;height: 50px;font-size: 20px;" id="btnlogin"><i class="material-icons right">navigate_next</i>
                                    {{ __('Entrar') }}

                    <div class="preloader-wrapper big active" style="width:25px;height: 25px;margin-left: 40px;display: none;" id="slogin">
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
                                </button></center>

                                <a href="{{ route('register') }}" class="waves-effect waves-light btn" style="width: 100%;margin-top: 20px;height: 50px;font-size: 15px;background-color: #000;padding: 7px;"><i class="material-icons right">navigate_next</i>
                                    Si aún no tienes cuenta, regístrate
                                </a>

                                @if (Route::has('password.request'))


                                    <a style="width: 100%;margin-top: 10px;background-color: #DCDCDC;color:#000;height: 50px;padding: 7px;" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                           
                        </div>
                    </form>
                </div>




        </div>
        <!--div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div-->
      </div>
    </div>


  </div>




</div>
@endsection
