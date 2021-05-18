<div class="card mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Sucursal</label>
                    @if(auth()->user()->is_admin)
                    <select class="custom-select2 form-control" name="branch_office_id" style="width: 100%; height: 38px;" required
                        onchange="listarProducto();" id="branch_office">
                    
                        @foreach($branch_office as $b)
                            <option value="{{$b->id}}">{{$b->name}}</option>
                        @endforeach
                        
                    </select>
                    @else            
                    <input class="form-control" disabled value="{{ auth()->user()->branchOffice->name }}">
                    <input class="form-control" type="hidden" value="{{ auth()->user()->branch_office_id }}"  name="branch_office_id" id="branch_office_s">
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
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="clearfix">
            <div class="pull-left">
                <h3 class="text-blue h4">Detalle de la Nota de Salida</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    {{ Form::label('product','Producto:') }}
                    <select class="custom-select2 form-control" 
                        name="product" style="width: 100%; height: 38px;" id="product">
                        <option disabled selected>Selecciona un Producto</option>
                    </select>
                    {!! $errors->first('product_id','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-lg-2 col-sm-2  col-md-2  col-xs-12">
                <div class="form-group">
                        <label for="">Costo Unitario (Bs.)</label>
                        <input id="pcompra"  type="number" name="precio" class="form-control" placeholder=""
                        readonly >
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number"  class="form-control" placeholder="" id="pstock" min="0" readonly>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number"  class="form-control" placeholder="" id="pcantidad" min="0">
                </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <button type="button" class="btn btn-outline-primary" id="btn_add">Agregar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#030eaaee">
                        <th style="color:#FFFFFF";>Opciones</th>
                        <th style="color:#FFFFFF";>Producto</th>
                        <th style="color:#FFFFFF";>Costo Unitario</th>
                        <th style="color:#FFFFFF";>Cantidad</th>
                        <th style="color:#FFFFFF";>Subtotal</th>
                    </thead>
                    <tfoot>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h5 id="total">0.00 (Bs.)</h5></th>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
                <input id="total_quantity"  type="hidden" name="total_quantity" class="form-control">
                <input id="total_amount"  type="hidden" name="total_amount" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  col-sm-12">
                <div class="form-group">
                    <label>Nota</label>
                    <textarea class="form-control" name="note" style="height: 100px">@if(isset($output)){{$output->note}}@endif</textarea>
                    {!! $errors->first('note','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12  col-sm-12 mt-3">
                
                    <button class="btn btn-outline-primary btn-sm"
                        type="submit" id="guardar">Guardar</button>
            
            <div>
        </div>
    </div>
</div>