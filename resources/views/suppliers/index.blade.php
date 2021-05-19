@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Proveedores</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Proveedores</h4>
        </div>
        <div class="pull-right">
            @can('suppliers.create')
            <a href="{{ route('suppliers.create') }}" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar Proveedor</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="tables" style="width: 100%">
                <thead>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 30%">Nombre</th>
                        <th style="width: 20%">Email</th>
                        <th style="width: 20%">Telefono</th>
                        <th style="width: 20%">Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    @component('elements.modal', ['action' => route('suppliers.destroy', '*')])
    ¿Está seguro que desea eliminar este proveedor?
    @endcomponent
@endsection

@push('scripts')

    @include('layouts.datatable')
    <script>
        $('#tables').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('suppliers.list')}}",
            "responsive" : true,
            "columns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'telephone' },
                { data: 'name' },
            ],
            "columnDefs": [ {
                "targets": 4,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <a class="btn btn-outline-info btn-sm" href="{{ url('/suppliers/${row.id}' ) }}" data-toggle="tooltip" data-placement="top" title="Ver">
                            <i class="dw dw-eye"></i> 
                        </a>
                        @can('suppliers.edit')
                        <a class="btn btn-outline-warning btn-sm" href="{{ url('/suppliers/${row.id}/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i>
                        </a>
                        @endcan
                        @can('suppliers.destroy')
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

