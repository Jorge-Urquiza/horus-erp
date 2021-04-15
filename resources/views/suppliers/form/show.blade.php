<div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Nombre</label>
                {{ Form::text('name', $supplier->name, ['disabled' => 'true','class'=> ' form-control']) }}
              
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Tipo</label>
                {{ Form::text('name', ($supplier->name == 'N')?'Natural':'Juridico', ['disabled' => 'true','class'=> ' form-control']) }}
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Email</label>
                {{ Form::text('email', $supplier->email, ['disabled' => 'true', 'class'=> ' form-control' ]) }}
                
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Telefono</label>
                {{ Form::number('telephone', $supplier->telephone, ['disabled' => 'true', 'min' => '0','class'=> ' form-control'. ( $errors->has('telephone') ? ' is-invalid' : '' )]) }}
                
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Direccion</label>
                {{ Form::text('address', $supplier->address, ['disabled' => 'true' ,'class'=> ' form-control'. ( $errors->has('address') ? ' is-invalid' : '' )]) }}
               
            </div>
        </div>
    </div>