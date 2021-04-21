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
    var total = 0;
    var subtotal=[];

    function agregar() {
        product_id = $("#product option:selected").val()
        producto = $("#product option:selected").text()
        cantidad = $("#cantidad").val();
        stock = $("#stock").val();
        compra = $("#pcompra").val();
        venta = $("#pventa").val();
        unidad = $("#unidad").val();

        if(producto != "" && cantidad != "" && compra != "" && venta != ""){
            resultado =  stock - cantidad;
            if(resultado < 0 ){
                alert("Error al ingresar los detalles de la venta, Stock insuficiente");
            }else{
                subtotal[index] =  (cantidad*venta);
                total= total + subtotal[index];
                var fila=`<tr class = "selected" id="fila${index}">
                    <td><button type="button" class="btn btn-danger" onClick="eliminar(${index})">
                        <i class="fa fa-arrows-alt" aria-hidden="true"></i> Quitar
                    </button></td>
                    <td><input type="hidden" class="form-control" name="producto_id[]" value="${product_id}">${producto}</td>
                    <td>${unidad}</td>
                    <td><input type="number" class="form-control" readonly name="compra[]" value ="${compra}"></td>
                    <td><input type="number" class="form-control" readonly name="precio[]" value="${venta}"></td>
                    <td><input type="number" class="form-control" readonly name="cantidad[]" value ="${cantidad}"></td>
                    <td>${subtotal[index]}</td>
                </tr>`;
                $("#detalle").append(fila);
                $('#total').html(total+ " Bs.");
                index++;
                evaluar();
                limpiar();
            }
        }else{
            alert("Error al ingresar los detalles de la venta, Revise los datos del producto");
        }
    }

    function evaluar(){
        if(total > 0){
            $('#guardar').show();
        }else{
            $('#guardar').hide();
        }
    }

    function limpiar() {
        $('#product option').prop('selected', function() {
            return this.defaultSelected;
        });
        $('#pcompra').val("");
        $('#cantidad').val("");
        $('#pventa').val("");
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
                let price = parseFloat(data.price).toFixed(2);
                $('#pcompra').val(price);
                $('#pventa').val(price);
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
