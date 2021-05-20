@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de categorias</h4>

            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>    
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Lista de Categorias</h4>
    </div>
    <div class="pull-right mb-3">
        <a href="#modal-crear" data-toggle="modal" onclick="crearRoute();" class="btn btn-outline-primary btn-sm"
        role="button"><i class="fa fa-plus"></i> Registrar categoria</a>
    </div>
</div>
<table class="table table-hover display no-wrap" id="table" style="width: 100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
    </thead>
</table>

    @component('elements.modal', ['action' => route('categories.destroy', '*')])
        ¿Está seguro que desea eliminar esta categoria?
    @endcomponent

    @component('categories.modals.create', ['action' => route('categories.store'), 'title' => 'Registrar categoria'])
        @include('categories.forms.create')
    @endcomponent

    @component('categories.modals.edit', ['action' => route('categories.update', '*'), 'title' => 'Editar categoria'])
    @method('PUT')
        @include('categories.forms.edit')
    @endcomponent
@endsection

@push('scripts')

@include('layouts.datatable')
<script>
    var valor = [];
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('categories.list')}}",
        "responsive":true,
        "columns": [
            { data: 'id' },
            { data: 'name' },
            { data: 'name' }
        ],
        "columnDefs": [ {
            "targets": 2,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                valor.push(row);
                return `
                        @can('categorias.edit')
                        <a class="btn btn-outline-warning btn-sm" href="#modal-editar" data-toggle="modal" onclick="updateRoutes(${row.id},valor);" data-tooltip="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i>
                        </a>
                        @endcan
                        @can('categorias.destroy')
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


