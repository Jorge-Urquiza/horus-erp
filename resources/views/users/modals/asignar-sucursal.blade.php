<div class="modal fade" id="modal-asignar-{{ $user->id }}"
    tabindex="-1" role="dialog" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title">Asignar sucursal a :</h5>
                <p>{{ $user->getFullName() }}</p>
                <form method="POST" action="{{ route('assign.user.branch', $user->id) }}">
                @csrf
                    <div class="form-group">
                        <select class="form-control" name="branch_office_id">
                                @foreach($sucursales as $sucursal)
                                        <option value="{{ $sucursal->id }}">{{ $sucursal->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
