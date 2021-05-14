<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('name', 'Nombre:', ['class' => 'weight-500'])}}
        {{ Form::text('name', null, ['class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) }}
        {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('last_name','Apellidos:', ['class' => 'weight-500']) }}
        {{ Form::text('last_name', null, ['class'=> ' form-control'. ( $errors->has('last_name') ? ' is-invalid' : '' )]) }}
        {!! $errors->first('last_name','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
<<<<<<< HEAD

</div>
<div class="form-group row">
=======
>>>>>>> ddbc27a4441a8b25a71dbde3c88055c38a16218a
    <div class="col-12 col-lg-6">
        {{ Form::label('telephone', 'Celular:') }}
        {{ Form::text('telephone', null, ['class'=> ' form-control']) }}
        {!! $errors->first('telephone','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('ci', 'CI:') }}
        {{ Form::text('ci', null, ['class'=> 'form-control'. ( $errors->has('ci') ? ' is-invalid' : '' )])}}
        {!! $errors->first('ci','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
