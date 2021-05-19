<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Nombre</label>
            {{ Form::text('name', null, ['id' => 'name','required' => true, 'class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) }}
            {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Abreviatura</label>
            {{ Form::text('abbreviation', null, ['id' => 'abbreviation','required' => true, 'class'=> ' form-control'. ( $errors->has('abbreviation') ? ' is-invalid' : '' )]) }}
            {!! $errors->first('abbreviation','<span class="invalid-feedback d-block">:message</span>') !!}
        </div>
    </div>
    
</div>
