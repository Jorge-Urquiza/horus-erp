@extends('layouts.app')

@section('title')
<div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Editar Rol</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
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

    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT']) !!}
        @csrf
        @include('roles.partials.form')
    {!! Form::close() !!}
@endsection

