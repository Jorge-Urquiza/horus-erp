<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Stock Minimo</label>
            {{ Form::number('minimum_stock', null, ['min' => '0','step' => '1' ,'class'=> ' form-control'. ( $errors->has('minimum_stock') ? ' is-invalid' : '' ), 'required', 'id' => 'minimum_stock']) }}
            {!! $errors->first('minimum_stock','<span class="invalid-feedback d-block">:message</span>') !!}
            
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Stock Maximo</label>
            {{ Form::number('maximum_stock', null, ['min' => '0','step' => '1' ,'class'=> ' form-control'. ( $errors->has('maximum_stock') ? ' is-invalid' : '' ), 'required', 'id' => 'maximum_stock']) }}
            {!! $errors->first('maximum_stock','<span class="invalid-feedback d-block">:message</span>') !!}
            
        </div>
    </div>
    
</div>