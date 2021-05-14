<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label>Sucursal</label>
            <input class="form-control" disabled value="{{ $income->branch_office->name }}">
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label>Fecha</label>
            <input class="form-control" disabled value="{{ $income->date }}">
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Realizado Por:</label>
            <input class="form-control" disabled value="{{ $income->user->name}} {{ $income->user->last_name  }}">
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
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#030eaaee">
                    <th style="color:#FFFFFF";>Producto</th>
                    <th style="color:#FFFFFF";>Costo Unitario</th>
                    <th style="color:#FFFFFF";>Cantidad</th>
                    <th style="color:#FFFFFF";>Subtotal</th>
                </thead>
                <tbody>
                    @foreach($income->incomeDetails as $d)
                        <tr>
                            <td>{{ $d->product->name }}</td>
                            <td>{{ $d->cost }}</td>
                            <td>{{ $d->quantity }}</td>
                            <td>{{ round($d->quantity * $d->cost * 1, 2) }} </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th><h5 id="total">{{ money($income->total_amount)}} (Bs.)</h5></th>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Nota</label>
                <textarea class="form-control" name="note" style="height: 100px" disabled>@if(isset($income)){{$income->note}}@endif</textarea>
                {!! $errors->first('note','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>

