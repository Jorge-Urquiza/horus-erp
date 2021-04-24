<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF</title>
        <link rel="stylesheet" href="{{ public_path('css/invoice.css') }}">
    </head>
    <style>
        th {
            background-color: rgb(2, 37, 102);
            color: #ffffff ;
        }
    </style>
<body class="invoice">
    <div id="app">
        <section class="d-block">
            {{-- Ese margin 3 es por que dompdf me mueve la imagen --}}
            <div class="d-inline-block mt-3" style="width: 49%;">
                <img class="invoice-logo" src="{{ public_path('logos/recorte2.png') }}">
            </div>

            <div class="w-50 d-inline-block align-middle text-center">
                <p class="mb-0"><span class="font-weight-bold">Fecha :</span>{{ Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
                <p class="mb-0"><span class="font-weight-bold">Pag.: </span>1/1</p>
                <p class="mb-0"><span class="font-weight-bold">NIT: </span>317672035</p>
                <p class="mb-0"><span class="font-weight-bold">No.Trans.: </span> {{ sales_number($sale->id) }}</p>
                <p class="mb-0"><span class="font-weight-bold">No.Factura.: </span> 000000</p>
                <p class="mb-0"><span class="font-weight-bold">AUTORIZACIÓN: </span> 222222222</p>
            </div>

        </section>
        <section class="d-block my-4">
            <div class="d-inline-block" style="width: 49%;">
                <div class="mb-0">Horus S.R.L</div>

                {{-- Si la sucursal en la que se emitio la factura es casa matriz --}}

                <div class="mb-0">{{ $sale->branchOffice()->first()->name }}</div>

                <div class="mb-0">{{ $sale->branchOffice()->first()->address }}</div>

                <div class="mb-0">Teléfonos: {{ $sale->branchOffice()->first()->telephone }}</div>

                <div class="mb-0">{{ $sale->branchOffice()->first()->city }} - Bolivia</div>

                <div class="mb-0">Vendedor: {{ $sale->seller()->first()->name }}</div>
            </div>
            <div class="d-inline-block text-center align-top" style="width: 49%;">
                <div class="text-center font-weight-bold w-100">Nota de Venta</div>
                <p class="mb-0">Actividad de la factura</p>
            </div>
        </section>
        <section>
            <p class="mb-0">
                <span class="font-weight-bold">Lugar y fecha: </span>SCZ, 20/12/2021
            </p>

            <p class="mb-0">
                <span class="font-weight-bold">Señor(es): </span>{{ $sale->customer->full_name}}
            </p>

            <p class="mb-2">
                <span class="font-weight-bold">NIT: </span>{{ $sale->nit ?? 0 }}
            </p>
        </section>
        <table class="table table-bordered table-sm mb-0" style="font-size: 12px;">
            <thead class="font-13">
                <tr>
                    <th>Detalle</th>
                    <th>Cantidad</th>
                    <th>P. Unitario Bs.</th>
                    <th>Subtotal Bs.</th>
                    <th>Descuento Bs.</th>
                    <th>Total Bs.</th>
                </tr>
            </thead>
            <tbody>
            {{-- Productos --}}
            @foreach ($sale->saleDetails()->get() as $detail)
                <tr>
                    <td class="text-right">{{ $detail->product()->first()->name}}</td>
                    <td class="text-right">{{ $detail->quantity}}</td>
                    <td class="text-right">{{ $detail->sale_price}}</td>
                    <td class="text-right">{{ $detail->subtotal}}</td>
                    <td class="text-right">0,00</td>
                    <td class="text-right">{{ $detail->subtotal}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr class="font-weight-bold">
                    <td colspan="3">Totales</td>
                    <td class="text-right">10</td>
                    <td class="text-right">0%</td>
                    <td class="text-right">10</td>
                </tr>
                <tr>
                    <td colspan="5">
                        Son: {{ $sale->total_literal }} {{ $sale->suffix }} BOLIVIANOS
                    </td>
                    <td>
                        <div class="text-right">
                            <span class="font-weight-bold">Subtotal: </span>
                            <span>10</span>
                        </div>
                        <div class="text-right">
                            <span class="font-weight-bold">Descuento: </span>
                            <span>0</span>
                        </div>
                        <div class="text-right">
                            <span class="font-weight-bold">Total: </span>
                            <span>{{ money($sale->total_amount)}}</span>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
