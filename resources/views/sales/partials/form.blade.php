
<div class="card mb-2">
    <div class="card-body">
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
                {{ Form::label('customer', 'Cliente*', ['class' => 'weight-500']) }}
                {{ Form::select('customer_id', $customers, null, ['placeholder' => 'Seleccionar Cliente',
                    'class' => 'form-control selectpicker', 'data-live-search' => 'true',  'id'=> 'customer_id' , 'required' => true]) }}
            </div>
            <div class="col-12 col-lg-3">
                {{ Form::label('ci','CI:', ['class' => 'weight-500']) }}
                {{ Form::text('ci', null, ['class'=> ' form-control', 'id' => 'ci', 'readonly']) }}
            </div>
            <div class="col-12 col-lg-4">
                {{ Form::label('nit', 'Nit') }}
                {{ Form::text('nit', null, ['class'=> ' form-control', 'placeholder' => 'Opcional']) }}
            </div>
        </div>
    </div>
</div>

<div class="card mb-2">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-12 col-lg-5">
                {{ Form::label('product','Producto:') }}
                {{ Form::select('product', $products, null, ['placeholder' => 'Seleccionar Producto',
                'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id'=> 'product']) }}
            </div>

            <div class="col-12 col-lg-3">
                {{ Form::label('stock','Stock:', ['class' => 'weight-500']) }}
                {{ Form::number('stock', null, ['class'=> ' form-control', 'id' => 'stock', 'readonly']) }}
            </div>
            <div class="col-12 col-lg-4">
                {{ Form::label('unidad','Unidad de medida:', ['class' => 'weight-500']) }}
                {{ Form::text('unidad', null, ['class'=> ' form-control', 'id' => 'unidad', 'readonly']) }}
            </div>

        </div>
        <div class="form-group row">
            <div class="col-12 col-lg-3">
                {{ Form::label('marca','Marca:', ['class' => 'weight-500']) }}
                {{ Form::text('marca', null, ['class'=> ' form-control', 'id' => 'marca', 'readonly']) }}
            </div>
            <div class="col-12 col-lg-3">
                {{ Form::label('pcompra','Precio unitario Bs.:', ['class' => 'weight-500']) }}
                {{ Form::number('pcompra', null, ['class'=> ' form-control', 'id' => 'pcompra', 'readonly']) }}
            </div>
            <div class="col-12 col-lg-3">
                {{ Form::label('cantidad','Cantidad*', ['class' => 'weight-500']) }}
                {{ Form::number('cantidad', null, ['class'=> ' form-control', 'id' => 'cantidad']) }}
            </div>
            <div class="col-12 col-lg-3">
                {{ Form::label('descuento','Descuento %', ['class' => 'weight-500']) }}
                {{ Form::number('descuento', null, ['class'=> ' form-control', 'id' => 'descuento', 'placeholder' => 'Opcional']) }}
            </div>
        </div>
    </div>
    <div class="form-group ml-4">
        <button type="button" class="btn btn-outline-primary" id="btn_add">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Agregar producto
        </button>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <div class="clearfix">
            <div class="pull-left">
                <h3 class="text-blue h4">Detalle de la venta</h3>
            </div>
        </div>
        <div class="table-responsive">
            <table id="detalle" class="table table-striped table-bordered table-condensed">
                <thead style="background-color:#030eaaee">
                    <th style="color:#ffffff";>Opciones</th>
                    <th style="color:#FFFFFF";>Producto</th>
                    <th style="color:#FFFFFF";>Unidad de medida</th>
                    <th style="color:#FFFFFF";>Precio Unitario</th>
                    <th style="color:#FFFFFF";>Cantidad</th>
                    <th style="color:#FFFFFF";>Subtotal</th>
                    <th style="color:#FFFFFF";>Descuento %.</th>
                    <th style="color:#FFFFFF";>Total</th>
                </thead>
                <tfoot>
                    <tr>
                        <th>TOTALES</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th id="fila">
                            <div class="text-left">
                                <span class="font-weight-bold">Subtotal: </span>
                                <span class="font-weight-light" id="totales"></span>
                                <input id="totales_input" name="totales_input" type="hidden">
                            </div>
                            <div class="text-left">
                                <span class="font-weight-bold">Descuento: </span>
                                <span class="font-weight-light" id= "discount-neto"></span>
                                <input id="discount-neto_input" name="discount-neto_input" type="hidden">
                            </div>
                            <div class="text-left">
                                 <span class="font-weight-bold">TOTAL NETO: </span>
                                 <span id="total-neto" class="font-weight-bold"></span>
                                 <input id="total-neto_input" name="total-neto_input" type="hidden">
                            </div>
                        </th>
                    </tr>
                    <tr>

                    </tr>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="link_descuento">
            <button  class="btn btn-link text-left"
            type="button" data-toggle="modal" data-target="#exampleModal">Desea aplicar descuento al total de la venta?</button>
            @include('sales.partials.modal-discount')
        </div>
        <button type="submit" class="btn btn-primary" id="guardar">
            <i class="fa fa-save" aria-hidden="true"></i>
            Registrar venta
        </button>
    </div>
</div>

