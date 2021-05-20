@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Venta</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Venta</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Lista de ventas</h4>
    </div>
    <div class="pull-right mb-3">
        <a href="{{ route('sales.create') }}" class="btn btn-outline-primary btn-sm"
        role="button"><i class="fa fa-plus"></i> Nueva venta</a>
    </div>
</div>
<table class="table table-bordered mt-3" id="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Vendedor</th>
            <th>Sucursal</th>
            <th>Total</th>
            <th>Opciones</th>
        </tr>
    </thead>
</table>

@component('elements.modal', ['action' => route('sales.destroy', '*')])
¿Está seguro que desea eliminar este producto?
@endcomponent

@endsection

@push('scripts')

@include('layouts.datatable')
<script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('sales.list')}}",
        "columns": [
            { data: 'id' },
            { data: 'date' },
            { data: null,
                render: function ( data, type, row ) {
                    return row.customer.name + ' ' + row.customer.last_name;
                }
            },
            { data: null,
                render: function ( data, type, row ) {
                    return row.seller.name + ' ' + row.seller.last_name;
                }
            },
            { data: 'branch_office.name' },
            { data: null,
                render: function ( data, type, row ) {
                    return '<strong>' + row.total_amount +'</strong>';
                }
            },
        ],
        "columnDefs": [ {
            "targets": 6,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                return `
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ url('/sales/${row.id}' ) }}"><i class="dw dw-eye"></i> Ver</a>
                            <a class="dropdown-item" href="{{ url('/pdf/${row.id}' ) }}"><i class="dw dw-books"></i> pdf</a>
                            <a class="dropdown-item" href="{{ url('/download/${row.id}' ) }}"><i class="dw dw-download"></i> descargar</a>
                            <a class="dropdown-item" href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-danger">
                            <i class="dw dw-delete-3"></i> Anular</a>
                        </div>
                    </div>
                `;
            }
        }]
    });

</script>

@endpush

