@extends('layout')
@section('content')
@include('account.edit_account')
@include('account.edit_phone')
@include('account.create_billing')
@include('account.update_billing')
	<div class="container py-4">
	  	<ol class="breadcrumb bg-white shadow-sm">
	    		<li class="breadcrumb-item">
	    			<a href="{{route('home')}}">
	    				<i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar
	    			</a>
	    		</li>
	  	</ol>
		<div class="col-12 bg-white shadow-sm p-5">
			<div class="row">
				<div class="col-sm-6">
					<h4>Mis Datos</h4>
					<div class="row">
						<div class="col-sm-12">
							<ul class="list-group list-group-flush shadow-sm">
								<li class="list-group-item list-group-item-action disable">
									<div class="row">
										<strong class="col-md-2 font-weight-bold text-black">
											<i class="far fa-envelope fa-lg"></i>
										</strong>
										<div class="col-md-9 text-muted">
											{{$user->email}}
										</div>
									</div>
								</li>
								<li class="list-group-item list-group-item-action">
									<div class="row">
										<strong class="col-md-2 font-weight-bold text-black">
											<i class="far fa-user fa-lg"></i>
										</strong>
										<div class="col-md-9 text-muted">
											{{$user->name}} {{$user->lastname}}
										</div>
										<div class="col-md">
											<a href="{{route('edit.account')}}" data-toggle="modal" data-target="#update_name" ><i class="fas fa-angle-right fa-lg"></i></a>
										</div>
									</div>
								</li>
								<li class="list-group-item list-group-item-action">
									<div class="row">
										<strong class="col-md-2 font-weight-bold text-black">
											<i class="fas fa-mobile fa-lg"></i>
										</strong>
										<div class="col-md-9 text-muted">
											{{$user->telephone}}
										</div>
										<div class="col-md">
											<a href="{{route('edit_phone.account')}}" data-toggle="modal" data-target="#update_phone" ><i class="fas fa-angle-right fa-lg"></i></a>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div>
					<br>
					<h4>Facturación</h4>
					<div class="row">
						<div class="col-sm-12">
							<ul class="list-group list-group-flush shadow-sm">
								<li class="list-group-item list-group-item-action disable">
									<div class="row">
										<strong class="col-md-2 font-weight-bold text-black">
											<i class="fas fa-receipt fa-lg"></i>
										</strong>
										<div class="col-md-9">
											@if(!empty($billing))
												<b>Razon Social:</b><p class="text-muted"> {{$billing->business_name}}</p>
												<b>RFC:</b><p class="text-muted"> {{$billing->rfc}}</p>
											@else
												Completar informacion
											@endif
										</div>
										<div class="col-md">
											@if(!empty($billing))
												<a href="{{route('edit_billing.account')}}" data-toggle="modal" data-target="#update_billing" ><i class="fas fa-angle-right fa-lg"></i></a>
											@else
											 	<a href="{{route('create_billing.account')}}" data-toggle="modal" data-target="#create_billing" ><i class="fas fa-edit fa-lg"></i></a>
											@endif
										</div>

									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<h4>Datos de envio</h4>
					<div class="row">
						<div class="col-sm-12">
							<ul class="list-group list-group-flush shadow-sm">
								<li class="list-group-item list-group-item-action disable">
									<div class="row">
										<strong class="col-md-2 font-weight-bold text-black">
											<i class="fas fa-map-marker-alt fa-lg"></i>
										</strong>
										<div class="col-md-9">
											@if(!empty($address || $province))
												<strong class="text-black">
													{{$address->street}} {{$address->ext_number}},{{$address->suburb}},{{$address->city}}
												</strong><br>
												<div class="text-muted">
													{{$address->street_1}} y {{$address->street_2}} <br>
													{{$address->additiona ?? '' }}
													{{$province->name}} ({{$address->postcode}}), {{$address->country}} <br>
													{{$address->name}} {{$address->lastname}}
												</div>
											@else
												No tienes ninguna dirección cargada
											@endif
										</div>
										<div class="col-md">
											@if(!empty($address))
												<a href="{{route('edit_address.account') }}" title="Actualizar"><i class="fas fa-angle-right fa-lg"></i></a>
											@else
											 	<a href="{{route('create_address.account')}}"><i class="fas fa-edit fa-lg"></i></a>
											@endif
										</div>

									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('extra-js')
 @if($errors->any())
    <script>
        $('#update_name').modal('show');
    </script>
    @endif
@endsection