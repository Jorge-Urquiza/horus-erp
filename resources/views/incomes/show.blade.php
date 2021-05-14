@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Ver Nota de Ingreso</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('incomes.index') }}">Nota de Ingreso</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ver Nota de Ingreso</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('incomes.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection
@section('content')

    @include('incomes.form.show')


@endsection
