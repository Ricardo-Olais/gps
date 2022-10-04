@extends('layouts.app')

@section('content')

 <div id="main">
  <div class="row  vertical-modern-dashboard">

   <div class="col s3"></div>


    <div class="col s12 m2 l5 center-a">
      <div class="card">
        <div class="card-content">
          <center><span class="card-title"><b>Acceso a Gps Tracker <i class="material-icons right">location_on</i></b></span></center>
          
          <div class="card-body" style="margin-top:10px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:15px;">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size:15px;">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="form-group row mb-0">
                           
                                <center>
                              
                                <button type="submit" class="waves-light btn" style="border-radius:7px;"><i class="material-icons right">navigate_next</i>
                                    {{ __('Entrar') }}
                                </button></center>

                                @if (Route::has('password.request'))
                                    <!--a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a-->
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
