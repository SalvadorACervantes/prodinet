@csrf
    <div class="md-form">
                        <label for="business_name">Razon Social</label>
                        <input type="text" name="business_name" id="business_name" class="form-control @error('business_name')is-invalid @else  @enderror" value="{{old('business_name',$billing->business_name ?? '')}}" required />
                        @error('business_name')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
	                    @enderror
    </div>
    <div class="md-form">
        <label for="rfc">RFC</label>
        <input type="text" name="rfc" id="rfc" class="form-control @error('rfc')is-invalid @else @enderror" value="{{old('rfc',$billing->rfc ?? '')}}" required />
                            @error('rfc')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
    </div>
    <div class="row justify-content-end">
                        <a href="{{route('account.index')}}" class="btn btn-outline-second" data-dismiss="modal">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
    </div>