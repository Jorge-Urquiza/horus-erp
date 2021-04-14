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
        <h4 class="text-blue h4">Formulario de ventas</h4>
    </div>
</div>
    {!! Form::open(['route'=> ['branch-offices.store'], 'method' => 'POST']) !!}
        @include('sales.partials.form')
    {!! Form::close()!!}

@endsection
@push('scripts')
<script>
    //JQUERY
    $(document).ready(function(){
        $('#guardar').hide();
        //Eventos
        $('#producto_id').on('change', function() {
            completarPrecio($("#producto_id option:selected").val());
        });
        $( "#btn_add" ).click(function() {

            agregar();
        });

    });

    var index= 0;
    var total = 0;
    var subtotal=[];
      function agregar() {

          product_id = $("#producto_id option:selected").val()
          producto = $("#producto_id option:selected").text()
          cantidad = $("#pcantidad").val();
          compra = $("#pcompra").val();
          venta = $("#pventa").val();
          if(producto != "" && cantidad != "" && compra != "" && venta != ""){

            subtotal[index] =  (cantidad*venta);
            total= total + subtotal[index];
            var fila='<tr class = "selected" id="fila'+index+'"><td><button type="button" class="btn btn-danger" onClick="eliminar('+index+')">X</button></td><td><input type="hidden" name="productoid[]" value ="'+product_id+'">'+producto+'</td><td><input type="number" name="compra[]" readonly value="'+compra+'"></td><td><input type="number" readonly name="cantidad[]" value ="'+cantidad+'"></td><td><input type="number" readonly name="precio[]" value="'+venta+'"></td><td>'+subtotal[index]+'</td></tr>';
            $("#detalle").append(fila);
            $('#total').html(total+ " Bs.");
            index++;
            evaluar();
            limpiar();

          }else{
              alert("Error al ingresar los detalles de la venta, Revise los datos del producto")
          }
      }
      function evaluar(){
        if(total >0){
          $('#guardar').show();
        }else{
          $('#guardar').hide();
        }
     }
     function limpiar() {
        $('#producto_id option').prop('selected', function() {
            return this.defaultSelected;
        });
        $('#pcompra').val("");
        $('#pcantidad').val("");
        $('#pventa').val("");
    }
    function eliminar(index) {
        total = total - subtotal[index];
        $("#fila" + index).remove();
        $('#total').html(total+ " Bs.");
        // para escodner los botones si se borro todo el detalle
        evaluar();
    }
    function completarPrecio(id) {
        var url = "#";
        url = url.replace(':id', id)
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                $('#pcompra').val(data.precio);
            },
            error: function() {
                alert("Seleccione un producto valido");
            }
        });
    }
    </script>

@endpush
