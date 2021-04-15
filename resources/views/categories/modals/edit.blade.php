<div class="modal warning" id="modal-editar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-editar" action="{{ $action }}" method="POST" data-action="{{ $action }}">
                @csrf
                <div class="modal-body text-left">
                    <p>{{ $slot }}</p>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function updateRoutes(id,valor) {
          
            for(var i=0 ; i< valor.length; i++ ){
                let value = valor[i];
                if(value.id == id){
                    $('#name').val(value.name);
                }
            }
            
            const $form = $('#form-editar');
            let action = $form.data('action');
            action = action.replace('*', id);
            $form.attr('action', action);
        }

    </script>
@endpush
