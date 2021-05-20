@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de productos</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Productos</h4>
        </div>
        <div class="pull-right">
            @can('productos.create')
            <a href="{{ route('products.create') }}" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar Producto</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="tables" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo Local</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    @component('elements.modal', ['action' => route('products.destroy', '*')])
        ¿Está seguro que desea eliminar este producto?
    @endcomponent
@endsection

@push('scripts')
    @include('layouts.datatable')
    <script>
        $('#tables').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('products.list')}}",
            "responsive" : true,
            "columns": [
                { data: 'id' },
                { data: 'local_code' },
                { data: 'name' },
                { data: 'category.name' },
                { data: 'price' },
                { data: 'name' },
            ],
            "columnDefs": [ {
                "targets": 5,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <a class="btn btn-outline-info btn-sm" href="{{ url('/products/${row.id}' ) }}" data-toggle="tooltip" data-placement="top" title="Ver">
                            <i class="dw dw-eye"></i></a>
                        @can('productos.edit')
                        <a class="btn btn-outline-warning btn-sm" href="{{ url('/products/${row.id}/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i></a>
                        @endcan
                        @can('productos.destroy')
                        <a class="btn btn-outline-danger btn-sm" href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-delete-3"></i> </a>
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
