@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Actualizar Mi perfil</h4>
        </div>
    </div>
    <div class="col text-right">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir
        </a>
    </div>
</div>
@endsection

@section('content')
    {!! Form::model($user, ['method'=>'POST','route'=> ['user.profile.update', $user->id]]) !!}
        @csrf
        @method('PATCH')
        @include('users.profile.form')
    {!! Form::close()!!}
@endsection
