@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Stock de Producto</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.stock') }}">Stock Productos</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.branch', $product->id) }}">{{ $product->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle de stock sucursal - producto</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection


@section('content')
<div class="clearfix">
    <div class="pull-right">
        <a href="{{ route('products.stock') }}" class="btn btn-outline-primary">
            <i class="fa fa-arrow-left"></i> Salir
        </a>
    </div>
</div>
<div class="card border-info mt-3">
    <div class="card-header">{{ $product->name }}
        <p class="card-text">
            <small class="text-muted">Número de id: {{ $product->id }}</small>
        </p>
    </div>
    <div class="card-body text-secondary">
        <ul>
            <li>
                <strong>Codigo local:</strong> {{ $product->local_code }}
            </li>
            <li>
                <strong>Descripción:</strong> {{ $product->description ?? 'No ingresada' }}
            </li>
            <li>
                <strong>Unidad de Medida:</strong> {{ $product->measurementsUnit->name ?? 'No ingresada' }}
            </li>
            <li>
                <strong>Costo:</strong> {{ $product->cost }} Bs.
            </li>
            <li>
                <strong>Precio:</strong> {{ $product->price }} Bs.
            </li>
            <li>
                <strong>Ganancia:</strong> {{ $product->gain }} Bs.
            </li>
            <li>
                <strong>Total Stock Maximo:</strong> {{ $product->total_maximum_stock }}
            </li>
            <li>
                <strong>Total Stock Minimo:</strong> {{ $product->total_minimum_stock }}
            </li>
            <li>
                <strong>Total Stock Actual:</strong> {{ $product->total_current_stock }}
            </li>
        </ul>
        <p class="card-text"><small class="text-muted">Creado en: {{ $product->created_at }}</small></p>
    </div>
</div>
<div class="row animated fadeIn mt-3">
    @forelse ($branchProducts as $branchProduct)
    <div class="col-md-6">
        <div class="card border-info mb-3">
            <div class="card-header text-center">
                <h5 class="card-title">{{ $branchProduct->branch_office->name }}</h5>
                <p class="card-text">
                    <small class="text-muted">Dirección:
                        {{ $branchProduct->branch_office->address }} {{ $branchProduct->branch_office->telephone }}
                    </small>
                </p>
            </div>
            <div class="card-body text-secondary">
                <h5 class="card-title">Detalle:</h5>
                <ul>
                    <li>
                        <strong>Stock Actual:</strong>{{ $branchProduct->current_stock }} Bs.
                    </li>
                    <li>
                        <strong>Stock Máximo:</strong> {{ $branchProduct->maximum_stock }} Bs.
                    </li>
                    <li>
                        <strong>Stock Mínimo:</strong> {{ $branchProduct->minimum_stock }} Bs.
                    </li>
                </ul>
                <p class="card-text">
                    <small class="text-muted">Agregado en: {{ $branchProduct->created_at }}</small>
                </p>
            </div>
          </div>
    </div>
    @empty
    <div class="alert alert-danger ml-3" role="alert">
        Este producto no fue asignado a ninguna sucursal, primero debe registrar una nota de ingreso
        <a href="{{ route('incomes.create') }}" class="alert-link">aquí</a>. y registre el producto.
      </div>
    @endforelse
</div>
@endsection
