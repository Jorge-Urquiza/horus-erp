@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de Productos por Sucursal</h4>

            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('branch-products.index') }}">Productos por Sucursal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Lista de Productos por Sucursal</h4>
    </div>
    <div class="pull-right mb-3">
    </div>
</div>

<table class="table table-hover display no-wrap" id="table" style="width: 100%">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Codigo Local</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Stock Minimo</th>
            <th>Stock Maximo</th>
            <th>Opciones</th>
        </tr>
    </thead>
</table>

    @component('branch_products.modals.update', ['action' => route('branch-products.update', '*'), 'title' => 'Actualizar Nivel de Stock'])
    @method('PUT')
        @include('branch_products.forms.update')
    @endcomponent
@endsection

@push('scripts')

@include('layouts.datatable')
<script>
    var user = {!! auth()->user()->toJson() !!};
    var valor =[];
    var table = $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('branch-products.list')}}",
        "responsive" : true,
        "columns": [
            { data: 'id' },
            { data: 'local_code' },
            { data: 'name' },
            { data: 'current_stock' },
            { data: 'minimum_stock' },
            { data: 'maximum_stock' },
            { data: 'local_code' },
        ],
        "columnDefs": [ {
            "targets": 6,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                valor.push(row);
                return `
                     @can('branch-products.edit')
                    <a href="#modal-editar" data-toggle="modal" onclick="updateRoutes(${row.id},valor);" class="btn btn-outline-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Actualizar Stock">
                        <i class="dw dw-edit2"></i>
                    </a>
                    @endcan
                        
                `;
            }},
            {
                "targets": 0,
                "searchable": false,
                "orderable": false,
            }

        ],
      
        "order": [[ 0, 'desc' ]],
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


</script>

@endpush


