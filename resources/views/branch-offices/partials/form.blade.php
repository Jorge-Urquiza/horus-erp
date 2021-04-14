<div class="form-group row">
    <div class="col-12 col-lg-3">
        {{ Form::label('name', 'Nombre:', ['class' => 'weight-500'])}}
        {{ Form::text('name', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('address','Dirección:', ['class' => 'weight-500']) }}
        {{ Form::text('address', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('telephone', 'Telefono:') }}
        {{ Form::text('telephone', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('city', 'Ciudad:') }}
        {{ Form::text('city', null, ['class'=> 'form-control'])}}
    </div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
