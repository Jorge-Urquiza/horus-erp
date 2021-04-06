<div class="modal fade" id="modal-asignar-{{ $user->id }}"
    tabindex="-1" role="dialog" aria-labelledby="modal-editLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('asignar.usuario.sucursal') }}">
                @csrf
                <div class="modal-body">
                    <h5 class="modal-title">Asignar sucursal a :</h5>
                    <p>{{ $user->getFullName() }}</p>
                    <div class="form-group">
                        <label for="sucursal" class="col-form-label">Sucursal*</label>
                        <select id="sucursal" data-show-subtext="true" data-live-search="true" class="form-control selectpicker"
                            name="sucursal_id" required>
                        <option disabled selected>Selecciona una sucursal</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
