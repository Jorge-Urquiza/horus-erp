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
            <h4 class="text-blue h4">Lista de usuarios</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar usuario</a>
        </div>
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#rol-admin" role="tab"
          aria-controls="pills-home" aria-selected="true">Administradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#rol-vendedor" role="tab"
          aria-controls="pills-profile" aria-selected="false">Vendedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#rol-encargado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Encargados</a>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="rol-admin" role="tabpanel" aria-labelledby="pills-home-tab">
          @include('users.tables.admin')
        </div>
        <div class="tab-pane fade" id="rol-vendedor" role="tabpanel" aria-labelledby="pills-profile-tab">
          @include('users.tables.vendedor')
        </div>
        <div class="tab-pane fade" id="rol-encargado" role="tabpanel" aria-labelledby="pills-profile-tab">
          @include('users.tables.encargado')
        </div>
    </div>


@endsection
