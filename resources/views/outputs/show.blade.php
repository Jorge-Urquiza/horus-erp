@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Ver Nota de Salida</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('outputs.index') }}">Nota de Salida</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ver</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('outputs.index') }}" class="btn btn-outline-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection
@section('content')

    @include('outputs.form.show')


@endsection
