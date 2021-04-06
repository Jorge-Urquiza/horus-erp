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
<ul>
    @foreach ($permisos as $index => $permiso)
    <li class="card-text">
        <label>{{ $index+1 . '.- ' .$permiso->name }}</label>
        {{ Form::checkbox('permissions[]', $permiso->id, null, null) }}
    </li>
    @endforeach
</ul>
