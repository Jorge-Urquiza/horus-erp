@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de Notas de Traspaso</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('transfers.index') }}">Notas de Traspaso</a></li>
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
            <h4 class="text-blue h4">Lista de Nota Traspaso</h4>
        </div>
        <div class="pull-right">
            @can('transfers.create')
            <a href="{{ route('transfers.create') }}" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Nueva Nota de Traspaso</a>
            @endcan
        </div>
    </div>
    <div class="row"> 
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#activo" role="tab"
            aria-controls="pills-home" aria-selected="true">En proceso</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#finalizado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Finalizado</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#anulado" role="tab"
            aria-controls="pills-profile" aria-selected="false">Anulados</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="activo" role="tabpanel" aria-labelledby="pills-home-tab">
            @include('transfers.tables.processed')
        </div>
        <div class="tab-pane fade" id="finalizado" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('transfers.tables.finalized')
        </div>
        <div class="tab-pane fade" id="anulado" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('transfers.tables.canceled')
        </div>
    </div>
    
    @component('transfers.modals.processed-canceled', ['action' => route('transfers.destroy', '*')])
        ¿Está seguro que desea anular la nota de traspaso?
        <p>Una vez anulado, no se podrá recuperar la información llenada</p>
    @endcomponent
    @component('transfers.modals.processed-finalized', ['action' => route('transfers.store-finalized', '*')])
        ¿Está seguro que desea finalizar el traspaso de los productos? 
        <p>Una vez finalizado, no se podrá anular la nota de traspaso</p>
    @endcomponent
@endsection

@push('scripts')

@include('layouts.datatable')
@include('transfers.scripts.processed')
@include('transfers.scripts.canceled')  
@include('transfers.scripts.finalized')         
@endpush
