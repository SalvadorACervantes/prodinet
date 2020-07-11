
@extends('layout')
@section('content')
	<div class="container py-3">
			<div class="bg-white">
				 <ol class="breadcrumb bg-white shadow-sm">
	    			<li class="breadcrumb-item"><a class="text-info" href="{{ URL::previous() }}">Volver al listado</a></li>
	    			<li class="breadcrumb-item active" aria-current="page">{{$product->Linea}}</li>
	    			<li class="breadcrumb-item active" aria-current="page">{{$product->Clave}}</li>
	  			</ol>
			</div>
			<div class="bg-white p-4">
				<div class="row">
					<div class="col-md-4">
						<img src="http://prodinetpc.net/ventas/imagenes/Prodinet/{{$product->Imagen}}"
							alt="{{$product->Imagen}}"
							width="300px" 
							class="img-fluid">
					</div>

					<div class="col-md-5">

						<div>
							<span style="font-size:18px; font-family:sans-serif">
								{{ $product->Nombre }}
							</span>
						</div>

						<div>
							<span class="grey-text" style="font-size:12px; font-family:sans-serif">
								SKU: {{ $product->Clave }}
							</span>
						</div>

						<div class="py-2">
							<span style="font-size:20px; font-family:sans-serif;">
								$ {{ number_format($product->Precio,2,".",",")}}
							</span>
						</div>

						@if($product->Cantidad<1)
							<p style="font-family:sans-serif;color: #0066bb">
								Lo sentimos, por el momento este producto está agotado
							</p>
						@else
							@if($product->Cantidad==1)
								<p style="color: orange; font-size:12px" ><i class="fas fa-stopwatch" style="font-size: 20px"></i>
									Solo queda 1 Pieza
								</p>
							@else
								<p style="font-family: sans-serif;font-size: 12px; color: gray">
									Disponibles: {{$product->Cantidad}} pzs.
								</p>
							@endif
							<div>
								<form action="{{ url('in_shopping_carts') }}" method="POST">
									@csrf
									<div class="md-form">
										<label>
											Cantidad
											<input type="number" name="size" value="1" min="1" max="{{$product->Cantidad}}"/>
											<input type="hidden" name="product_id" value="{{$product->id}}">
											<input type="hidden" name="product_price" value="{{$product->Precio}}">
										</label>
									</div>
									<br><br>
									<div>
										<input type="submit" value="Agregar al carrito" class="btn btn-primary">
									</div>
								</form>
							</div>
						@endif
					</div><!--COL 5--->
					<div class="col-md-4"></div>
				</div><!---TERMINA EL ROW-->
				<br>
				<div class=""  style="margin-top: 12px; border-radius: 0">
			   		<div class="card-header"><b>Características del producto</b></div>
			  		<div class="card-body">
			  			{{ strip_tags($product->Descripción)}}
					</div>
				</div>
			</div><!---col-12 base blanco-->
	</div><!--container----->
@endsection