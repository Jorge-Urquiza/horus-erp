@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Modificar permisos del Rol -  {{ $role->name }}</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Rol - Permisos</li>
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
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Formulario de creación</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-arrow-left"></i>Salir
            </a>
        </div>
    </div>
            {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT']) !!}
                @csrf
                @include('roles.partials.form')
                {!!  Form::submit('Guardar cambios', ['class' => 'btn btn-info btn-sm']) !!}
            {!! Form::close() !!}
</div>
@endsection

