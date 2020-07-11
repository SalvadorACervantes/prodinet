@extends('layout')
@section('content')
	<div class="container py-3">
		<div class="row justify-content-center">
			<div class="col-md-8 py-2">
			<h2>Actualizar domicilio</h2>
			</div>
			<div class="col-md-8 bg-white shadow-sm p-5">
				<form method="POST" action="{{route('update_address.account',[$id=$address->id])}}">
					@method('PATCH')
					@include('account.form_address')
				</form>
			</div>
		</div>
	</div>
@endsection