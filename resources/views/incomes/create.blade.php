@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Registrar Nota de Ingreso</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('incomes.index') }}">Nota de Ingreso</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('incomes.index') }}" class="btn btn-outline-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
</div>
@endsection
@section('content')

{!! Form::open(['route'=> ['incomes.store'], 'method' => 'POST']) !!}
    @include('incomes.form.create')
{!! Form::close()!!}

@endsection
@push('scripts')
<script src="{{ asset('templates/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script>
    //JQUERY
    $(document).ready(function(){

        $('#guardar').hide();
        //Eventos
        $('#product').on('change', function() {
            completarProducto($("#product option:selected").val());
        });
        $( "#btn_add" ).click(function() {
            agregar();
        });

        document.getElementById('pcompra').addEventListener('keypress', e => {
            if(String.fromCharCode(e.which || e.keyCode) == '-'){
                    e.preventDefault();
                    return;
            }
            if(parseFloat(e.srcElement.value)<0){
                e.preventDefault();
                return;
            }
        });

        document.getElementById('pcantidad').addEventListener('keypress', e => {
            if(String.fromCharCode(e.which || e.keyCode) == '-'){
                    e.preventDefault();
                    return;
            }
            if(parseFloat(e.srcElement.value)<0){
                e.preventDefault();
                return;
            }
        });

    });
    var index= 0;
    var total = 0;
    var totalcantidad=0;
    var subtotal=[];
    var cantidad_array=[];

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

    function agregar() {
        product_id = $("#product option:selected").val()
        producto = $("#product option:selected").text()
        cantidad = $("#pcantidad").val();
        compra = $("#pcompra").val();

        if(producto != "" && cantidad != "" && compra != ""){
            //resultado =  stock - cantidad;
            /*if(resultado < 0 ){
                alert("Error al ingresar los detalles de la venta, Stock insuficiente");
            }else{*/
                if(existeProducto(product_id)){
                    swal({
                        position: 'center',
                        type: 'warning',
                        title: 'El producto ya existe en el detalle',
                        text: "",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    return;
                }

                if(parseFloat(compra) >0)
                {
                    subtotal[index] =  (cantidad*compra).toFixed(2);
                    total= total + parseFloat(subtotal[index]);
                    cantidad_array[index] = (cantidad*1);
                    totalcantidad = totalcantidad + (cantidad * 1);
                    var fila=`<tr class = "selected" id="fila${index}">
                        <td><button type="button" class="btn btn-danger" onClick="eliminar(${index})">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i> Quitar
                        </button></td>
                        <td><input type="hidden" class="form-control producto" name="producto_id[]" value="${product_id}">${producto}</td>
                        <td><input type="number" class="form-control" readonly name="costo[]" value="${compra}"></td>
                        <td><input type="number" class="form-control" readonly name="cantidad[]" value ="${cantidad}"></td>
                        <td>${subtotal[index]}</td>
                    </tr>`;
                    $("#detalle").append(fila);
                    $('#total').html((total).toFixed(2) + " Bs.");
                    $("#total_amount").val(total);
                    $("#total_quantity").val(totalcantidad);
                    index++;
                    evaluar();
                    limpiar();
                } else {
                    swal({
                        position: 'center',
                        type: 'warning',
                        title: 'Error al agregar el producto',
                        text: "El costo debe ser mayor a cero",
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
           // }
        }else{
            swal({
                    position: 'center',
                    type: 'warning',
                    title: 'Error al agregar el producto',
                    text: "Revise los datos del producto",
                    showConfirmButton: false,
                    timer: 1500
                })

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
        /*$('#product option').prop('selected', function() {
            return this.defaultSelected;
        });*/
        //$("#product option[value="+ null +"]").attr("selected",true);
        $('#pcompra').val("");
        $('#pcantidad').val("");
    }

    function eliminar(index) {
        total = total - (subtotal[index]);
        totalcantidad =  totalcantidad - cantidad_array[index];
        $("#fila" + index).remove();
        $('#total').html((total).toFixed(2) + " Bs.");
        $("#total_quantity").val(totalcantidad);
        $("#total_amount").val(total);
        // para escodner los botones si se borro todo el detalle
        evaluar();
    }
    function completarProducto(id) {

        var url = "{{ route('api.branchproductbyproduct',':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                let cost = parseFloat(data.cost).toFixed(2);

                console.log(data);
                $('#pcompra').val(cost);
            },
            error: function() {
                //alert("Seleccione un producto valido");
                swal({
                        position: 'center',
                        type: 'warning',
                        title: 'Seleccione un producto valido',
                        text: "",
                        showConfirmButton: false,
                        timer: 1500
                    })
                $('#pcompra').val('');
            }
        });
    }


</script>
@endpush
