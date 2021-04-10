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
                <li class="breadcrumb-item active" aria-current="page">Crear Proveedor</li>
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
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>
</div>
<form role="form" method="post" action="{{route('suppliers.store')}}">
    @csrf
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" placeholder="Escribe el nombre" name="name">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Tipo</label>
                <select class="custom-select2 form-control" name="type" style="width: 100%; height: 38px;">
                   <option value="N">Natural</option>
                    <option value="J">Juridico</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" placeholder="Escribe el email" name="email">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Telefono</label>
                <input class="form-control" type="number" placeholder="Introduce el nro" min="0" name="telephone">
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Direccion</label>
                <input class="form-control" type="text" placeholder="Escribe la direccion" name="address">
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="col text-right">
                <button class="btn btn-primary btn-sm"
                    type="submit"><span class="icon-copy ti-save"></span>   Guardar</button>
            <div>
        <div>
    </div>
</form>

@endsection
