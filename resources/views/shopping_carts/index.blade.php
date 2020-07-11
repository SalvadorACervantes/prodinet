@extends('layout')

@section('content')

<div class="container py-3">

		<div class="bg-white">
			 <ol class="breadcrumb bg-white shadow-sm">
    			<li class="breadcrumb-item"><a class="text-info" href="{{ URL::previous() }}">Volver al listado</a></li>
    			<li class="breadcrumb-item"><a class="text-muted">Tienes {{$productsCount}} producto(s) en tu carrito</a></li>
  			</ol>
		</div>
		<div class="col-md-12 bg-white p-4 shadow-sm border">
			<div class="col-md-12">
				@if($productsCount>=1)
					<div class="row">
						<table class="table table-hover table-sm">
							<thead class="" style="color: gray">
								<tr>
									<td><b>Producto</b></td>
									<td></td>
									<td><b>Cantidad</b></td>
									<td style="text-align: center;"><b>Precio Unit</b></td>
									<td><b>Total</b></td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@forelse($products as $productos)
									<tr>
										<td width="80px" height="80px">
											<img style="width: 60px; height: 60px;" src="http://prodinetpc.net/ventas/imagenes/Prodinet/{{$productos->Imagen}}">
										</td>
										<td>
											<div class="mr-auto">
												<div class="d-inline-block text-truncate" style="max-width: 400px;">
													<strong>{{$productos->Nombre}}</strong>
												</div>
												<div class="row text-muted">
													<div class="col-5">
														<p>SKU: {{$productos->Clave}}</p>
													</div>
													<div class="col-3">
														<p >Disponibles {{$productos->Cantidad}}</p>
													</div>
												</div>
												<div></div>
											</div>
										</td>
										<td style="text-align: center;">
											{{$productos->pivot->cantidad}}
										</td>
										<td style="text-align: center;">
											<strong>$ {{number_format($productos->Precio,2,".",",")}}</strong>
										</td>
										<td>
											<p>$ {{number_format($productos->pivot->subtotal,2,".",",")}}</p>
										</td>
										<td>
											<form method="POST" action="{{ url('in_shopping_carts',$productos->id)}}">
     											 @csrf
     											 @method('DELETE')
     											<button type="submit" class ="btn btn-danger waves-effect btn-sm" aria-label="Close" title="Eliminar del carrito">
  													<i class="far fa-trash-alt fa-lg"></i>
												</button>

    										</form>
										</td>

									</tr>
								@empty
								@endforelse
							</tbody>
							<tfoot>
							</tfoot>
						</table>


					</div>

					<div class="row">
						<div class="col-9">

						</div>
						<div class="col-3 bg-gray">
							<table class="table table-bordered table-sm">
								<tr>
									<td>
										Total de productos
									</td>
									<th>
										$ {{$total}}
									</th>
								</tr>
								<tr>
									<td>
										Costo de envio
									</td>
									<th>
										$ 0.00
									</th>
								</tr>
								<tr>
									<td>
										Total a pagar
									</td>
									<th>
										$ {{$total}}
									</th>
								</tr>
							</table>

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-9"></div>
						<div class="col-3">
							@auth
								<a href="{{ route('PayPalPayment') }}">Paypal</a>
							@endauth
						</div>
					</div>

				@else
					<div class="row">
						<div class="col-12 col-lg-2">
						<img class="img-fluid mb-4" src="/img/empty.svg" alt="about">
					</div>
						<h4 class="px-2 py-5">Tu carrito está vacío</h4>
					</div>

				@endif
			</div>
		</div>
@endsection