@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Registrar nueva Sucursal</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Sucursales</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Sucursal</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('customers.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Formulario de creación</h4>
    </div>
</div>
    {!! Form::open(['route'=> ['branch-offices.store'], 'method' => 'POST']) !!}
        @include('branch-offices.partials.form')
    {!! Form::close()!!}
@endsection
