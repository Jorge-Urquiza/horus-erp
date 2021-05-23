<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nota Ingreso</title>
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
        /* @font-face{
            font-family: Flenja-Regular;
            src: url('templates/vendors/fonts/fontfamily/Flenja-Regular.ttf') format('truetype')
        }
        .{
            font-family: Flenja-Regular, sans-serif;
        } */
    </style>
    <header style="position: fixed; left:0cm; right:0cm">
        <section class="d-block">
            {{-- Ese margin 3 es por que dompdf me mueve la imagen --}}
            <div class="d-inline-block mt-3" style="width: 34%;">
                <img class="invoice-logo" src="{{ public_path('logos/recorte2.png') }}">
            </div>

            <div class="d-inline-block text-center align-top" style="width: 49%; padding-top: 50px;">
                <div class="text-left font-weight-bold w-100"><h2>Nota de Ingreso</h2></div>
            </div>

        </section>
        <section class="d-block my-4">
            <div class="d-inline-block" style="width: 49%;">
                <div class="mb-0">Horus S.R.L</div>

                {{-- Si la sucursal en la que se emitio la factura es casa matriz --}}

                <div class="mb-0">{{ $income->branch_office()->first()->name }}</div>

                <div class="mb-0">{{ $income->branch_office()->first()->address }}</div>

                <div class="mb-0">Teléfonos: {{ $income->branch_office()->first()->telephone }}</div>

                <div class="mb-0">{{ $income->branch_office()->first()->city }} - Bolivia</div>


            </div>

            <div class="w-50 d-inline-block align-middle text-right">
                <p class="mb-0"><span class="font-weight-bold">Fecha :</span>{{ Carbon\Carbon::now()->format('d/m/Y') }}</p>
                <p class="mb-0"><span class="font-weight-bold">Hora :</span>{{ Carbon\Carbon::now()->format('H:i:s') }}</p>
                <p class="mb-0"><span class="font-weight-bold">Pag.: </span><span class="pagenum"></span></p>
                <p class="mb-0"><span class="font-weight-bold">No.Trans.: </span> {{ sales_number($income->id) }}</p>
                <p class="mb-0"><span class="font-weight-bold">Estado: </span> {{ $income->status }}</p>
            </div>
        </section>
        <section>
            <p class="mb-0">
                <span class="font-weight-bold">Lugar y fecha: </span>SCZ, @php $oldDate = strtotime($income->date);
                                                                            echo date("d / m / Y",$oldDate);
                                                                            @endphp
            </p>
            <p class="mb-0">
                <span class="font-weight-bold">Sucursal: </span>{{ $income->branch_office()->first()->name }}
            </p>
            <p class="mb-2">
                <span class="font-weight-bold">Realizado por: </span>{{ $income->user()->first()->name }} {{ $income->user()->first()->last_name }}
            </p>

        </section>
    </header>
<body class="invoice">
    <div id="app">

        <div style="position: relative; left:0cm; right:0cm; top: 34%">
            <table class="table table-bordered table-sm mb-0">
                <thead class="font-13">
                    <tr>
                        <th>Detalle</th>
                        <th>Cantidad</th>
                        <th>C. Unitario Bs.</th>
                        <th>Subtotal Bs.</th>
                    </tr>
                </thead>
                <tbody>
                {{-- Productos --}}
                @foreach ($details as $detail)
                    <tr>
                        <td class="text-right">{{ $detail->product()->first()->name}}</td>
                        <td class="text-right">{{ $detail->quantity}}</td>
                        <td class="text-right">{{ money($detail->cost)}}</td>
                        <td class="text-right">{{ money($detail->cost * $detail->quantity)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-weight-bold">
                        <td colspan="3">Totales</td>
                        <td class="text-right">{{ money($income->total_amount)}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Son:  {{ $income->total_literal }} {{ $income->suffix }} BOLIVIANOS
                        </td>
                        <td>
                            <div class="text-right">
                                <span class="font-weight-bold">Total: </span>
                                <span>{{ money($income->total_amount)}}</span>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
            @if(!is_null($income->note))
            <table style="width: 100%">
                <tr>
                    <td><b>Nota:</b></tr>
                </tr>
                <tr>
                    <td>{{ $income->note }}</td>
                </tr>
            </table>
            @endif
            @if($income->status == 'Ingresado')
            <section class="d-block my-4" style="padding-top:50px">
                <div class="d-inline-block align-middle text-center" style="width: 49%;">
                    <hr style="border: 1px black; width:60%">
                    <p class="mb-0"><span class="font-weight-bold">RECIBI CONFORME</span></p>
                </div>

                <div class="w-50 d-inline-block align-middle text-center">
                    <hr style="border: 1px black; width:60%">
                    <p class="mb-0"><span class="font-weight-bold">ENTREGE CONFORME</span></p>
                </div>
            </section>
            @endif
        </div>
    </div>
</body>
</html>
