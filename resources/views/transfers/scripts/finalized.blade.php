<script>
    $('#table_f').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "ajax": "{{route('transfers.list-finalized')}}",
            "responsive": true,
            "columns": [
                { data: 'id' },
                { data: 'date' },
                { data: 'origen' },
                { data: 'destino' },
                { data: 'personal' },
                { data: 'date' },
            ],
            "columnDefs": [ {
                "targets": 5,
                "sortable": false,
                "searchable": true,
                render: function (data, type, row) {
                    return `
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ url('/transfers/${row.id}' ) }}"><i class="dw dw-eye"></i> Ver</a>
                                @can('transfers.pdf')
                                <a class="dropdown-item" href="{{ url('/transfers/pdf/${row.id}' ) }}" target="_blank"><i class="dw dw-books"></i>Pdf</a>
                                <a class="dropdown-item" href="{{ url('/transfers/download/${row.id}' ) }}"><i class="dw dw-download"></i>Descargar</a>
                                @endcan
                            </div>
                        </div>
                    `;
                }
            }],
            "order": [[ 0, 'desc' ]],
            drawCallback: function (settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });


    </script>