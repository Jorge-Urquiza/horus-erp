@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Rol {{ $role->name }}</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver permisos</li>
                </ol>
            </nav>
        </div>
        <div class="col text-right">
            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
            </a>
    </div>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2">
    <div class="col mb-4">
        <div class="card border-info mb-3">
            <div class="card-header">Permisos del rol {{ $role->description }}</div>
            <div class="card-body text-info">
                <h5 class="card-title">Permisos: </h5>
                <ul>
                    @foreach ($permisos as $index => $permiso)
                    <li class="card-text">
                        <strong>{{ $index+1 . '.- ' .$permiso->description }}</strong>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card border-info mb-3">
            <div class="card-header">Usuarios con el rol {{ $role->description }}</div>
            <div class="card-body text-info">
                <h5 class="card-title">Usuarios: </h5>
                <ul>
                    @foreach ($usuarios as $index => $usuario)
                    <li class="card-text">
                        <strong>{{  $index+1 . '.- ' . $usuario->getFullName()}}</strong>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
