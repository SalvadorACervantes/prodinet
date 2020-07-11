
<div class="modal fade" id="update_name">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content p-4">
            <form  enctype="multipart/form-data" method="POST" action="{{route('update.account')}}" id="update_name" >
                <div>
                    <h4>Modificar nombre y apellido</h4>
                </div>
                <div>
                    @csrf
                    @method('patch')
                    <div class="md-form">
                    <label for="name">Nombre(s)</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control @error('name')is-invalid @else @enderror" required />
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
	                    @enderror
                    </div>
                    <div class="md-form">
                    <label for="lastname">Apellidos</label>
                    <input type="text" name="lastname" id="lastname" value="{{$user->lastname}}" class="form-control @error('lastname')is-invalid @else @enderror" required />
                            @error('lastname')
                                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                    </div>
                </div>
                <div>
                    <div class="row justify-content-end">

                        <a href="{{route('account.index')}}" class="btn btn-outline-second" data-dismiss="modal">Cancelar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('extra-js')
@parent

@if($errors->has('name') || $errors->has('lastname'))
    <script>
    $(function() {
        $('#update_name').modal({
            show: true
        });
    });
    </script>
@endif
@endsection

