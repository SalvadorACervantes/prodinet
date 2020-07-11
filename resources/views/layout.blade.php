<!DOCTYPE html>
<html lang="es" class="full-height">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>PRODInet ..:: Cómputo & Tecnología</title>
	<link rel="icon" type="image/icon" href="img/ico.png" size="any"/>
	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/whatsapp_info.css') }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
   	{!! NoCaptcha::renderJs() !!}
    @yield('extra-css')
</head>

<body>
	<div id="app" class="d-flex flex-column h-screen justify-content-between">
			<header>
				<div style="background-color:#1F3844;">
					@include('partials.nav')
				</div>
				@include('partials.session-status')
			</header>
			<main>
				@yield('content')
			</main>
			<footer class="text-black-50 bg-white shadow-sm">
				<!-- Footer Links -->
				<div class="container">
					<div class="row py-4 d-flex align-items-center">
					 	<!---<a href="http://wa.me/5219611903970" class="float" target="_blank" title="Contacto whatsapp">
							<i class="fab fa-whatsapp my-float"></i>
						</a>-->
				        <!-- Grid column -->
				        <div class="col-md-8 col-lg-7 text-center text-md-left mb-4 mb-md-0">
				         	<nav class="nav">
				         		<a class="nav-link text-muted footer-nav" href="{{route('contact')}}">Contacto</a>
				         		<a class="nav-link text-muted footer-nav" href="{{route('about')}}">Quiénes somos</a>
				         		<a class="nav-link text-muted footer-nav" href="{{route('policie')}}">Política de privacidad</a>
				         		<a class="nav-link text-muted footer-nav" href="{{route('terms')}}">Términos & Condiciones</a>
				         	</nav>
			        </div>
				        <!-- Grid column -->

			        	<!-- Grid column -->
				        <div class="col-md-4 col-lg-5 text-md-right">
				          	<!-- Facebook -->
				          	<a href="https://www.facebook.com/PRODInetPC/" target="_blank" arial-label="facebook">
				            	<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 26 26" style="fill:#3b5998">
				            		<path  d="M15.26,4.74h3.68V0H15.26C12.11,0,9.61,2.76,9.61,6.32V8.68H5.92v4.74H9.61V25h4.74V13.42h4.74V8.68H14.34V6.18C14.34,5.39,14.87,4.74,15.26,4.74Z"/>
				            	</svg>
				          	</a>

						</div>
				        <!-- Grid column -->
      				</div>
      				<!-- Grid row-->
				    <hr class="rgba-white-light" style="margin: 0 15%;">

					<div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0" style="margin-top: 15px">
						<div class="row">
								<p style="font-size: 12px">Métodos de pago:</p>
								&nbsp;&nbsp;
								<img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" border="0" alt="PayPal Logo" />
						</div>
					</div>
						<div class="footer-copyright text-center" style="margin-bottom: 20px; font-size: 12px">
							Precios y ofertas sujetos a cambios sin previo aviso. ©{{date('Y')}} {{ config('app.name')}} . Todos los derechos reservados.
						</div>
				</div>


				<!-- Copyright -->
			</footer>
			<!---Termina el pie de pagina-------->
	</div>
	<!---DIV DE PANTALLA-------->
	@include('sweetalert::alert')
	@yield('extra-js')
	<script type="text/javascript" src="{{asset('js/all.js')}}"></script>
	<script type="text/javascript" src="{{mix('js/app.js') }}" defer></script>
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=install_email
        page_id="1771693996382178"
  theme_color="#44bec7"
  logged_in_greeting="¡Hola! como podemos ayudarte?"
  logged_out_greeting="¡Hola! como podemos ayudarte?">
      </div>
</html>