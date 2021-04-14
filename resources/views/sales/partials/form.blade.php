<div class="form-group row">
    <div class="col-12 col-lg-3">
        {{ Form::label('name', 'Nombre:', ['class' => 'weight-500'])}}
        {{ Form::text('name', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('address','Dirección:', ['class' => 'weight-500']) }}
        {{ Form::text('address', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('telephone', 'Telefono:') }}
        {{ Form::text('telephone', null, ['class'=> ' form-control']) }}

    </div>
    <div class="col-12 col-lg-3">
        {{ Form::label('city', 'Ciudad:') }}
        {{ Form::text('city', null, ['class'=> 'form-control'])}}
    </div>
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
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                {{ Form::label('product','Producto:') }}
                <input id="pcompra"  type="number" name="precio_sugerido" class="form-control" placeholder=""
                value="{{old('precio')}}" >
            </div>
        </div>
        <div class="col-lg-2 col-sm-2  col-md-2  col-xs-12">
            <div class="form-group">
                    <label for="">Precio compra (Sugerido)</label>
                    <input id="pcompra"  type="number" name="precio_sugerido" class="form-control" placeholder=""
                    value="{{old('precio')}}" readonly >
            </div>
        </div>
        <div class="col-lg-2 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="number"  class="form-control" placeholder=""
                    value="{{old('nit')}}"   id="pcantidad" >
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                    <label for="">Precio Venta</label>
                    <input type="number" name="precio_venta" class="form-control" placeholder=""
                    id="pventa"
                    value="{{old('nit')}}"  >
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="btn_add">Agregar</button>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#36B6CA">
                    <th style="color:#FFFFFF";>Opciones</th>
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
<button type="submit" class="btn btn-primary">
    <i class="fa fa-save" aria-hidden="true"> Guardar</i>
</button>
