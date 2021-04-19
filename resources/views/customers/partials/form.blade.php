<div class="form-group row">
    <div class="col-12 col-lg-3">
        {{ Form::label('name', 'Nombre:', ['class' => 'weight-500'])}}
        {{ Form::text('name', null, ['class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) }}
        {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('last_name','Apellidos:', ['class' => 'weight-500']) }}
        {{ Form::text('last_name', null, ['class'=> ' form-control'. ( $errors->has('last_name') ? ' is-invalid' : '' )]) }}
        {!! $errors->first('last_name','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('telephone', 'Celular:') }}
        {{ Form::text('telephone', null, ['class'=> ' form-control'. ( $errors->has('telephone') ? ' is-invalid' : '' )]) }}
        {!! $errors->first('telephone','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('ci', 'CI:') }}
        {{ Form::text('ci', null, ['class'=> 'form-control'. ( $errors->has('ci') ? ' is-invalid' : '' )])}}
        {!! $errors->first('ci','<span class="invalid-feedback d-block">:message</span>') !!}
    </div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
