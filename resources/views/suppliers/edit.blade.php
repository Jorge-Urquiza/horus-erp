@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Crear nuevo proveedor</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('suppliers.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
@endsection
@section('content')

{!! Form::model($supplier, ['route'=> ['suppliers.update', $supplier->id]]) !!}
        @method('PUT')
    @include('suppliers.form.create')
{!! Form::close()!!}

@endsection
