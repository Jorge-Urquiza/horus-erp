<div class="modal fade" id="modal-crear" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form-crear" action="{{ $action }}" method="post" data-action="{{ $action }}">
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
    

        function crearRoute() {
            $('#name').val("");
            const $form = $('#form-crear');
            let action = $form.data('action');
            //action = action.replace('*', id);
            $form.attr('action', action);
        }

        
    </script>
@endpush
