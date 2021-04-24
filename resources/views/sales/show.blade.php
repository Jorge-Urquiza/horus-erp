@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Venta {{ $sale->id }}</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
<div class="alert alert-success" role="alert">
    <ul>
        <li>
            <strong>NIT: </strong>{{ $sale->nit}}
        </li>
            <strong>Vendedor: </strong>{{ $sale->seller->getFullName()}}
        </li>
        <li>
            <strong>Total Venta : {{ $sale->total_amount }}</strong>
        </li>
            <strong>Cliente: </strong>{{ $sale->customer->name }}
        <li>

        </li>
    </ul>
</div>

<p><strong>Acerca de la la venta<strong></p>
<div class="table-responsive">
    <table class="table  table-bordered table-hover">
        <thead>
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
            @foreach ($details as $detail)
                <tr>
                    <td >{{ $detail->product->name }}</td>
                    <td >{{ $detail->quantity }}</td>
                    <td >{{ $detail->sale_price }}</td>
                    <td >{{ $detail->subtotal }}</td>
                    <td >0,00</td>
                    <td >{{ $detail->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
