@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de actividades</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('binnacles.index') }}">Bitacora</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<div class="clearfix">
    <div class="pull-left">
        <h4 class="text-blue h4">Bitacora</h4>
    </div>

</div>

    <table class="table table-bordered mt-3" id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Log name</th>
                <th>Description</th>
                <th>Subject id</th>
                <th>Causer type</th>
                <th>Causer ID</th>
                <th>Date</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
@push('scripts')

<script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('binnacles.list')}}",
        "columns": [
            { data: 'id' },
            { data: 'log_name' },
            { data: 'description' },
            { data: 'subject_id' },
            { data: 'causer_type' },
            { data: 'causer_id' },
            { data: 'created_at' },
        ],
        "columnDefs": [ {
            "targets": 7,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                return `
                    <div class="my-2">
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i> Ver detalles
                        </a>
                    </div>
                `;
            }
        }]
    });

</script>

@endpush

@endsection
