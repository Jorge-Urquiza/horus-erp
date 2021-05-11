@extends('layouts.app')
@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Registrar nueva venta</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Venta</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('sales.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')

<div class="clearfix">
    <div class="pull-left">
        <h3 class="text-blue h4">Crear nueva Venta</h3>
    </div>
</div>
    {!! Form::open(['route'=> ['sales.store'], 'method' => 'POST']) !!}
        @include('sales.partials.form')
    {!! Form::close() !!}
@endsection

@push('scripts')
<script>
    //JQUERY
    $(document).ready(function(){

        $('#guardar').hide();
        $('#fila').hide();
        $('#link_descuento').hide();
        //Eventos
        $('#product').on('change', function() {
            completarProducto($("#product option:selected").val());
        });
        $('#customer_id').on('change', function() {
            completarCustomer($("#customer_id option:selected").val());
        });
        $( "#btn_add" ).click(function() {
            agregar();
        });

    });

    var index= 0;
    var subtotal= []; // precio de compra * cantidad
    var total = [] // (precio de compra * cantidad) - decuento
    var totales = 0;  // Sumatoria de los totales

    function getDescuento()
    {
        let descuento = $("#descuento").val();
        descuento = (descuento === "") ? 0 : Number(descuento);
        return descuento.toFixed(2);
    }
    function agregar() {
        let product_id = $("#product option:selected").val();
        let producto = $("#product option:selected").text();
        let cantidad = $("#cantidad").val();
        let stock = $("#stock").val();
        let compra = $("#pcompra").val();
        let descuento = getDescuento();
        let unidad = $("#unidad").val();
        let venta = ((compra * cantidad) - descuento).toFixed(2);


        if(producto != "" && cantidad != "" && compra != "" && venta != ""){
            resultado =  stock - cantidad;
            if(resultado < 0 ){
                alert("Error al ingresar los detalles de la venta, Stock insuficiente");
            }else{
                subtotal[index] =  (cantidad*compra).toFixed(2);
                total[index] =  parseFloat(venta).toFixed(2);
                totales = parseFloat(totales + subtotal[index]).toFixed(2);

                console.log(total);
                var fila=`<tr class = "selected" id="fila${index}">
                    <td><button type="button" class="btn btn-danger" onClick="eliminar(${index})">
                        <i class="fa fa-arrows-alt" aria-hidden="true"></i> Quitar
                    </button></td>
                    <td><input type="hidden" class="form-control" name="producto_id[]" value="${product_id}">${producto}</td>
                    <td>${unidad}</td>
                    <td><input type="number" class="form-control" readonly name="pcompra[]" value ="${compra}"></td>
                    <td><input type="number" class="form-control" readonly name="cantidad[]" value ="${cantidad}"></td>
                    <td>${subtotal[index]}</td>
                    <td><input type="number" class="form-control" readonly name="pdescuento[]" value="${descuento}"></td>
                    <td><input type="number" class="form-control" readonly name="ptotal[]" value="${total[index]}"></td>
                </tr>`;
                $("#detalle").append(fila);
                $('#totales').html(totales+ " Bs.");
                index++;
                evaluar();
                limpiar();
            }
        }else{
            alert("Error al ingresar los detalles de la venta, Revise los datos del producto");
        }
    }

    function evaluar(){
        if(totales > 0){
            $('#guardar').show();
            $('#fila').show();
            $('#link_descuento').show();
        }else{
            $('#guardar').hide();
            $('#fila').hide();
            $('#link_descuento').hide();
        }
    }

    function limpiar() {
        $('#product option').prop('selected', function() {
            return this.defaultSelected;
        });
        $('#pcompra').val("");
        $('#cantidad').val("");
        $('#unidad').val("");
        $('#stock').val("");
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $("#fila" + index).remove();
        $('#total').html(total+ " Bs.");
        // para escodner los botones si se borro todo el detalle
        evaluar();
    }
    function completarProducto(id) {
        var url = "{{ route('api.product',':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                console.log(data);
                $('#pcompra').val(data.price);
                $('#pventa').val(data.price);
                $('#stock').val(data.current_stock);
                $('#unidad').val(data.measurements_unit.name);
            },
            error: function() {
                alert("Seleccione un producto valido");
            }
        });
    }

    function completarCustomer(id) {
        var url = "{{ route('api.customer',':id') }}";
        url = url.replace(':id', id)
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                $('#ci').val(data.ci);
            },
            error: function() {
                alert("Seleccione un cliente valido");
            }
        });
    }

</script>
@endpush
