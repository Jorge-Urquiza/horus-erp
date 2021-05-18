@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de Sucursales</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('branch-offices.index') }}">Sucursales</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Lista de Sucursales</h4>
    </div>
    <div class="pull-right mb-3">
        @can('branch-offices.create')
        <a href="{{ route('branch-offices.create') }}" class="btn btn-outline-primary btn-sm"
        role="button"><i class="fa fa-plus"></i> Registrar Sucursal</a>
        @endcan
    </div>
</div>

    <table class="table table-hover display no-wrap mt-3" id="table" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
    @component('elements.modal', ['action' => route('branch-offices.destroy', '*')])
        ¿Está seguro que desea eliminar esta sucursal?. Esto podria afectar a los campos relacionados con este registro!
    @endcomponent

@endsection

@push('scripts')
@include('layouts.datatable')
<script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('branch-offices.list')}}",
        "responsive" : true,
        "columns": [
            { data: 'id' },
            { data: 'name' },
            { data: 'address' },
            { data: 'telephone' },
            { data: 'name' },
        ],
        "columnDefs": [ {
            "targets": 4,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                return `
                    @can('branch-offices.edit')
                    <a href="{{ url('/branch-offices/${row.id}/edit') }}" class="btn btn-outline-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Editar">
                        <i class="fa fa-pencil"></i>
                    </a>
                    @endcan
                    @can('branch-offices.destroy')
                    <a href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-outline-danger" data-tooltip="tooltip" data-placement="top" title="Eliminar">
                        <i class="fa fa-trash"></i>
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

