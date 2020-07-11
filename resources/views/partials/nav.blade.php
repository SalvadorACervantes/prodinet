
<nav class="navbar navbar-expand-lg navbar-light shadow-sm py-0 px-0 ">

	<div class="container">

		<a class="navbar-brand" href="{{ route('home')}}">
            <img src="/img/logo2.png" style="width: 140px; margin-top: 2px ;">
		</a>

		<button class="navbar-toggler btn-warning" type="button"
			data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="{{ __('Toggle navigation') }}">
        	<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
        	<!----FORMULARIO PARA LA BUSQUEDA---->
        	<div class="col">
			 	<form action="{{ route('products.search') }}" method="GET" class="form">
			 		<div class="input-group-prepend">
  				  		<input
  				  			type="search"
  				  			name="q"
  				  			value="{{ request()->input('q') }}"
  				  			placeholder="¿Qué buscas el día de hoy?"
  				  			required
  				  			class="form-control border-0 shadow-sm"
  				  			style="border-radius: 0"
  				  			>

                  				<button class="btn btn-warning btn-sm my-0 waves-effect waves-light" type="submit" title="Buscar productos" style="border-radius: 0"
                  					>
                  					<span class="black-text"> <i class="fas fa-search fa-lg" aria-hidden="true"></i></span>
                  				</button>

  				  	</div>
				</form>
			</div>
			<!---- TERMINA FORMULARIO PARA LA BUSQUEDA---->
			<!---- LISTA DE MENU PRINCIPAL---->
			<div class="col-4 dropdown-sm">
				<ul class="navbar-nav flex-row ">
					<li class="nav-item">
						<a class="nav-link dropdown-toggle text-white w-60" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							@guest
								Mi Cuenta
							@endguest
							@auth
								<span>
									<img width="25" height="25" style="border-radius: 150px" src="/storage/avatars/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}">
								</span><span> {{Auth::user()->name}}</span>
							@endauth</a>
						<div class="dropdown-menu dropdown-primary"  aria-labelledby="navbarDropdown" style="border-radius: 0">
							@guest
								<a class="dropdown-item" href="{{route('login')}}">Iniciar Sesion</a>
								<a class="dropdown-item" href="{{route('register')}}">Crear cuenta</a>
							@endguest
							@auth
								<a class="dropdown-item" href="{{route('account.index')}}">Mi cuenta</a>
								<a class="dropdown-item" href="#">Mis Compras</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			        	 			Salir
			        	 		</a>
			        	 		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                        @csrf
			                    </form>
							@endauth

						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white" href="{{route('mycart')}}">
							<svg class="bi bi-cart2"
								width="20px"
								viewBox="0 0 16 16"
								fill="currentColor"
								xmlns="http://www.w3.org/2000/svg">
  									<path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
								</svg>
							@if($productsCount>=1)
							<span class="badge badge-warning">{{$productsCount}}</span>
							@else
							@endif
						</a>
					</li>
				</ul>
			</div>
  	 	</div>
  	 		<!----TERMINA LISTA DE MENU PRINCIPAL---->
   </div>
</nav>


