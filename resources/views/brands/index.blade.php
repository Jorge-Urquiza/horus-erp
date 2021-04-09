@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Lista de marcas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Marcas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Lista de usuarios</h4>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"
            role="button"><i class="fa fa-plus"></i> Nuevo usuario</a>
        </div>
    </div>


    @modal(['action' => route('actividades.destroy', '*')])
        ¿Está seguro que desea eliminar esta actividad?. Las facturas emitidas con esta actividad no seran
        afectadas. Sin embargo las dosificaciones relacionadas a esta actividad serán eliminadas!
    @endmodal

@endsection
