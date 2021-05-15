<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Sucursal Origen</label>
                    @if(auth()->user()->is_admin)
                    <select class="custom-select2 form-control" name="branch_office_origin_id" style="width: 100%; height: 38px;" required
                        onchange="listarProducto();" id="branch_office">
                    
                        @foreach($branch_office as $b)
                            <option value="{{$b->id}}">{{$b->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <input class="form-control" disabled value="{{ auth()->user()->branchOffice->name }}">
                    <input class="form-control" type="hidden" value="{{ auth()->user()->branch_office_id }}"  name="branch_office_origin_id" id="branch_office_s">
                    @endif
                    {!! $errors->first('branch_office_origin_id','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Fecha</label>
                    <input class="form-control" disabled value="{{ $fecha }}" id="fecha" name="fecha">
                </div>
            </div>
        
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Sucursal Destino</label>
                    <select class="custom-select2 form-control" name="branch_office_destiny_id" style="width: 100%; height: 38px;" required
                        id="branch_office_destiny">
                        <option value="" selected>Selecciona Sucursal Destino</option>
                        @foreach($branch_office as $b)
                            <option value="{{$b->id}}">{{$b->name}}</option>
                        @endforeach
                        
                    </select>
                    {!! $errors->first('branch_office_destiny_id','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    {{ Form::label('product','Producto:') }}
                    <select class="custom-select2 form-control" 
                        name="product" style="width: 100%; height: 38px;" id="product">
                        <option disabled selected>Selecciona un Producto</option>
                    </select>
                    {!! $errors->first('product_id','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number"  class="form-control" placeholder="" id="pstock" min="0" readonly>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 mt-3">
                <div class="form-group">
                    <button type="button" class="btn btn-outline-primary" id="btn_add" style="width: 100%">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar producto</button>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3  col-md-3  col-xs-12">
                <div class="form-group">
                        <label for="">Costo Salida (Bs.)</label>
                        <input id="pcompra_salida"  type="number" name="precio_salida" class="form-control" placeholder=""
                        readonly >
                </div>
            </div>
            <div class="col-lg-3 col-sm-3  col-md-3  col-xs-12">
                <div class="form-group">
                        <label for="">Costo Entrada (Bs.)</label>
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

            
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="clearfix">
            <div class="pull-left">
                <h3 class="text-blue h4">Detalle de la Nota de Traspaso</h3>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#030eaaee">
                            <th style="color:#FFFFFF;width: 10%">Opciones</th>
                            <th style="color:#FFFFFF;width: 20%">Producto</th>
                            <th style="color:#FFFFFF;width: 15%">Costo Salida</th>
                            <th style="color:#FFFFFF;width: 15%">Costo Entrada</th>
                            <th style="color:#FFFFFF;width: 10%">Cantidad</th>
                            <th style="color:#FFFFFF;width: 15%">Subtotal Salida</th>
                            <th style="color:#FFFFFF;width: 15%">Subtotal Entrada</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h5 id="total">0.00 (Bs.)</h5></th>
                            <th><h5 id="total_entrada">0.00 (Bs.)</h5></th>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                    <input id="total_quantity"  type="hidden" name="total_quantity" class="form-control">
                    <input id="total_income_amount"  type="hidden" name="total_income_amount" class="form-control">
                    <input id="total_output_amount"  type="hidden" name="total_output_amount" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12  col-sm-12">
                    <div class="form-group">
                        <label>Nota</label>
                        <textarea class="form-control" name="note" style="height: 100px">@if(isset($transfer)){{$transfer->note}}@endif</textarea>
                        {!! $errors->first('note','<span class="invalid-feedback d-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12  col-sm-12 mt-3">
                <div class="col text-right">
                    <button class="btn btn-primary btn-sm"
                        type="submit" id="guardar"><span class="icon-copy ti-save"></span>   Guardar</button>
                <div>
            <div>
        </div>
    </div>
</div>