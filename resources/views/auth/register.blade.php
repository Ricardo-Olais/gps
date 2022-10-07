@extends('layouts.app')

@section('content')


<div id="main">
  <div class="row  vertical-modern-dashboard">

   <div class="col s3"></div>


    <div class="col s12 m2 l5 center-a">
      <div class="card">
        <div class="card-content">
            <center><h2 class="card-title mb-0"><b>Registro a Gps Tracker</b></h2></center>

            <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m2 l12">
                                <button type="submit" class="waves-effect waves-light btn" style="width: 100%;">
                                    Registrarme<i class="material-icons right">chevron_right</i>
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
        <div class="col s12 m2 l12 animate fadeRight">
            <div class="card">
                 <div class="card-content">
            Estás a unos pasos de disfrutar de los beneficios que localizaminave tiene para ti, rastrea tus dispositivos de forma segura, activa  geocercas, alertas de movimiento y mucho más...
                </div>
           </div>
        </div>
  </div>
 </div>

</div>

@endsection
