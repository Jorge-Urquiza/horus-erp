<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Ingreso</title>
</head>
<body>
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
                    <th><h5 id="total">{{ $income->total_amount }}</h5></th>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
