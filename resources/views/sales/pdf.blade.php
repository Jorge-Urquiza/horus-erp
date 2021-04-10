@extends('layouts.invoice')

@section('content')

    {{-- Logo y códigos de autorización --}}
    <section class="d-block">
        {{-- Ese margin 3 es por que dompdf me mueve la imagen --}}
        <div class="d-inline-block mt-3" style="width: 49%;">
            <img class="invoice-logo" src="" title="">
        </div>

        <div class="w-50 d-inline-block align-middle text-center">
            <p class="mb-0"><span class="font-weight-bold">NIT:</span> 123</p>
            <p class="mb-0"><span class="font-weight-bold">FACTURA Nº:</span> 123</p>
            <p class="mb-0"><span class="font-weight-bold">AUTORIZACIÓN:</span> 123</p>
        </div>
    </section>

    {{-- Información y datos del contribuyente --}}
    <section class="d-block my-4">
        <div class="d-inline-block" style="width: 49%;">
            <div class="mb-0">Razon social</div>

            {{-- Si la sucursal en la que se emitio la factura es casa matriz --}}

            <div class="mb-0">Sucursal N° 3333</div>

            <div class="mb-0">Calle #21</div>


                <div class="mb-0">Teléfonos: 4444</div>


            <div class="mb-0">Santa Cruz - Bolivia</div>
        </div>

        <div class="d-inline-block text-center align-top" style="width: 49%;">
            <div class="text-center font-weight-bold w-100">Title</div>
            <p class="mb-0">Actividad 1</p>
        </div>
    </section>

    {{-- Información de Cliente --}}
    <section>
        <p class="mb-0">
            <span class="font-weight-bold">Lugar y fecha: </span>Santa Cruz, 20/12/2021
        </p>

        <p class="mb-0">
            <span class="font-weight-bold">Señor(es): </span>Juan Perez
        </p>

        <p class="mb-2">
            <span class="font-weight-bold">NIT: </span>0
        </p>
    </section>

    {{-- Código de control y QR --}}
    <section class="d-block mt-4">

        <div class="d-inline-block ml-5 align-middle">
            <p class="w-100 font-12 mb-0"><span class="font-weight-bold">Código de Control: </span>132165</p>
            <p class="w-100 font-12 mb-0"><span class="font-weight-bold">Fecha límite de emisión: </span>12/20/2012</p>
        </div>
    </section>

@endsection
