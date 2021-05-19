<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Nombre</label>
            {{ Form::text('name', null, ['class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'required', 'id' => 'namecreate']) }}
            {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Abreviatura</label>
            {{ Form::text('abbreviation', null, ['class'=> ' form-control'. ( $errors->has('abbreviation') ? ' is-invalid' : ''), 'required', 'id' => 'abbreviationcreate' ]) }}
            {!! $errors->first('abbreviation','<span class="invalid-feedback d-block">:message</span>') !!}
        </div>
    </div>
    
</div>
