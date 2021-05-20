@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Roles</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de los roles</h4>
        </div>
        <div class="pull-right mb-3">
            <a href="{{ route('roles.create') }}" class="btn btn-outline-primary btn-sm">
                <i class="fa fa-plus"></i> Registrar rol
            </a>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover" id="table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 30%">Nombre</th>
                        <th style="width: 20%">Descripción</th>
                        <th style="width: 20%">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


@component('elements.modal', ['action' => route('roles.destroy', '*')])
    ¿Está seguro que desea eliminar este rol?
@endcomponent

@endsection
@push('scripts')
    @include('layouts.datatable')
    <script>
        $('#table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },            
            "responsive" : true,
            "ajax": "{{route('roles.list')}}",
            "columns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'description' },
                { data: 'description' },
            ],
            "columnDefs": [ {
                "targets": 3,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <a class="btn btn-outline-info btn-sm" href="{{ url('/roles/${row.id}' ) }}" data-toggle="tooltip" data-placement="top" title="Ver">
                            <i class="dw dw-eye"></i>
                        </a>
                        <a class="btn btn-outline-warning btn-sm" href="{{ url('/roles/${row.id}/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i>
                        </a>
                        <a class="btn btn-outline-danger btn-sm" href="#modal-confirm"" data-toggle="modal" onclick="updateRoute(${row.id});" data-tooltip="tooltip" data-placement="top" title="Eliminar">
                            <i class="dw dw-delete-3"></i>
                        </a>
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
