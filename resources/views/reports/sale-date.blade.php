@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Reporte de venta</h4>
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
        <div class="form-group row">
            <div class="col-12 col-lg-4">
                {{ Form::label('name', 'Sucursal*', ['class' => 'weight-500'])}}
                {!! Form::select('sucursal',['Matriz' => 'Matriz'] , null,
                ['class'=>'form-control','placeholder'=>'Seleecionar Sucursal']) !!}

            </div>
            <div class="col-12 col-lg-4">
                {{ Form::label('date','Fecha*', ['class' => 'weight-500']) }}
                {{ Form::date('date', \Carbon\Carbon::now() , ['class'=> 'form-control' ,
                'data-timepicker' => true, 'data-language' =>'es','required'=>true]) }}

            </div>
            <div class="col-12 col-lg-4">
                {{ Form::label('orden','Orden*', ['class' => 'weight-500']) }}
                {!! Form::select('sucursal',['Ascendente' => 'Ascendente', 'Descendente' => 'Descendente'] , 'Ascendente',
                ['class'=>'form-control','placeholder'=>'Seleecionar Sucursal']) !!}
            </div>
        </div>
        <button type="button" class="btn btn-outline-primary btn-lg btn-block">Generar</button>

    </div>


</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table class="table hover multiple-select-row data-table-export nowrap" id= "table">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">ID</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Sucursal</th>
                    <th>Fecha</th>
                    <th>Monto total</th>
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
    $('#table').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
    });
</script>
@endpush
