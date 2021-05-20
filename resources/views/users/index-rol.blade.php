@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Usuarios</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Roles </a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.rol.index', $rol->id) }}">Usuarios tipo {{ $rol->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Usuarios: {{ $rol->name }}</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-arrow-left"></i> Salir</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="tables" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>CI</th>
                        <th>Email</th>
                        <th>Telefono celular</th>
                        <th>Sucursal</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    @component('elements.modal', ['action' => route('users.destroy', '*')])
        ¿Está seguro que desea eliminar este usuario?
    @endcomponent
@endsection
@push('scripts')
    @include('layouts.datatable')
    <script>
        $('#tables').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('users.list')}}",
            "responsive" : true,
            "columns": [
                { data: 'id' },
                { data: 'full_name' },
                { data: 'ci' },
                { data: 'email' },
                { data: 'telephone' },
                { data: 'branch_office.name' },
            ],
            "columnDefs": [ {
                "targets": 6,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <a class="btn btn-outline-info btn-sm" href="{{ url('/users/${row.id}' ) }}" data-toggle="tooltip" data-placement="top" title="Ver">
                            <i class="dw dw-eye"></i>
                        </a>
                        <a class="btn btn-outline-warning btn-sm" href="{{ url('/users/${row.id}/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i></a>
                        <a class="btn btn-outline-danger btn-sm" href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Eliminar">
                            <i class="dw dw-delete-3"></i> </a>
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
