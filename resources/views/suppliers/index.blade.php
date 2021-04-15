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
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Nuevo Proveedor</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="tables">
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
@push('scripts')
    <script>
        $('#tables').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('suppliers.list')}}",
            "columns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'telephone' },
            ],
            "columnDefs": [ {
                "targets": 4,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ url('/suppliers/${row.id}' ) }}"><i class="dw dw-eye"></i> Ver</a>
                                <a class="dropdown-item" href="{{ url('/suppliers/${row.id}/edit') }}"><i class="dw dw-edit2"></i> Editar</a>
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
