@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Usuarios</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Formulario de creación</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-arrow-left"></i> Atrás</a>
        </div>
    </div>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-12 col-lg-3">
                <label for="name" class="weight-500">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre">
            </div>
            <div class="col-12 col-lg-3">
                <label for="last_name" class="weight-500">Apellidos</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ingrese su apellido">
            </div>
            <div class="col-12 col-lg-3">
                <label for="ci" class="weight-500">CI</label>
                <input class="form-control" placeholder="Cedula de identidad" id="ci" name="ci" type="text" required>
            </div>
            <div class="col-12 col-lg-3">
                <label for="telephone" class="weight-500">telephone</label>
                <input class="form-control" placeholder="Número de telephone" id="telephone" name="telephone" type="text" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-lg-4">
                <label for="rol" class="weight-500">Rol</label>
                <select id="rol" data-show-subtext="true" data-live-search="true" class="form-control selectpicker"
                    name="rol_id" required>
                <option disabled selected>Selecciona un rol</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-4">
                <label for="email" class="weight-500">Email</label>
                <input class="form-control" placeholder="ingrese su email" id="email" name="email" type="email" required>
            </div>

            <div class="col-12 col-lg-4">
                <label for="password" class="weight-500">Password</label>
                <input id="password" name="password" class="form-control" placeholder="ingrese su password" type="password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection
