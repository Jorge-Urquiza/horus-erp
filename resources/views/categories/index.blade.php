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
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm"
        role="button"><i class="fa fa-plus"></i> Nuevo categorua</a>
    </div>
</div>
<table class="table table-bordered mt-3" id="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
    </thead>
</table>

@component('elements.modal', ['action' => route('categories.destroy', '*')])
    ¿Está seguro que desea eliminar esta categoria?. Esto podria afectar a los campos relacionados con la categoria!
@endcomponent


@push('scripts')

<script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('categories.list')}}",
        "columns": [
            { data: 'id' },
            { data: 'name' },

        ],
        "columnDefs": [ {
            "targets": 2,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                return `
                    <div class="my-2">
                        <a href="{{ url('/categories/${row.id}/edit') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                        <a href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                        </a>
                    </div>
                `;
            }
        }]
    });

</script>

@endpush

@endsection
