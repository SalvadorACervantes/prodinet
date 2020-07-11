@extends('layout')
@section('content')
<div class="container">

	<div class="row">


		<div class="col-9">
		<div class="d-flex justify-content-between align-items-center mb-3">


		</div>

			<ul class="list-group">
				@forelse($product as $productos)
				<li class="list-group-item border-bottom-1 border-left-0 border-top-0 border-right-0 border" style="border-radius: 0">
					<div class="row">
						<div class="col-md-3 justify-content-center view overlay zoom">
							<a href="{{ route('products.show', $productos)}}">
							<img src="http://prodinetpc.net/ventas/imagenes/Prodinet/{{$productos->Imagen}}"
							class="img-fluid "
							href="{{ route('products.show', $productos)}}"
							alt="{{$productos->Imagen}}"></a>
							<div class="mask flex-center waves-effect waves-light">
    							<p class="white-text"></p>
  							</div>
						</div>
						<div class="col-md-7">
							<div>
								<a class="d-flex justify-content-between align-items-center"
									href="{{ route('products.show', $productos)}}">
									<span class="font-weight-normal success-lighter-hover text-dark" style="font-size:17px;">
										{{$productos->Nombre}}
									</span>
								</a>
							</div>
							<div>
								<p class="grey-text" style="font-size:15px; font-family:sans-serif "><strong>MARCA:</strong>
										{{$productos->Marca}}
									</p>
							</div>
							<div>
								<h4 class="font-weight-normal">$ {{number_format($productos->Precio,2,".",",")}} </h4>
							</div>
							<div>
								@if($productos->Cantidad<1)
									<p class="text-danger">
										<strong>Producto agotado</strong>
									</p>

								@else
									<span class="text-primary">
										<strong>Disponibles: {{$productos->Cantidad}} pzs.</strong>
									</span>
								@endif
							</div>


						</div>
					</div>

				</li>
				@empty
					<li class="list-group-item border-0 mb-3 shadow-sm">Lo sentimos, ningún producto encontrado.</li>
				@endforelse
				<div class="py-3">
					<nav aria-label="Page navigation example">
  						<ul class="pagination justify-content-center">

							{{ $product
								->appends($_GET)->links()}}
							</ul>
						</nav>
				</div>



			</ul>
		</div>
	</div>
</div>
@endsection
