@extends('layouts.app')

@section('title')
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Actividad</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('binnacles.index') }}">Bitacora</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle</li>
                </ol>
            </nav>
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

    <ul>
        @foreach ($activity->properties as $items)
            @if ($loop->first)
            <p>Atributos</p>
            @else
            <br>
            <p>Old Value</p>
            @endif
            @foreach ($items as $key => $item)
                <li>
                    <strong>{{ $key }} : {{ $item }} </strong>
                </li>
            @endforeach
        @endforeach

    </ul>
</div>
        <a href="{{route('binnacles.index')}}" class="btn btn-primary">Volver</a>
   </div>

@endsection