					@csrf
					<div class="form-row md-form">
		    			<div class="form-group col-md-6">
		      				<label for="name">Nombre(s)</label>
		      				<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name',$address->name ?? '')}}" required>
		      				@error('name')
		      					<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
		      				@enderror
		    			</div>
		    			<div class="form-group col-md-6">
		      				<label for="lastname">Apellidos</label>
		      				<input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{old('lastname', $address->lastname ?? '')}}" required>
		      				@error('lastname')
		      					<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
		      				@enderror
		    			</div>
		  			</div>
		  			<div class="form-row">
	  					<div class="form-group col-md-4 md-form">
	  						<label for="postcode">Codigo postal</label>
	  						<input type="text" name="postcode" id="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{old('postcode',$address->postcode ?? '')}}" required>
	  						@error('postcode')
		      					<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
		      				@enderror
	  					</div>
	  					<div class="form-group col-md-4 md-form">
	  						<select id="province" name="province"  class="form-control md-form @error('province') is-invalid @enderror" required>
	        					<option value="" selected>Selecione su estado</option>
	        					@forelse($pro_name as $province)
	        						<option value="{{$province->id}}">{{$province->name}}</option>
	        					@empty
	        					@endforelse
	        				</select>
	  					</div>
	  					<div class="form-group col-md-4 md-form">
	  						<label for="city">Delegación / Municipio</label>
	  						<input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{old('city',$address->city ?? '')}}" required>
	  						@error('city')
	  							<span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong></span>
	  						@enderror
	  					</div>
	  				</div>
	  				<div class="form-row md-form">
	  					<div class="form-group col-md-4">
	  						<label for="suburb">Colonia / Asentamiento</label>
	  						<input type="text" name="suburb" id="suburb" class="form-control @error('suburb') is-invalid @enderror" value="{{old('suburb',$address->suburb ?? '')}}" required>
	  						@error('suburb')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	  					</div>
	  					<div class="form-group col-md-4">
	  						<label for="country">Pais</label>
	  						<input type="text" name="country" id="country" class="form-control" placeholder="Mexico" disabled>
	  					</div>

	  				</div>
		  			<div class="form-row md-form">
	    				<div class="form-group col-md-4">
	      					<label for="street">Calle</label>
	      					<input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{old('street',$address->street ?? '')}}" required>
	      					@error('street')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	    				</div>
	    				<div class="form-group col-md-4">
	      					<label for="ext_number">Nº exterior</label>
	      					<input type="text" name="ext_number" class="form-control @error('ext_number') is-invalid @enderror" id="ext_number" value="{{old('ext_number',$address->ext_number ?? '')}}" required>
	      					@error('ext_number')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	    				</div>
	    				<div class="form-group col-md-4">
	      					<label for="int_number">Nº Interior (opcional)</label>
	      					<input type="text" name="int_number" class="form-control @error('int_number') is-invalid @enderror" id="int_number" value="{{old('int_number',$address->int_number ?? '')}}" >
	      					@error('int_number')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	    				</div>
	  				</div>
	  				<p class="text-muted">¿Entre qué calles está? (opcional)</p>
	  				<div class="form-row md-form">

	  					<div class="form-group col-md-4">
	  						<label for="street_1">Calle 1</label>
	  						<input type="text" name="street_1" id="street_1" class="form-control @error('street_1') is-invalid @enderror" value="{{old('street_1', $address->street_1 ?? '')}}">
	  						@error('street_1')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	  					</div>
	  					<div class="form-group col-md-4">
	  						<label for="street_2">Calle 2</label>
	  						<input type="text" name="street_2" id="street_2" class="form-control @error('street_2') is-invalid @enderror" value="{{old('street_2', $address->street_2 ?? '')}}">
	  						@error('street_2')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	  					</div>
	  				</div>
	  				<div class="form-row">
	  					<div class="form-group col-md-8 md-form">
	  						<label for="additional" class="text-muted">Indicaciones adicionales (opcional)</label>
	  						<textarea name="additional" id="additional" class="form-control md-textarea @error('additional') is-invalid @enderror" rows="3">{{old('additional',$address->additional ?? '')}}</textarea>
	  						@error('additional')
	  							<span class="invalid-feedback"><strong>{{$message}}</strong></span>
	  						@enderror
	  					</div>
	  				</div>
	  				<div class="form-row justify-content-end">
	  					<a href="{{route('account.index')}}" class="btn btn-outline-second">Cancelar</a>
	  					<button type="submit" class="btn btn-success">Guardar</button>
	  				</div>
