<div class="modal warning" id="modal-editar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-editar" action="{{ $action }}" method="post" data-action="{{ $action }}">
                @csrf
                <div class="modal-body text-left">
                    <p>{{ $slot }}</p>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="actualizar" class="btn btn-danger">Guardar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@push('scripts')
    <script>
        input = document.getElementById('name');
        input.addEventListener('input', function(evt) {
            this.setCustomValidity('');
        });
        input.addEventListener('invalid', function(evt) {
            // Required
            if (this.validity.valueMissing) {
                this.setCustomValidity('Por favor complete el nombre!');
            }
        });

        input = document.getElementById('abbreviation');
        input.addEventListener('input', function(evt) {
            this.setCustomValidity('');
        });
        input.addEventListener('invalid', function(evt) {
            // Required
            if (this.validity.valueMissing) {
                this.setCustomValidity('Por favor complete la abreviacion!');
            }
        });
        
        function updateRoutes(id,valor) {
            
            for(var i=0 ; i< valor.length; i++ ){
                let value = valor[i];
                if(value.id == id){
                    $('#name').val(value.name);
                    $('#abbreviation').val(value.abbreviation);
                }
            }

            const $form = $('#form-editar');
            let action = $form.data('action');
            action = action.replace('*', id);
            $form.attr('action', action);
        
        }

    </script>
@endpush
