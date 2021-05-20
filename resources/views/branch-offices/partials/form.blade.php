<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('name', 'Nombre:', ['class' => 'weight-500'])}}
        {{ Form::text('name', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('telephone', 'Telefono:') }}
        {{ Form::text('telephone', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('address','Dirección:', ['class' => 'weight-500']) }}
        {{ Form::text('address', null, ['class'=> ' form-control']) }}

    </div>    
    <div class="col-12 col-lg-6">
        {{ Form::label('city', 'Ciudad:') }}
        {{ Form::text('city', null, ['class'=> 'form-control'])}}
    </div>
</div>
<button type="submit" class="btn btn-outline-primary btn-sm">Guardar</button>
