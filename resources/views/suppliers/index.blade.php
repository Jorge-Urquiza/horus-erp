@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Proveedores</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix mb-2">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de Proveedores</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Nuevo Proveedor</a>
        </div>
    </div>
    <table class="data-table table stripe hover nowrap mt-3" id="tables">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $s)
            <tr>
                <td style="width: 10%">{{$s->id}}</td>
                <td style="width: 30%">{{$s->name}}</td>
                <td style="width: 10%">{{$s->email}}</td>
                <td style="width: 20%">{{$s->telephone}}</td>
                <td style="width: 20%">{{$s->id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@push('scripts')
<script>
     $('#tables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "responsive": true,
        });
    
    
</script>
@endpush
