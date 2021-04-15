<div class="modal fade" id="eliminar"
    tabindex="-1" role="dialog" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('asignar.usuario.sucursal') }}">
                @csrf
                <div class="modal-body">
                    <h5 class="modal-title">Eliminar</h5>
                    Esta Seguro de eliminar el Proveedor?

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
