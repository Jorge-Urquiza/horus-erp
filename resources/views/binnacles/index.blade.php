@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Bitacora</h4>
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
        <h4 class="text-blue h4">Lista de actividades</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover display no-wrap" id="table" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Tabla</th>
                    <th>Acción</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
                </tr>
            </thead>

        </table>
    </div>
</div>
@endsection
@push('scripts')
@include('layouts.datatable')
<script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "responsive": true,
        "lengthMenu": [
                    [10, 25, 50, 100, 200, -1],
                    ['10', '25', '50', '100', '200', 'Todo']
        ],
        "ajax": "{{route('binnacles.list')}}",
        "order": [
            [0, 'desc']
        ],
        "columns": [
            { data: 'id' },
            { data: 'created_at' },
            { data: 'target' },
            { data: 'action' },
            { data: 'user' },
            { data: 'description' },
        ],
        "columnDefs": [
                    {
                        targets: 5,
                        render: function (data, type, row) {
                            return `
                                <a class="btn btn-outline-info btn-sm" href="{{ url('/binnacles/${row.id}/show') }}" data-toggle="tooltip" data-placement="top" title="Ver Detalle">
                                    <i class="fa fa-eye"></i>
                                </a>

                            `;
                        }
                    }
                ],
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-tooltip="tooltip"]').tooltip();
        }
    });

</script>

@endpush
