@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Ver Usuario</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.show', $user->id) }}">{{ $user->full_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver</li>
                </ol>
            </nav>
        </div>

    </div>
@endsection

@section('content')
<div class="col text-right">
    <a href="{{ route('roles.index') }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir
    </a>
</div>
    {!! Form::model($user, ['route' => ['users.update', $user->id]]) !!}
    @csrf
    @method('PUT')
        @include('users.partials.form-show')
    {!! Form::close() !!}
@endsection
