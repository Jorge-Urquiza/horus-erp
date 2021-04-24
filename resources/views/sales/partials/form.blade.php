<div class="form-group row">
    <div class="col-12 col-lg-3">
        {{ Form::label('name', 'Vendedor:', ['class' => 'weight-500'])}}
        {{ Form::text('name', $seller->getFullName(), ['class'=> ' form-control', 'readonly']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('sucursal_id','Sucursal:', ['class' => 'weight-500']) }}
        {{ Form::text('sucursal_id',  $branchOffice->name, ['class'=> ' form-control',
            'readonly' => true, 'id' => 'sucursal_id']) }}

    </div>
    <div class="col-12 col-lg-4">
        {{ Form::label('address','Dirección:', ['class' => 'weight-500']) }}
        {{ Form::text('address',  $branchOffice->address, ['class'=> ' form-control', 'readonly']) }}

    </div>
    <div class="col-12 col-lg-2">
        {{ Form::label('date    ', 'Fecha:') }}
        {{ Form::date('date', \Carbon\Carbon::now() , ['class'=> 'form-control' ,
        'data-timepicker' => true, 'data-language' =>'es','required'=>true]) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-5">
        {{ Form::label('customer', 'Cliente:', ['class' => 'weight-500']) }}
        {{ Form::select('customer_id', $customers, null, ['placeholder' => 'Seleccionar Cliente',
            'class' => 'form-control selectpicker', 'data-live-search' => 'true',  'id'=> 'customer_id' , 'required' => true]) }}
    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('ci','CI:', ['class' => 'weight-500']) }}
        {{ Form::text('ci', null, ['class'=> ' form-control', 'id' => 'ci', 'readonly']) }}
    </div>
    <div class="col-12 col-lg-4">
        {{ Form::label('nit', 'Nit:') }}
        {{ Form::text('nit', null, ['class'=> ' form-control']) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-3">
        {{ Form::label('product','Producto:') }}
        {{ Form::select('product', $products, null, ['placeholder' => 'Seleccionar Producto',
        'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id'=> 'product']) }}
    </div>
    <div class="col-12 col-lg-2">
        {{ Form::label('pcompra','Precio base:', ['class' => 'weight-500']) }}
        {{ Form::number('pcompra', null, ['class'=> ' form-control', 'id' => 'pcompra', 'readonly']) }}
    </div>
    <div class="col-12 col-lg-1">
        {{ Form::label('stock','Stock:', ['class' => 'weight-500']) }}
        {{ Form::number('stock', null, ['class'=> ' form-control', 'id' => 'stock', 'readonly']) }}
    </div>
    <div class="col-12 col-lg-2">
        {{ Form::label('unidad','Unidad:', ['class' => 'weight-500']) }}
        {{ Form::text('unidad', null, ['class'=> ' form-control', 'id' => 'unidad', 'readonly']) }}
    </div>
    <div class="col-12 col-lg-2">
        {{ Form::label('pventa','Precio venta (c/u):', ['class' => 'weight-500']) }}
        {{ Form::number('pventa', null, ['class'=> ' form-control', 'id' => 'pventa']) }}
    </div>
    <div class="col-12 col-lg-2">
        {{ Form::label('cantidad','Cantidad:', ['class' => 'weight-500']) }}
        {{ Form::number('cantidad', null, ['class'=> ' form-control', 'id' => 'cantidad']) }}
    </div>

</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" id="btn_add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Agregar producto
    </button>
</div>
<div class="clearfix">
    <div class="pull-left">
        <h3 class="text-blue h4">Detalle de la venta</h3>
    </div>
</div>
    <div class="row">
        <div class="col-lg-2 col-sm-4">
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#030eaaee">
                    <th style="color:#ffffff";>Opciones</th>
                    <th style="color:#FFFFFF";>Producto</th>
                    <th style="color:#FFFFFF";>Unidad de medida</th>
                    <th style="color:#FFFFFF";>Precio compra</th>
                    <th style="color:#FFFFFF";>Precio venta</th>
                    <th style="color:#FFFFFF";>Cantidad</th>
                    <th style="color:#FFFFFF";>Subtotal</th>
                </thead>
                <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h5 id="total">0.00 (Bs.)</h5></th>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
<button type="submit" class="btn btn-primary" id="guardar">
    <i class="fa fa-save" aria-hidden="true"></i>
    Registrar venta
</button>
