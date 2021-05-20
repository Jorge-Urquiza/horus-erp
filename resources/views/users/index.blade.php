@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Usuarios</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Roles - usuarios</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-outline-primary"
            role="button"><i class="fa fa-plus"></i> Registrar usuario</a>
        </div>
    </div>

    <div class="list-group list-group-flush mt-3">
        @foreach ($roles as $rol)
        <a href="{{ route('users.rol.index', $rol->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Ver lista de usuarios tipo: {{ $rol->name }}</h5>
            </div>
            <p class="mb-1">{{ $rol->description }}</p>
            <small>Creado en: {{ $rol->created_at }}</small>
          </a>
        @endforeach
      </div>
@endsection
