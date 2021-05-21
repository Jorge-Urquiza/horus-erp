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
                    <li class="breadcrumb-item"><a href="{{ route('binnacles.show', $activity->id) }}">Actividad # {{ $activity->id }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle</li>
                </ol>
            </nav>
        </div>

    </div>
@endsection

@section('content')
<div class="col text-right">
    <a href="{{ route('binnacles.index') }}" class="btn btn-outline-primary btn-sm">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
    </a>
</div>
<div class="card border-dark my-3">
    <div class="card-header">Activitidad # {{ $activity->id }}</div>
    <div class="card-body text-dark">
      <h5 class="card-title">Actividad</h5>
        <ul>
            <li>
                <strong>Acción: </strong> {{ $activity->action }}
            </li>
            <li>
                <strong>Realizada por: </strong> {{ $activity->user }}
            </li>
            <li>
                <strong>Causante ID: </strong> {{ $activity->causer_id?? 'No asignado' }}
            </li>
            <li>
                <strong>Tipo: </strong> {{ $activity->subject_type }}
            </li>
            <li>
                <strong>Modelo: </strong> {{ $activity->target }}
            </li>
            <li>
                <strong>Fecha y Hora: </strong> {{ $activity->created_at }}
            </li>
        </ul>
        <small class="text-muted">Esta información corresponde al momento exacto en el que se realizo la acción</small>
    </div>

</div>
<div class="card border-info mb-3">
    <div class="card-header">Acerca de la Actividad</div>
    <div class="card-body text-dark">
            <h5 class="card-title">Atributos</h5>
            <div class="row">
                @foreach ($activity->properties as $items)
                    @if ($loop->first)
                    <div class="col-lg-6">
                        <p><strong>Valor Actual</strong></p>
                    @else
                    <div class="col-lg-6">
                        <p><strong>Valor Anterior</strong></p>
                    @endif
                    @foreach ($items as $key => $item)
                    <ul>
                        <li>
                            <strong>{{ $key }}:  </strong> {{ $item }}
                        </li>
                    </ul>
                    @endforeach
                    </div>
                @endforeach
            </div>
            <small class="text-muted">Esta información corresponde a los datos que fueron creados/moficados o eliminados.</small>
    </div>
</div>
@endsection
