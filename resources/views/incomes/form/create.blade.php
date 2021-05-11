<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label>Sucursal</label>
            @if(auth()->user()->is_admin)
            <select class="custom-select2 form-control" name="branch_office_id" style="width: 100%; height: 38px;" required>
               
                @foreach($branch_office as $b)
                    <option value="{{$b->id}}">{{$b->name}}</option>
                @endforeach
                
            </select>
            @else            
            <input class="form-control" disabled value="{{ auth()->user()->branchOffice->name }}">
            <input class="form-control" type="hidden" value="{{ auth()->user()->branch_office_id }}"  name="branch_office_id">
            @endif
            {!! $errors->first('branch_office_id','<span class="invalid-feedback d-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label>Fecha</label>
            <input class="form-control" disabled value="{{ $fecha }}" id="fecha" name="fecha">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12  col-sm-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Detalle Nota Ingreso</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
            {{ Form::label('product','Producto:') }}
            {{ Form::select('product', $products, null, ['placeholder' => 'Seleccionar Producto',
            'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id'=> 'product']) }}
            {!! $errors->first('product_id','<span class="invalid-feedback d-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-lg-3 col-sm-3  col-md-3  col-xs-12">
        <div class="form-group">
                <label for="">Precio</label>
                <input id="pcompra"  type="number" name="precio" class="form-control" placeholder=""
                 readonly >
        </div>
    </div>
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
                <label for="">Cantidad</label>
                <input type="number"  class="form-control" placeholder="" id="pcantidad" min="0">
        </div>
    </div>
    
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="btn_add">Agregar</button>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-container">
            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover scroll">
                <thead style="background-color:#030eaaee;" id="cabeza">
                    <th style="color:#FFFFFF;">Opciones</th>
                    <th style="color:#FFFFFF;">Producto</th>
                    <th style="color:#FFFFFF;">Precio</th>
                    <th style="color:#FFFFFF;">Cantidad</th>
                    <th style="color:#FFFFFF;">Subtotal</th>
                </thead>
                <tbody id="body">

                </tbody>
                <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h5 id="total">0.00 (Bs.)</h5></th>
                </tfoot>
                
            </table>
            <input id="total_quantity"  type="hidden" name="total_quantity" class="form-control">
            <input id="total_amount"  type="hidden" name="total_amount" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Nota</label>
                <textarea class="form-control" name="note" style="height: 100px">@if(isset($income)){{$income->note}}@endif</textarea>
                {!! $errors->first('note','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12  col-sm-12 mt-3">
        <div class="col text-right">
            <button class="btn btn-primary btn-sm"
                type="submit"><span class="icon-copy ti-save" id="guardar"></span>   Guardar</button>
        <div>
    <div>
</div>