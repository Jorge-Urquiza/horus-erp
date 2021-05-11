<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Nombre</label>
            {{ Form::text('name', null, ['class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'required', 'id' => 'namecreate']) }}
            {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
            
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Descripcion</label>
            {{ Form::textarea('description', null, ['rows' => '2', 'class'=> ' form-control'. ( $errors->has('description') ? ' is-invalid' : '' ), 'id' => 'descriptioncreate']) }}
            {!! $errors->first('description','<span class="invalid-feedback d-block">:message</span>') !!}
            
        </div>
    </div>
    
</div>