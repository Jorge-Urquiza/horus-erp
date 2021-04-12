<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Nombre</label>
            {{ Form::text('name', null, ['id' => 'name','class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) }}
            {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
            
        </div>
    </div>
    
</div>
   
   
   