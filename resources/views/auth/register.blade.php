@extends('layout')

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-3" style="border-radius: 0">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register">
                        @csrf
                        <p class="h4 mb-4 text-center">Completa tus datos</p>
                        <div class="form-row mb-4 md-form">
                            <div class="col">
                                <label for="name">Nombre(s)</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                 style="border-radius: 0">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="lastname">Apellidos</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus
                                 style="border-radius: 0">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row md-form">
                            <div class="col">
                                <label for="email">Correo electrónico</label>
                                <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="border-radius: 0">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="telephone">Numero de celular</label>
                                <input id="telephone" type="number" class="form-control mb-4 @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" style="border-radius: 0">
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row md-form">
                            <div class="col">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="border-radius: 0">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="password-confirm">Confirmar contraseña</label>
                                <input id="password-confirm" type="password" class="form-control mb-4" name="password_confirmation" required autocomplete="new-password" style="border-radius: 0">
                            </div>
                        </div>
                        <div class="form-row py-2">
                            <div>
                                {!! NoCaptcha::displaySubmit('register', 'Registrate', ['class' => 'btn btn-info btn-lg','data-badge' =>'bottomleft']) !!}
                                 @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-danger text-center" role="alert">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 my-2">
                                <p style="font-size: 10px" >Al registrarme, declaro que soy mayor de edad y acepto los <a href="">Términos y condiciones</a> y las <a href="">Políticas de privacidad </a> de Prodinet.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
