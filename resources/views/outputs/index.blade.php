@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Notas de Salida</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('outputs.index') }}">Notas de Salida</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Notas Salidas</h4>
        </div>
        <div class="pull-right">
            @can('outputs.create')
            <a href="{{ route('outputs.create') }}" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar Nota de Salida</a>
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
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#entregado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Entregado</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-profil-tab" data-toggle="pill" href="#anulado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Anulado</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="proceso" role="tabpanel" aria-labelledby="pills-home-tab">
            @include('outputs.tables.processed')
        </div>
        <div class="tab-pane fade" id="entregado" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('outputs.tables.delivered')
        </div>
        <div class="tab-pane fade" id="anulado" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('outputs.tables.canceled')
        </div>
    </div>
    
    @component('outputs.modals.processed-canceled', ['action' => route('outputs.destroy', '*')])
        ¿Está seguro que desea anular la nota de salida? 
    <p>Una vez anulado, no se podrá recuperar la información llenada</p>
    @endcomponent
    @component('outputs.modals.processed-delivered', ['action' => route('outputs.store-delivered', '*')])
        ¿Está seguro que desea confirmar la entrega de los productos? 
        <p>Una vez entregado, no se podrá anular la nota de salida</p>
    @endcomponent
@endsection

@push('scripts')

@include('layouts.datatable')
        @include('outputs.scripts.processed')
        @include('outputs.scripts.delivered')
        @include('outputs.scripts.canceled')
@endpush
