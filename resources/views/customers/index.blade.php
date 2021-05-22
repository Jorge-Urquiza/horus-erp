@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Cliente</h4>

            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Cliente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Lista de Clientes</h4>
    </div>
    <div class="pull-right mb-3">
        @can('customers.create')
        <a href="{{ route('customers.create') }}" class="btn btn-outline-primary btn-sm"
        role="button"><i class="fa fa-plus"></i> Registrar Cliente</a>
        @endcan
    </div>
</div>

    <table class="table table-bordered mt-3" id="table" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>CI</th>
                <th>Telefono celular</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>

    @component('elements.modal', ['action' => route('customers.destroy', '*')])
        ¿Está seguro que desea eliminar este cliente?. Esto podria afectar a los campos relacionados con el cliente!
    @endcomponent

@endsection

@push('scripts')

@include('layouts.datatable')
<script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('customers.list')}}",
        "responsive": true,
        "columns": [
            { data: 'id' },
            { data: 'name' },
            { data: 'last_name' },
            { data: 'ci' },
            { data: 'telephone' },
        ],
        "columnDefs": [ {
            "targets": 5,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                return `
                        @can('customers.edit')
                        <a href="{{ url('/customers/${row.id}/edit') }}" class="btn btn-outline-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @endcan
                        @can('customers.destroy')
                        <a href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-outline-danger" data-tooltip="tooltip" data-placement="top" title="Eliminar">
                            <i class="fa fa-trash"></i>
                        </a>
                        @endcan
                `;
            }
        }],
        "order": [[ 0, 'desc' ]],
        drawCallback: function (settings) {
            $('[data-tooltip="tooltip"]').tooltip();
        }
    });

</script>
@endpush
