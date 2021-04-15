@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Modificar categoria</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoria</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')


@endsection
