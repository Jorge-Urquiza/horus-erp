<div class="form-group row">
    <div class="col-12 col-lg-3">
        {{ Form::label('name', 'Vendedor:', ['class' => 'weight-500'])}}
        {{ Form::text('name', $user->getFullName(), ['class'=> ' form-control', 'readonly']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('sucursal_id','Sucursal:', ['class' => 'weight-500']) }}
        {{ Form::text('sucursal_id',  $user->branchOffice->name, ['class'=> ' form-control',
            'readonly' => true, 'id' => 'sucursal_id']) }}

    </div>
    <div class="col-12 col-lg-4">
        {{ Form::label('address','Dirección:', ['class' => 'weight-500']) }}
        {{ Form::text('address',  $user->branchOffice->address, ['class'=> ' form-control', 'readonly']) }}

    </div>
    <div class="col-12 col-lg-2">
        {{ Form::label('date    ', 'Fecha:') }}
        {{ Form::date('date', \Carbon\Carbon::now() , ['class'=> 'form-control' ,
        'data-timepicker' => true, 'data-language' =>'en','required'=>true]) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-5">
        {{ Form::label('customer', 'Cliente:', ['class' => 'weight-500'])}}
        {{ Form::select('customer_id',
        App\Models\Customer::select(DB::raw("CONCAT(name, ' ', last_name) AS full"), "id")
        ->pluck('full', 'id')->toArray(), null, ['placeholder' => 'Seleccionar Cliente',
        'class' => 'form-control selectpicker', 'data-live-search' => 'true' ,  'id'=> 'customer_id' , 'required' => true]) }}
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
        'class' => 'form-control selectpicker', 'data-live-search' => 'true' ,  'id'=> 'product' , 'required' => true]) }}
    </div>
    <div class="col-12 col-lg-2">
        <label for="">Precio venta (Sugerido)</label>
        <input id="pcompra"  type="number" name="precio_sugerido" class="form-control" placeholder=""
        value="{{old('precio')}}" readonly >
    </div>
    <div class="col-12 col-lg-2">
        <label for="stock">Stock</label>
        <input id="stock" type="number" name="stock" class="form-control" readonly>
    </div>
    <div class="col-12 col-lg-2">
        <label for="unidad">Unidad</label>
        <input id="unidad"  type="text" class="form-control" readonly>
    </div>
    <div class="col-12 col-lg-2">
        <label for="cantidad" >Cantidad</label>
        <input id="cantidad"  type="number" name="cantidad"
        class="form-control" placeholder="">
    </div>

</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" id="btn_add">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Agregar producto
    </button>
</div>
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Detalle Venta</h3>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#030eaaee">
                    <th style="color:#ffffff";>Opciones</th>
                    <th style="color:#FFFFFF";>Producto</th>
                    <th style="color:#FFFFFF";>Precio compra</th>
                    <th style="color:#FFFFFF";>Cantidad</th>
                    <th style="color:#FFFFFF";>Precio venta</th>
                    <th style="color:#FFFFFF";>Subtotal</th>
                </thead>
                <tfoot>
                    <th>TOTAL</th>
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
</div>
<button type="submit" class="btn btn-primary" id="guardar">
    <i class="fa fa-save" aria-hidden="true"></i>
    Registrar venta
</button>
