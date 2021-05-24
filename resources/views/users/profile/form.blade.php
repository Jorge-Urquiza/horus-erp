<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('name', 'Nombre:', ['class' => 'weight-500'])}}
        {{ Form::text('name', null, ['class'=> ' form-control', 'required' => true]) }}
    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('last_name','Apellidos:', ['class' => 'weight-500']) }}
        {{ Form::text('last_name', null, ['class'=> ' form-control']) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-4">
        {{ Form::label('telephone', 'Telfono Celular:') }}
        {{ Form::text('telephone', null, ['class'=> 'form-control', 'required' => true]) }}

    </div>
    <div class="col-12 col-lg-4">
        {{ Form::label('ci', 'CI:') }}
        {{ Form::text('ci', null, ['class'=> 'form-control', 'required' => true])}}
    </div>
    <div class="col-12 col-lg-4">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', null, ['class'=> 'form-control', 'required' => true])}}
    </div>
</div>
<button type="submit" class="btn btn-outline-primary">
    <i class="fa fa-save" aria-hidden="true"></i> Actualizar
</button>
