@extends('layouts.app')

@section('content')

<style type="text/css">
    
    body{

       background-image: url('img/slider_cosoavl4.jpg');
       background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<script type="text/javascript">
    
    $(document).ready(function(){

        $("#sw").submit(function(){

            $("#re").css("display","");

        })

    });

</script>


<div id="main">
  <div class="row  vertical-modern-dashboard">

   <div class="col s7"></div>


    <div class="col s12 m2 l5 center-a">
      <div class="card" style="border-radius: 10px;opacity: .9;">
        <div class="card-content">
            <center><h2 class="card-title mb-0"><b>Registro a Gps Tracker</b></h2></center>

            <div class="card-body" style="margin-top:20px;">
                    <form method="POST" action="{{ route('register') }}" id="sw">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Nombre completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="font-size:18px;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="font-size:18px;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="font-size:18px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m2 l12">
 <center>
  <a href="https://localizaminave.com/privacy-policy" target="_blank" style="color:#00bcd4;">Política de privacidad</a> Y <a href="https://localizaminave.com/terminos" target="_blank" style="color:#00bcd4;">Términos y condiciones</a></center>
                           
    
                                <button type="submit" class="waves-effect waves-light btn" style="width: 100%;height: 50px;font-size: 20px;margin-top: 10px;" id="activasub">
                                    Registrarme<i class="material-icons right">chevron_right</i>

                                      <div class="preloader-wrapper big active" style="width:20px;height: 20px;display:none;" id="re">
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
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

      </div>
    </div>
   </div>
  </div>

  <div class="row">

    <div class="row vertical-modern-dashboard">
        <div class="col s12 m2 l12 animate fadeRight" style="background-color:#000;">
            <div class="card" style="background-color:#000;color:#fff;">
                 <div class="card-content">
            Estás a unos pasos de disfrutar de los beneficios que localizaminave tiene para ti, rastrea tus dispositivos de forma segura, activa  geocercas, alertas de movimiento y mucho más...Al registrarte aceptas los términos y condiciones de localizaminave.com
                </div>
           </div>
        </div>
  </div>
 </div>

</div>

@endsection
