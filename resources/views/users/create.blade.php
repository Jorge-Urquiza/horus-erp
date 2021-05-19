@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Registrar Usuario</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                </ol>
            </nav>
        </div>
        <div class="col text-right">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
            </a>
        </div>
    </div>
@endsection

@section('content')

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-12 col-lg-6">
                <label for="name" class="weight-500">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre">
            </div>
            <div class="col-12 col-lg-6">
                <label for="ci" class="weight-500">CI</label>
                <input class="form-control" placeholder="Cedula de identidad" id="ci" name="ci" type="text" required>
            </div>
            <div class="col-12 col-lg-6">
                <label for="last_name" class="weight-500">Apellidos</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                 placeholder="Ingrese su apellido">
            </div>
            <div class="col-12 col-lg-6">
                <label for="telephone" class="weight-500">Telefono</label>
                <input class="form-control" placeholder="Número de telefono" id="telephone" name="telephone" type="text" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-lg-4">
                <label for="rol" class="weight-500">Rol</label>
                <select id="rol" data-show-subtext="true" data-live-search="true" class="form-control selectpicker"
                    name="rol" required>
                <option disabled selected>Selecciona un rol</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-4">
                <label for="email" class="weight-500">Email</label>
                <input class="form-control" placeholder="ingrese su email" id="email"
                 name="email" type="email" required>
            </div>

            <div class="col-12 col-lg-4">
                <label for="password" class="weight-500">Password</label>
                <input id="password" name="password" class="form-control" placeholder="ingrese su password" type="password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary">Guardar</button>
    </form>

@endsection
