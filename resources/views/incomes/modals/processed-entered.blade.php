<div class="modal fade" id="modal-status" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-ingresar" action="{{ $action }}" method="POST" data-action="{{ $action }}">
                @csrf
                <div class="modal-body text-center">
                    <p>{{ $slot }}</p>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancelar</button>
                    <button type="submit" class="btn btn-danger">
                        @if (isset($delete) && $delete)
                            {{ $delete }}
                        @else
                            Si, Confirmar
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function ingresar(id) {
            const $form = $('#form-ingresar');
            let action = $form.data('action');
            action = action.replace('*', id);
            $form.attr('action', action);
        }
    </script>
@endpush
