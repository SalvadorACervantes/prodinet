
<div class="modal fade" id="update_phone">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content p-4">
            <form  enctype="multipart/form-data" method="POST" action="{{route('update_phone.account')}}" id="update_phone" >
                <div>
                    <h4>Modificar teléfono</h4>
                </div>
                <div>
                    @csrf
                    @method('patch')
                    <div class="md-form">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" value="{{$user->telephone}}" class="form-control @error('phone')is-invalid @else @enderror" required />
                        @error('phone')
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
