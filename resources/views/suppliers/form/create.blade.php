<div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Nombre</label>
                {{ Form::text('name', null, ['class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) }}
                {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Tipo</label>
                <select class="custom-select2 form-control" name="type" style="width: 100%; height: 38px;">
                    @if(isset($supplier))
                        @if($supplier->type == 'N')
                            <option value="N" selected>Natural</option>
                            <option value="J">Juridico</option>
                        @else
                            <option value="N">Natural</option>
                            <option value="J" selected>Juridico</option>
                        @endif
                    @else
                    <option value="N">Natural</option>
                    <option value="J">Juridico</option>
                    @endif
                </select>
                {!! $errors->first('type','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Email</label>
                {{ Form::text('email', null, ['class'=> ' form-control'. ( $errors->has('email') ? ' is-invalid' : '' )]) }}
                {!! $errors->first('email','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Telefono</label>
                {{ Form::number('telephone', null, ['min' => '0','class'=> ' form-control'. ( $errors->has('telephone') ? ' is-invalid' : '' )]) }}
                {!! $errors->first('telephone','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Direccion</label>
                {{ Form::text('address', null, ['class'=> ' form-control'. ( $errors->has('address') ? ' is-invalid' : '' )]) }}
                {!! $errors->first('address','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="col text-right">
                <button class="btn btn-primary btn-sm"
                    type="submit"><span class="icon-copy ti-save"></span>   Guardar</button>
            <div>
        <div>
    </div>