@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Notas de Ingreso</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('incomes.index') }}">Notas de Ingreso</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    @if ($message = Session::get('advertencia'))
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="alert alert-warning alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        </div>
    </div>
    @endif

<div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Notas Ingresos</h4>
        </div>
        <div class="pull-right">
            @can('incomes.create')
            <a href="{{ route('incomes.create') }}" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar Nota de Ingreso</a>
            @endcan
        </div>
    </div>
    <div class="row"> 
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#proceso" role="tab"
            aria-controls="pills-home" aria-selected="true">En proceso</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#ingresado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Ingresado</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-profil-tab" data-toggle="pill" href="#anulado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Anulado</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="proceso" role="tabpanel" aria-labelledby="pills-home-tab">
            @include('incomes.tables.processed')
        </div>
        <div class="tab-pane fade" id="ingresado" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('incomes.tables.entered')
        </div>
        <div class="tab-pane fade" id="anulado" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('incomes.tables.canceled')
        </div>
    </div>
@component('incomes.modals.processed-canceled', ['action' => route('incomes.destroy', '*')])
    ¿Está seguro que desea anular la nota de ingreso? 
    <p>Una vez anulado, no se podrá recuperar la información llenada</p>
@endcomponent
@component('incomes.modals.processed-entered', ['action' => route('incomes.store-entered', '*')])
    ¿Está seguro que desea confirmar el ingreso de los productos? 
    <p>Una vez ingresado, no se podrá anular la nota de ingreso</p>
@endcomponent

@endsection

@push('scripts')
    @include('layouts.datatable')
    @include('incomes.scripts.processed')
    @include('incomes.scripts.entered')
    @include('incomes.scripts.canceled')
@endpush
