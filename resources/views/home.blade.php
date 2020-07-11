@extends('layout')
@section('content')

<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<div class="container-fluid">
<div class="row">
	<div class="col"></div>
	<div class="col-md-auto">
		<div id="procarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				@forelse($banner as $banners)
			    	<div class="carousel-item @if($banners->name == 'banner.jpg') active @endif ">
			      		<img class="d-block w-100" src="/storage/banners/{{$banners->name}}">
			    	</div>
			    @empty
			   	@endforelse
			</div>
				<a class="carousel-control-prev" href="#procarousel" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#procarousel" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>
		</div>
	</div>
	<div class="col"></div>
</div>
</div>
<section>
 	<div class="container py-4">
 		<h3 class="text-muted">Ofertas</h3>
 	</div>
 	<div class="container p-2">
      <div class="row">
        <div class="col-sm-12">
          <div class="owl-carousel">
          	@forelse($product as $productos)
            <div class="card shadow-sm col-sm" style="width: 224px; height: 314px; border-radius: 0">
 				<div class="view overlay zoom row justify-content-center">
 					<img class="card-img-top py-2" style="width: 200px; height: 180px;"src="http://prodinetpc.net/ventas/imagenes/Prodinet/{{$productos->Imagen}}" >
 				 	<a href="{{route('products.show',$productos)}}">
 				 		<div class="mask rgba-white-slight"></div>
 				 	</a>
 				 </div>
  				 <div class="card-body" style="width: 224px; height: 32px">
    				<h4 class="card-title">${{ $productos->Precio}}</h4>
    				<p class="card-text" style="font-size: 13px">{{ $productos->Nombre}}</p>
 				</div>
			</div>


			@empty
			@endforelse

          </div>
      </div>
  </div>
</div>
</section>

<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" async></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js')}}" async></script>
 <script>
            $(document).ready(function(){
              	$('.owl-carousel').owlCarousel({
    				items:4,
    				loop:true,
    				margin:3,
    				autoplay:true,
    				autoplayTimeout:2000,
    				autoplayHoverPause:true,
    				dots:false
				})
            });
</script>

@endsection