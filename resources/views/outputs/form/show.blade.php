<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label>Sucursal</label>
            <input class="form-control" disabled value="{{ $output->branch_office->name }}">
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label>Fecha</label>
            <input class="form-control" disabled value="{{ $output->date }}">
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label>Realizado Por:</label>
            <input class="form-control" disabled value="{{ $output->user->name}} {{ $output->user->last_name  }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12  col-sm-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Detalle Nota Salida</h3>
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
                    <th style="color:#FFFFFF";>Precio</th>
                    <th style="color:#FFFFFF";>Cantidad</th>
                    <th style="color:#FFFFFF";>Subtotal</th>
                </thead>
                <tbody>
                    @foreach($detalle as $d)
                        <tr>
                            <td>{{ $d->product->name }}</td>
                            <td>{{ $d->product->price }}</td>
                            <td>{{ $d->quantity }}</td>
                            <td>{{ $d->quantity * $d->product->price * 1 }} </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th><h5 id="total">{{ $output->total_amount }}</h5></th>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

