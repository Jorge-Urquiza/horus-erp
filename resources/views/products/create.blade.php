@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Registrar producto</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Producto</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar Producto</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection
@section('content')
    <form role="form" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
    @include('products.form.create')

    </form>
@endsection
