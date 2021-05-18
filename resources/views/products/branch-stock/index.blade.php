@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Stock de Productos</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.stock') }}">Stock Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection


@section('content')
<div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Stock Productos</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="tables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo Local</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Total Stock Actual</th>
                        <th>Total Stock Minimo</th>
                        <th>Total Stock Maximo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>

@endsection

@push('scripts')
    @include('layouts.datatable')
    <script>
        $('#tables').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('products.list.stock')}}",
            "columns": [
                { data: 'id' },
                { data: 'local_code' },
                { data: 'name' },
                { data: 'price' },
                { data: 'total_current_stock' },
                { data: 'total_minimum_stock' },
                { data: 'total_maximum_stock' },
            ],
            "columnDefs": [ {
                "targets": 7,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ url('/products/${row.id}' ) }}"><i class="dw dw-eye"></i> Ver Sucursal</a>
                            </div>
                        </div>
                    `;
                }
            }]
        });


    </script>
@endpush
