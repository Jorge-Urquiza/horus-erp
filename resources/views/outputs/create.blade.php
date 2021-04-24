@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="title">
            <h4>Crear Nota Salida</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('outputs.index') }}">Nota Salida</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Nota Salida</li>
            </ol>
        </nav>
    </div>
    <div class="col text-right">
        <a href="{{ route('outputs.index') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Volver
        </a>
    </div>
@endsection
@section('content')

{!! Form::open(['route'=> ['outputs.store'], 'method' => 'POST']) !!}
    @include('outputs.form.create')
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
        if($('#branch_office').length > 0) // PARA CUANDO EL USUARIO SEA VENDEDOR
        {
            listarProducto();
        }

    });

    var index= 0;
    var total = 0;
    var totalcantidad=0;
    var subtotal=[];
    var cantidad_array=[];
    var branch_id=null;

    function listarProducto(){
        branch_office_id = $("#branch_office option:selected").val();
        if(branch_id == null || branch_id == branch_office_id || subtotal.length == 0)
        { //EN CASO DE Q SEA LA PRIMERA VEZ,  SEAN IGUALES LOS ID, EN CASO DE QUE NO TENGA NADA EN LA TABLA
            branch_id = branch_office_id;
            completarSelect(branch_office_id);
        } else{
            
            swal({
                title: 'Estas seguro de Cambiar de Sucursal?',
                text: "No seras capaz de revertir esta accion!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Si, Estoy Seguro',
                
            }).then((value) => {
                if(value.dismiss){
                    $('#branch_office').val(branch_id);
                    $('#branch_office').change();
                } 
                else {
                    branch_id = branch_office_id;
                    completarSelect(branch_id);
                    eliminacionTabla();
                    inicializar();
                    swal(
                        'Cambiado!',
                        'El Sucursal ha sido cambiado',
                        'success'
                    )
                }
            });
            
        }
    }

    function completarSelect(branch_office_id){
        var url = "{{ route('api.branchproduct',':id') }}";
            url = url.replace(':id', branch_office_id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    cargarSelect(data);
                },
                error: function() {
                    alert("Seleccione un producto valido");
                }
            });
    }
    function cargarSelect(data){
        var select = document.getElementById("product");
        $(data).each(function(key,elem){
           select.options[key + 1 ] = new Option(elem.product.name, elem.product_id);
           //select.options[key + 1 ] = new Option(elem.product_id, elem.product_id);
        })
        limpiar();
    }

    function agregar() {
        product_id = $("#product option:selected").val()
        producto = $("#product option:selected").text()
        cantidad = $("#pcantidad").val();
        compra = $("#pcompra").val();
        stock = $("#pstock").val();

        if(producto != "" && cantidad != "" && compra != ""){
            resultado =  stock - cantidad;
            if(resultado < 0 ){
                swal({
                    position: 'center',
                    type: 'warning',
                    title: 'Error',
                    text: "Stock insuficiente",
                    showConfirmButton: false,
                    timer: 2000
                })
            }else{
                subtotal[index] =  (cantidad*compra);
                total= total + subtotal[index];
                cantidad_array[index] = (cantidad*1);
                totalcantidad = totalcantidad + (cantidad * 1);
                var fila=`<tr class = "selected" id="fila${index}">
                    <td><button type="button" class="btn btn-danger" onClick="eliminar(${index})">
                        <i class="fa fa-arrows-alt" aria-hidden="true"></i> Quitar
                    </button></td>
                    <td><input type="hidden" class="form-control" name="producto_id[]" value="${product_id}">${producto}</td>
                    <td><input type="number" class="form-control" readonly name="precio[]" value="${compra}"></td>
                    <td><input type="number" class="form-control" readonly name="cantidad[]" value ="${cantidad}"></td>
                    <td>${subtotal[index]}</td>
                </tr>`;
                $("#detalle").append(fila);
                $('#total').html(total+ " Bs.");
                $("#total_amount").val(total);
                $("#total_quantity").val(totalcantidad);
                index++;
                evaluar();
                limpiar();
            }
        }else{
            swal({
                position: 'center',
                type: 'warning',
                title: 'Error',
                text: "Revise que los datos del producto esten completos",
                showConfirmButton: false,
                timer: 2000
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

    function eliminacionTabla(){
        for(var i=0; i < index ; i++){
            eliminar(i);
        }
    }
    function inicializar(){
        index= 0;
        total = 0;
        totalcantidad=0;
        subtotal=[];
        cantidad_array=[];
    }

    function limpiar() {
        $('#product option').prop('selected', function() {
            return this.defaultSelected;
        });
        $('#pcompra').val("");
        $('#pcantidad').val("");
        $('#pstock').val("");
    }

    function eliminar(index) {
        total = total - subtotal[index];
        totalcantidad =  totalcantidad - cantidad_array[index];
        $("#fila" + index).remove();
        $('#total').html(total+ " Bs.");
        $("#total_quantity").val(totalcantidad);
        $("#total_amount").val(total);
        // para escodner los botones si se borro todo el detalle
        evaluar();
    }
    function completarProducto(id) {
        branch_office_id = $("#branch_office option:selected").val();
        var url = "{{ route('api.branchproduct.product',['idproduct'=> ':id', 'idbranch' => ':idbr']) }}";
        url = url.replace(':id', id);
        url = url.replace(':idbr', branch_office_id);
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                let price = parseFloat(data.product.price).toFixed(2);
                $('#pcompra').val(price);
                $('#pstock').val(data.current_stock);
            },
            error: function() {
                alert("Seleccione un producto valido");
            }
        });
    }


</script>
@endpush
