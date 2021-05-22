<div class="form-group row">
    <div class="col-12 col-lg-5">
        {{ Form::label('name', 'Nombre',  ['class' => 'col-form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'border-danger':''), 'id'=> 'name']) }}
    </div>
    <div class="col-12 col-lg-5">
        {{ Form::label('description', 'Descripción',  ['class' => 'col-form-label']) }}
        {{ Form::text('description', null, ['class' => 'form-control '.($errors->has('description') ? 'border-danger':''), 'id'=> 'description']) }}
    </div>
</div>
<div class="row mx-auto">
    @foreach ($permisos as $index => $permiso)
        @if(count($permisos) / 2  === $index)
        <div class="col-lg-6">
            <ul class="list-inline">
                <li>
                    {{ Form::checkbox('permissions[]', $permiso->id, null, ['class' => 'form-check-input']) }}
                    <label class="form-check-label">{{ $index+1 . '.- ' .$permiso->description }}</label>
                </li>
            </ul>
        </div>
        @else
        <div class="col-lg-6">
            <ul>
                <li>
                    {{ Form::checkbox('permissions[]', $permiso->id, null, ['class' => 'form-check-input']) }}
                    <label class="form-check-label">{{ $permiso->description }}</label>
                </li>
            </ul>
        </div>
        @endif
    @endforeach
</div>
<div class="row mt-3">
    <button type="submit" class="btn btn-outline-primary ml-3">
        <i class="fa fa-save" aria-hidden="true"></i> Guardar
    </button>
</div>
