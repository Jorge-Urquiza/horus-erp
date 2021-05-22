@extends('layouts.app')
@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Registrar Venta</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('sales.index') }}" class="btn btn-outline-primary">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Salir
        </a>
    </div>
</div>
@endsection

@section('content')

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
        $( "#btn_add_descuento" ).click(function() {
            actualizarTotalNeto();
            $('#exampleModal').modal('hide');
        });

    });

    var index= 0;
    var subtotal= []; // precio de compra * cantidad
    var total = []; // (precio de compra * cantidad) - decuento
    var totales = 0;  // Sumatoria de los totales
    var descuento_total = 0;
    var total_neto_venta = 0;

    function actualizarTotalNeto()
    {
        let discount_total = $("#descuento_total").val();

        discount_total = (discount_total === "") ? 0 : Number(discount_total); // get descuento %

        let total_descuento_calculado_pesos  = (discount_total * totales) / 100;  // descuento a pesos.

        let discount_total_calculado = Number(total_descuento_calculado_pesos).toFixed(2);

        total_neto_venta = Number(totales) - Number(discount_total_calculado);

        //show details
        $('#discount-neto').html(discount_total.toFixed(2) + " %.");
        $('#total-neto').html(Number(total_neto_venta).toFixed(2) + " Bs.");

        //setting on input

        $('#discount-neto_input').val(discount_total.toFixed(2));
        $('#total-neto_input').val(Number(total_neto_venta).toFixed(2));
    }

    function getDescuentoProducto()
    {
        let discount = $("#descuento").val();
        discount = (discount === "") ? 0 : Number(discount);
        return discount;
    }

    function agregar() {

        var product_id = $("#product option:selected").val();
        var producto = $("#product option:selected").text();
        var cantidad = $("#cantidad").val();
        var stock = $("#stock").val();
        var compra = $("#pcompra").val();
        var descuento = getDescuentoProducto(); // descuento por producto type Number!!
        var unidad = $("#unidad").val();
        var descuento_parcial = (((compra * cantidad) * descuento) / 100 )
        var venta = ((compra* cantidad) - descuento_parcial) ;
        if(producto != "" && cantidad != "" && compra != ""){
            if(existeProducto(product_id)){
                swal({
                    position: 'center',
                    type: 'warning',
                    title: 'El producto ya existe en el detalle',
                    text: "",
                    showConfirmButton: false,
                    timer: 2000
                })
                return;
            }
            resultado =  stock - cantidad;
            if(resultado < 0 ){
                sweetAlert("Error", "Stock insuficiente", "error");
            }else{
                subtotal[index] =  (cantidad*compra).toFixed(2);
                total[index] =  Number(venta).toFixed(2);

                totales = Number(totales) + Number(venta);
                console.log(totales);
                var fila=`<tr class = "selected" id="fila${index}">
                    <td><button type="button" class="btn btn-danger" onClick="eliminar(${index})">
                        <i class="fa fa-arrows-alt" aria-hidden="true"></i> Quitar
                    </button></td>
                    <td><input type="hidden" class="form-control producto" name="producto_id[]" value="${product_id}">${producto}</td>
                    <td>${unidad}</td>
                    <td><input type="number" class="form-control" readonly name="pcompra[]" value ="${compra}"></td>
                    <td><input type="number" class="form-control" readonly name="cantidad[]" value ="${cantidad}"></td>
                    <td>${subtotal[index]}</td>
                    <td><input type="number" class="form-control" readonly name="pdescuento[]" value="${descuento}"></td>
                    <td><input type="number" class="form-control" readonly name="ptotal[]" value="${total[index]}"></td>
                </tr>`;
                $("#detalle").append(fila);
                $('#totales').html(totales.toFixed(2) + " Bs."); //subtotal de la venta

                // set calculate input Sumatoria de los Subtotales
                $('#totales_input').val(Number(totales).toFixed(2));
                actualizarTotalNeto();
                index++;
                evaluar();
                limpiar();
            }
        }else{
           sweetAlert("Ups..", "Error al ingresar los detalles de la venta, Revise los datos del producto", "error");
        }
    }

    function evaluar(){
        if(Number(totales) > 0){
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
        $('#descuento').val("");
        $('#marca').val("");
    }

    function eliminar(index) {
        totales = Number(totales) - Number(total[index]);
        //$('#descuento_total').val("");
        actualizarTotalNeto();
        $("#fila" + index).remove();
        $('#totales').html(totales.toFixed(2) + " Bs.");
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

                console.log("datos", data);
                $('#pcompra').val(Number(data.product.price).toFixed(2));
                $('#pventa').val(data.product.price);
                $('#stock').val(data.current_stock);
                $('#unidad').val(data.product.measurements_unit.name);
                $('#marca').val(data.product.brand.name);
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

    function existeProducto(producto_id){
        var bandera=false;
        var array_producto = document.getElementsByClassName("producto");
        names = [].map.call( array_producto, function(data){
            if(data.value == producto_id){
                bandera = true;
            }
        })
        return bandera;
    }
</script>
@endpush
