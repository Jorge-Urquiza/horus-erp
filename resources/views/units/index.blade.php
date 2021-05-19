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
            @can('brands.create')
            <a href="#modal-crear" data-toggle="modal" onclick="crearRoute();" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar Unidad de Medida</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="table_unit" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Abreviatura</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    @component('elements.modal', ['action' => route('units.destroy', '*')])
        ¿Está seguro que desea eliminar la unidad de medida?
    @endcomponent

    @component('units.modals.create', ['action' => route('units.store'), 'title' => 'Registrar Unidad de Medida'])
        @include('units.form.create')
    @endcomponent

    @component('units.modals.edit', ['action' => route('units.update', '*')])
        @method('PUT')
        @include('units.form.edit')
    @endcomponent

@endsection

@push('scripts')

    @include('layouts.datatable')

    <script>
        var valor = [];
        $('#table_unit').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('units.list')}}",
            "responsive" : true,
            "columns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'abbreviation' },
                { data: 'name' },
            ],
            "columnDefs": [ {
                "targets": 3,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {

                    valor.push(row);
                    return `
                        @can('units.edit')
                        <a class="btn btn-outline-warning btn-sm" href="#modal-editar" data-toggle="modal" onclick="updateRoutes(${row.id},valor);" data-tooltip="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i>
                        </a>
                        @endcan
                        @can('units.destroy')
                        <a class="btn btn-outline-danger btn-sm" href="#modal-confirm"" data-toggle="modal" onclick="updateRoute(${row.id});" data-tooltip="tooltip" data-placement="top" title="Eliminar">
                            <i class="dw dw-delete-3"></i>
                        </a>
                        @endcan
                    `;
                }
            }],
            "order": [[ 0, 'desc' ]],
            drawCallback: function (settings) {
                $('[data-toggle="tooltip"]').tooltip();
                $('[data-tooltip="tooltip"]').tooltip();
            }
        });
    </script>
@endpush

