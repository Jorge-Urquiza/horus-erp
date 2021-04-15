@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Unidades de Medidas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('units.index') }}">Unidades de Medidas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Unidades de Medidas</h4>
        </div>
        <div class="pull-right">
            <a href="#modal-crear" data-toggle="modal" onclick="crearRoute();" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Nueva Unidad de Medida</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="table_unit">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Abreviacion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
@component('elements.modal', ['action' => route('units.destroy', '*')])
    ¿Está seguro que desea eliminar la unidad de medida?
@endcomponent

@component('units.modals.create', ['action' => route('units.store'), 'title' => 'Nueva Unidad de Medida'])
    @include('units.form.create')
@endcomponent

@component('units.modals.edit', ['action' => route('units.update', '*')])
    @method('PUT')
    @include('units.form.edit')
@endcomponent

@push('scripts')
    <script>
        var valor = [];
        $('#table_unit').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('units.list')}}",
            "columns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'abbreviation' },
            ],
            "columnDefs": [ {
                "targets": 3,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    
                    valor.push(row);
                    return `
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#modal-editar" data-toggle="modal" 
                                    onclick="updateRoutes(${row.id},valor);">
                                    <i class="dw dw-edit2"></i> Editar</a>
                                <a class="dropdown-item" href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-danger">
                                <i class="dw dw-delete-3"></i> Eliminar</a>
                            </div>
                        </div>
                    `;
                }
            }]
        });
        
        
    </script>
@endpush

@endsection
