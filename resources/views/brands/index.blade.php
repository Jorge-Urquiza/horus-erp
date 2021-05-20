@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Marcas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Marcas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Marcas</h4>
        </div>
        <div class="pull-right">
            @can('brands.create')
            <a href="#modal-crear" data-toggle="modal" onclick="crearRoute();" class="btn btn-outline-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Registrar Marca</a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover display no-wrap" id="tables" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Abreviatura</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    @component('elements.modal', ['action' => route('brands.destroy', '*')])
        ¿Está seguro que desea eliminar esta marca?
    @endcomponent

    @component('brands.modals.create', ['action' => route('brands.store'), 'title' => 'Registrar marca'])
        @include('brands.form.create')
    @endcomponent

    @component('brands.modals.edit', ['action' => route('brands.update', '*'), 'title' => 'Editar marca'])
    @method('PUT')
        @include('brands.form.edit')
    @endcomponent
@endsection

@push('scripts')

    @include('layouts.datatable')

    <script>
        function Mostrar (id){
            var url = "{{ route('brands.show',':id') }}";
            $('#name').removeClass("is-invalid");
            $('#abbreviation').removeClass("is-invalid");
            url = url.replace(':id', id);
            $.get(url, function (data){
                $('#name').val(data.name);
                $('#abbreviation').val(data.abbreviation);
                $('#id').val(data.id);
            })
            setTimeout(function() {
                $('#modal-editar').modal("show");
            }, 700);          
            
        };
        var valor = [];
        $('#tables').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('brands.list')}}",
            "responsive": true,
            "columns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'abbreviation' },
                { data: 'name' },
            ],
            "columnDefs": [ {
                "targets": 3,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    valor.push(row);
                    return `
                        
                        @can('brands.edit')
                        <a class="btn btn-outline-warning btn-sm" href="#modal-editar" data-toggle="modal" onclick="updateRoutes(${row.id},valor);" data-tooltip="tooltip" data-placement="top" title="Editar">
                            <i class="dw dw-edit2"></i>
                        </a>
                        @endcan
                        @can('brands.destroy')
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
