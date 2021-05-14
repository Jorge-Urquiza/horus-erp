@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Editar producto</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Producto</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection
@section('content')

{!! Form::model($product, ['route'=> ['products.update', $product->id], 'files'=>'true','enctype' => 'multipart/form-data']) !!}
        @method('PUT')
    @include('products.form.create')
{!! Form::close()!!}

@endsection
