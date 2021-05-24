@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Reporte de venta - Completadas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('report.sale.date') }}">Reporte venta</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <form action="" method="get">
            <div class="form-group row">
                <div class="col-12 col-lg-4">
                    {{ Form::label('branch_office', 'Sucursal', ['class' => 'weight-500'])}}
                    <select class="form-control" name="branch_office_id" id="branch_office">
                        <option value="" selected disabled><p>Seleccionar Sucursal</p></option>
                        @foreach ($branchOffices as $branchOffice)
                            <option value="{{ $branchOffice->id }}" {{  request('branch_office_id')  ? 'selected' : ''  }}>{{ $branchOffice->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-lg-4">
                    {{ Form::label('initial_date','Fecha Inicio', ['class' => 'weight-500']) }}
                    <input class="form-control" id="initial_date" name="initial_date"
                    type="date" value="{{ request('initial_date') }}">
                </div>
                <div class="col-12 col-lg-4">
                    {{ Form::label('end_date','Fecha Fin', ['class' => 'weight-500']) }}
                    <input class="form-control" id="end_date" name="end_date"
                    type="date" value="{{ request('end_date') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Generar</button>
        </form>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <table class="table table-hover display no-wrap" id= "table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>NIT</th>
                    <th>Vendedor</th>
                    <th>Sucursal</th>
                    <th>Fecha</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')

@include('layouts.datatable')


<script src="{{ asset('templates/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('templates/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('templates/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('templates/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('templates/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('templates/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('templates/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

<script>
$( document ).ready(function() {
    $('#table').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": {
            "url": "{{route('report.sale.list')}}",
            "data" : @json($queryParams)
        },
        "columns": [
            { data: 'id' },
            { data: 'customer.full_name' },
            { data: 'nit' },
            { data: 'seller.full_name' },
            { data: 'branch_office.name' },
            { data: 'date' },
            { data: 'total_amount' },
        ],
    });
});
</script>
@endpush
