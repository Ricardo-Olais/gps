@extends('layouts.reset')

@section('content')

<style type="text/css">
    body{

        background-image: url('https://localizaminave.com/img/fondo-login.png');
    }

</style>
 <div id="main">
  <div class="row  vertical-modern-dashboard">

   <div class="col s3"></div>


    <div class="col s12 m2 l6 center-a" >
            <div class="card">
                <div class="card-content">
                <div class="card-title">{{ __('Recuperar contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size:18px;">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color:Red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:100%;">
                                    {{ __('Enviar enlace de restablecimiento') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
