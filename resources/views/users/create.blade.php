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

    {!! Form::open(['route'=> ['users.store'], 'method' => 'POST']) !!}
        @include('users.partials.form')
    {!! Form::close()!!}
@endsection
