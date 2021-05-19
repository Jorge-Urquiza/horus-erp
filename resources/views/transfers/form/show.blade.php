
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Sucursal Origen</label>
                    <input class="form-control" disabled value="{{ $transfer->origin_branch_office->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Sucursal Destino</label>
                    <input class="form-control" disabled value="{{ $transfer->destiny_branch_office->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Realizado Por:</label>
                    <input class="form-control" disabled value="{{ $transfer->user->name}} {{ $transfer->user->last_name  }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Fecha</label>
                    <input class="form-control" disabled value="{{ $transfer->date }}">
                </div>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-12  col-sm-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Detalle Nota Traspaso</h3>
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
                        <th style="color:#FFFFFF";>Costo Salida</th>
                        <th style="color:#FFFFFF";>Costo Entrada</th>
                        <th style="color:#FFFFFF";>Cantidad</th>
                        <th style="color:#FFFFFF";>Subtotal Salida</th>
                        <th style="color:#FFFFFF";>Subtotal Entrada</th>
                    </thead>
                    <tbody>
                        @foreach($transfer->transferDetails as $d)
                            <tr>
                                <td>{{ $d->product->name }}</td>
                                <td>{{ $d->output_cost}}</td>
                                <td>{{ $d->income_cost }}</td>
                                <td>{{ $d->quantity }}</td>
                                <td>{{ $d->quantity * $d->output_cost * 1 }} </td>
                                <td>{{ $d->quantity * $d->income_cost * 1 }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h5 id="total_salida">{{ money ($transfer->total_output_amount) }} (Bs.)</h5></th>
                        <th><h5 id="total_entrada">{{ money ($transfer->total_income_amount) }} (Bs.)</h5></th>
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
                    <textarea class="form-control" name="note" style="height: 100px" disabled>@if(isset($transfer)){{$transfer->note}}@endif</textarea>
                    {!! $errors->first('note','<span class="invalid-feedback d-block">:message</span>') !!}
                </div>
            </div>
        </div>


