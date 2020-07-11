@extends('layout')

@section('content')
	<div class="container py-3">
		<div class="row">

			<div class="col-md-4 bg-white shadow-sm p-4 card">
				<h4 class="red-text">Atencion a clientes</h4>
				<hr>
				<div class="col-md-12 table-responsive-md">
					<table class="table">
						<tbody>
							<tr>
								<td>Tuxtla Gutierrez,Chiapas</td>
								<td>(961) 6001385</td>
							</tr>
						</tbody>
						<p>Lunes a sabado de 9:00 a 21:00 hrs </p>
						<p><a href="mailto:tienda@prodinetpc.net">tienda@prodinetpc.net</a></p>
						<p>Siguenos en</p>
						<p>
							<a href=""><i class="fab fa-facebook-square fa-2x blue-text"></i></a>
							<a href=""><i class="fab fa-twitter-square fa-2x"></i></a>
						</p>
					</table>

				</div>
			</div>

			<div class="col-md-6 mx-auto">

				<form class="bg-white shadow-sm rounded py-3 px-4 " method="POST" action="{{ route('messages.store')}}" id="contact" >
					<h4>Contáctanos</h4>
					<p>Si necesitas ponerte en contacto con nosotros, puedes hacerlo mediante el siguiente formulario:</p>
					@csrf
					<div class="form-row md-form">
						<label for="name">Nombre *</label>
						<input class="form-control
						@error('name')is-invalid  @enderror"
						type="text" id ="name" name="name" value="{{old('name',Auth::user()->name ?? '')}}">
						@error('name')
							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
						@enderror
					</div>

					<div class="form-row md-form">
						<label for="email">Correo *</label>
						<input  class="form-control
						@error('email') is-invalid @enderror"
						type="text" id="email" name="email" style="border-radius: 0" value="{{old('email',Auth::user()->email ?? '')}}">
						@error('email')
							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
						@enderror
					</div>

					<div class="form-row md-form">
						<label for="subject">Asunto *</label>
						<input class="form-control
						@error('subject') is-invalid @enderror"
						type="text" id="subject" name="subject"  style="border-radius: 0" value="{{old('subject')}}">
						@error('subject')
							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
						@enderror
					</div>
					<div class="form-row md-form">
						<label for="content">Contenido *</label>
						<textarea  class="md-textarea md-textarea-auto form-control
						@error('content') is-invalid @enderror"
						name="content" id="content" style="border-radius: 0">{{old('content')}}</textarea>
						@error('content')
							<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
						@enderror
					</div>
					<div  class="row justify-content-between">
					{!! NoCaptcha::displaySubmit('contact', 'Enviar', ['class' => 'btn btn-info btn-lg','data-badge' =>'bottomleft']) !!}
                                 @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-danger text-center" role="alert">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                    </div>
				</form>
			</div>
		</div>
	</div>
@endsection