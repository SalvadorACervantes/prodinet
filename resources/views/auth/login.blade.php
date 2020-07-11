@extends('layout')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-3" style="border-radius: 0">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf

                        <p class="h4 mb-4 py-2 text-center">INICIA SESIÓN</p>

                        <div class="form-group md-form">
                                <label for="email">Correo</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="border-radius: 0">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group md-form  py-2">


                                <label for="password">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                style="border-radius: 0">



                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-around">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div>
                                     @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info btn-block my-4" style="border-radius: 0">
                                {{ __('Login') }}
                        </button>

                    </form>
                    <hr>
                    <p class="text-center">¿No tienes cuenta? <a href="{{route('register')}}">Registrarse</a></p>

                </div>
<!---           <div class="card-footer">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a class="btn" target="_b" style="border-radius: 0; background-color: #3b5998; color: white" href="{ route('social.auth', 'facebook') }}"> Iniciar Sesion
                                <i class="fa fa-facebook" style="font-size:24px"></i>
                            </a>
                        </div>
                    </div>
                </div> ---->
            </div>
        </div>
    </div>
</div>
@endsection
