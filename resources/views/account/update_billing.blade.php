<div class="modal fade" id="update_billing">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content p-4">
                <div class="">
                    <h4>Actualizar mi información fiscal</h4>
                </div>
                    <form  enctype="multipart/form-data" method="POST" action="{{route('update_billing.account',[$id = $billing->id ?? ''])}}" >
                        @method('PATCH')
                        @include('account.form_billing')
                    </form>

        </div>
    </div>
</div>