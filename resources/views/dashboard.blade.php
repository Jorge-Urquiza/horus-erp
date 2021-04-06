@extends('layouts.app')
@section('title')
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('templates/vendors/images/banner-img.png') }}" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
            </h4>
            <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
        </div>
    </div>
@endsection

@section('content')
<div class="pd-20 card-box mb-30">
    <h4 class="h4 text-blue mb-15">How to Change Sidebar Background Color ?</h4>
    <div class="row">
        <div class="col-md-5">
            <p>Default sidebar color is dark</p>
            <p><img src="vendors/images/layout/sidebar-dark.png" class="box-shadow" alt=""></p>
        </div>
        <div class="col-md-7">
            <p>Change sidebar color for white add class in <code>body class="sidebar-light"</code></p>
            <p><img src="vendors/images/layout/sidebar-white.png" class="box-shadow" alt=""></p>
        </div>
    </div>
</div>
@endsection
