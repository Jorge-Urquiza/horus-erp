@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Roles</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de los roles</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Crear nuevo rol
            </a>
        </div>
    </div>
    @if ($roles->isNotEmpty())
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $roles)
                <tr>
                    <td>
                        <span class="badge badge-info"> {{ $roles->name }}</span>
                    </td>
                    <td>{{ $roles->description }}</td>
                    <td>
                        <a href="{{ route('roles.show', $roles->id) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-eye"></i> Ver permisos
                        </a>
                        <a href="{{ route('roles.edit', $roles->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Sin registros.</p>
    @endif
</div>

@endsection
