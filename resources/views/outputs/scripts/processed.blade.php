<script>
    $('#table_p').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": "{{route('outputs.list-processed')}}",
        "columns": [
            { data: 'id' },
            { data: 'date' },
            { data: 'sucursal' },
            { data: 'personal' },
        ],
        "columnDefs": [ {
            "targets": 4,
            "sortable": false,
            "searchable": true,
            render: function (data, type, row) {
                return `
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ url('/outputs/${row.id}' ) }}"><i class="dw dw-eye"></i> Ver</a>
                            @can('outputs.pdf')
                            <a class="dropdown-item" href="{{ url('/outputs/pdf/${row.id}' ) }}" target="_blank"><i class="dw dw-books"></i>Pdf</a>
                            <a class="dropdown-item" href="{{ url('/outputs/download/${row.id}' ) }}"><i class="dw dw-download"></i>Descargar</a>
                            @endcan
                            @can('outputs.entregar')
                            <a class="dropdown-item" href="#modal-status" data-toggle="modal" onclick="entregar(${row.id});" class="btn btn-sm btn-danger">
                            <i class="icon-copy dw dw-notepad-2"></i>Entregado</a>
                            @endcan
                            @can('outputs.destroy')
                            <a class="dropdown-item" href="#modal-confirm" data-toggle="modal" onclick="updateRoute(${row.id});" class="btn btn-sm btn-danger">
                            <i class="dw dw-delete-3"></i>Anular</a>
                            @endcan
                        </div>
                    </div>
                `;
            }
        }]
    });


</script>