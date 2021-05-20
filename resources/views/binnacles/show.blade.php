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
                    <li class="breadcrumb-item active" aria-current="page">Detalle</li>
                </ol>
            </nav>
        </div>
        <div class="col text-right">
            <a href="{{ route('binnacles.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
            </a>
        </div>
    </div>
@endsection

@section('content')

<div class="alert alert-success" role="alert">
    <p> <strong>Detalle de la activitidad<strong></p>
    <ul>
        <li>
            <strong>Activity ID: </strong> {{ $activity->id }}
        </li>
        <li>
            <strong>Action: </strong> {{ $activity->action }}
        </li>
        <li>
            <strong>User: </strong> {{ $activity->user }}
        </li>
        <li>
            <strong>Description: </strong> {{ $activity->description }}
        </li>
        <li>
            <strong>Subject Type: </strong> {{ $activity->subject_type }}
        </li>
        <li>
            <strong>Causer ID: </strong> {{ $activity->subject_id }}
        </li>
        <li>
            <strong>Caurser Type: </strong> {{ $activity->causer_type }}
        </li>
        <li>
            <strong>Date: </strong> {{ $activity->created_at }}
        </li>
    </ul>
</div>

<div class="alert alert-warning" role="alert">
    <p> <strong>Acerca de actividad  <strong></p>

    
        <div class="row">
            @foreach ($activity->properties as $items)
                @if ($loop->first)
                <div class="col-lg-6">
                    <p>Atributos</p>
                @else
                <div class="col-lg-6">
                    <p>Valor Nuevo</p>
                @endif
                @foreach ($items as $key => $item)
                    <li>
                        <strong>{{ $key }} : {{ $item }} </strong>
                    </li>
                @endforeach
                </div>
            @endforeach
        </div>

    


@endsection
