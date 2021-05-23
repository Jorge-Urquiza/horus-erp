@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Venta id # {{ $sale->id }}</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.show', $sale->id) }}">Detalle</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
<div class="col text-right mb-3">
    <a href="{{ route('sales.index') }}" class="btn btn-outline-primary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir
    </a>
</div>
<div class="card border-dark mb-3">
    <div class="card-header">Acerca de la Venta</div>
    <div class="card-body text-dark">
        <ul>
            <li>
                <strong>NIT: </strong>{{ $sale->nit }}
            </li>
            <li>
                <strong>Fecha: </strong>{{ $sale->date }}
            </li>
            <li>
                <strong>Cliente: </strong>{{ $sale->customer->full_name }}
            </li>
            <li>
                <strong>Vendedor: </strong>{{ $sale->seller->full_name }}
            </li>
            <li>
                <strong>Sucursal : </strong> {{ $sale->branchOffice->name . ' ' . $sale->branchOffice->telephone}}
            </li>
            <li>
                <strong>Estado : </strong>
                @if ($sale->status === 'Cerrada')
                <span class="badge badge-success">{{ $sale->status }}</span>
                @else
                <span class="badge badge-danger">{{ $sale->status }}</span>
                @endif
            </li>
        </ul>
    </div>
</div>
<p><strong>Detalles de la venta<strong></p>
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead style="background-color:#030eaaee">
            <tr>
                    <th style="color:#FFFFFF";>Codigo</th>
                    <th style="color:#FFFFFF";>Producto</th>
                    <th style="color:#FFFFFF";>Precio Unitario Bs.</th>
                    <th style="color:#FFFFFF";>Cantidad</th>
                    <th style="color:#FFFFFF";>Subtotal Bs.</th>
                    <th style="color:#FFFFFF";>Descuento %.</th>
                    <th style="color:#FFFFFF";>Total Bs.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td> {{ $detail->product->local_code }} </td>
                    <td> {{ $detail->product->name }} </td>
                    <td> {{ money($detail->sale_price) }} Bs.</td>
                    <td> {{ $detail->quantity }}</td>
                    <td> {{ money($detail->subtotal) }} </td>
                    <td> {{ money($detail->discount) }} </td>
                    <td> {{ money($detail->total) }} </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>TOTALES</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <div class="text-left">
                        <span class="font-weight-bold">Subtotal: </span>
                        <span class="font-weight-light">{{ $sale->subtotal }}</span>
                    </div>
                    <div class="text-left">
                        <span class="font-weight-bold">Descuento: </span>
                        <span class="font-weight-light">{{ $sale->discount }}</span>
                    </div>
                    <div class="text-left">
                         <span class="font-weight-bold">TOTAL NETO: </span>
                         <span class="font-weight-bold">{{ $sale->total_amount }}</span>
                    </div>
                </th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
