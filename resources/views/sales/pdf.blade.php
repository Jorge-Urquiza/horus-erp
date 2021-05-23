<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nota venta</title>
        <link rel="stylesheet" href="{{ public_path('css/invoice.css') }}">
    </head>
    <style>
        th {
            background-color: rgb(2, 37, 102);
            color: #ffffff ;
        }
        .pagenum:before {
                content: counter(page);
        }
    </style>
    <header style="position: fixed; left:0cm; right:0cm">
        <section class="d-block">
            {{-- Ese margin 3 es por que dompdf me mueve la imagen --}}
            <div class="d-inline-block mt-3" style="width: 34%;">
                <img class="invoice-logo" src="{{ public_path('logos/recorte2.png') }}">
            </div>

            <div class="d-inline-block text-center align-top" style="width: 49%; padding-top: 50px;">
                <div class="text-left font-weight-bold w-100"><h2>Nota de Venta</h2></div>
            </div>

        </section>
        <section class="d-block my-4">
            <div class="d-inline-block" style="width: 49%;">
                <div class="mb-0">Horus S.R.L</div>
                <div class="mb-0">{{ $sale->branchOffice->name }}</div>
                <div class="mb-0">{{ $sale->branchOffice->address }}</div>
                <div class="mb-0">Teléfonos: {{ $sale->branchOffice->telephone }}</div>
                <div class="mb-0">{{ $sale->branchoffice->city }} - Bolivia</div>
                <div class="mb-0">Vendedor: {{ $sale->seller->getFullName() }}</div>
            </div>

            <div class="w-50 d-inline-block align-middle text-right">
                <p class="mb-0"><span class="font-weight-bold">Pag.: </span><span class="pagenum"></span></p>
                <p class="mb-0"><span class="font-weight-bold">Fecha: </span>{{ Carbon\Carbon::now()->format('d/m/Y') }}</p>
                <p class="mb-0"><span class="font-weight-bold">Hora: </span>{{ Carbon\Carbon::now()->format('H:i:s') }}</p>
                <p class="mb-0"><span class="font-weight-bold">NIT: </span>317672035</p>
                <p class="mb-0"><span class="font-weight-bold">No.Trans.: </span> {{ sales_number($sale->id) }}</p>
            </div>
        </section>
        <section>
            <p class="mb-0">
                <span class="font-weight-bold">Señor(es): </span>{{ $sale->customer->full_name}}
            </p>
            <p class="mb-0">
                <span class="font-weight-bold">Telefono Celular: </span>{{ $sale->customer->telephone}}
            </p>
            <p class="mb-2">
                <span class="font-weight-bold">NIT: </span>{{ $sale->nit ?? 0 }}
            </p>
        </section>
    </header>
<body class="invoice">
    <div id="app">
        <div style="position: relative; left:0cm; right:0cm; top: 35%">
            <table class="table table-bordered table-sm mb-0">
                <thead class="font-13">
                    <tr>
                        <th>Detalle</th>
                        <th>Cantidad</th>
                        <th>Precio Bs.</th>
                        <th>Subtotal Bs.</th>
                        <th>Descuento %.</th>
                        <th>Total Bs.</th>
                    </tr>
                </thead>
                <tbody>
                {{-- Productos --}}
                @foreach ($details as $detail)
                    <tr>
                        <td class="text-left">{{ $detail->product->name}}</td>
                        <td class="text-left">{{ money($detail->quantity) }}</td>
                        <td class="text-left">{{ money($detail->sale_price) }}</td>
                        <td class="text-left">{{ money($detail->subtotal) }}</td>
                        <td class="text-left">{{ money($detail->discount) }}</td>
                        <td class="text-left">{{ money($detail->total) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="font-weight-bold">
                    <td colspan="5">Totales</td>
                    <td id="fila">
                        <div class="text-left">
                            <span class="font-weight-bold">Subtotal: </span>
                            <span class="font-weight-light"> {{ money($sale->subtotal) }} Bs.</span>
                        </div>
                        <div class="text-left">
                            <span class="font-weight-bold">Descuento:</span>
                            <span class="font-weight-light"> {{ money($sale->discount) }} %</span>
                        </div>
                        <div class="text-left">
                            <span class="font-weight-bold">Total Neto: </span>
                            <span class="font-weight-bold"> {{ money($sale->total_amount) }} Bs.</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-left">
                        Son: {{ $sale->total_literal }} {{ $sale->suffix }} BOLIVIANOS
                    </td>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
