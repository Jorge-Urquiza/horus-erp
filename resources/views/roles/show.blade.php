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
    </div>
@endsection

@section('content')
<div class="col text-right">
    <a href="{{ route('roles.index') }}" class="btn btn-outline-primary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
    </a>
</div>
<div class="card border-dark my-3">
    <div class="card-header">Rol: {{ ucfirst($role->description) }}</div>
    <div class="card-body text-dark">
      <h5 class="card-title">Lista de permisos</h5>
        <div class="row">
            @foreach ($permisos as $index => $permiso)

                @if(count($permisos) / 2  === $index)
                <div class="col-lg-6">
                    <ul class="list-inline">
                        <li class="card-text">
                            <strong>{{ $index+1 . ': ' }}</strong> {{ $permiso->description }}
                        </li>
                    </ul>
                </div>
                @else
                <div class="col-lg-6">
                    <ul class="list-inline">
                        <li class="card-text">
                            <strong>{{ $index+1 . ':'}}</strong> {{ $permiso->description }}
                        </li>
                    </ul>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
