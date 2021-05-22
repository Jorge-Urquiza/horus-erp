<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-delete" action="{{ $action }}" method="post" data-action="{{ $action }}">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                    <img class="img-fluid" src="{{ asset('img/confirm.gif') }}" alt="Confirmar eliminación">
                    <p>{{ $slot }}</p>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fa fa-undo"></i>
                         No, Cancelar
                    </button>
                    </button>
                    <button type="submit" class="btn btn-danger">
                        @if (isset($delete) && $delete)
                            {{ $delete }}
                        @else
                        <i class="fa fa-trash" aria-hidden="true"></i> Si, eliminar
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function updateRoute(id) {
            const $form = $('#form-delete');
            let action = $form.data('action');
            action = action.replace('*', id);
            $form.attr('action', action);
        }
    </script>
@endpush
