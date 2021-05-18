<div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Codigo Local</label>
                        {{ Form::text('local_code', null, ['class'=> ' form-control'. ( $errors->has('local_code') ? ' is-invalid' : '' ), 'required']) }}
                        {!! $errors->first('local_code','<span class="invalid-feedback d-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Nombre</label>
                        {{ Form::text('name', null, ['class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'required']) }}
                        {!! $errors->first('name','<span class="invalid-feedback d-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="custom-select2 form-control" name="category_id" style="width: 100%; height: 38px;" required>
                            @if(isset($product))
                                @foreach($categories as $c)
                                    @if($product->category_id == $c->id)
                                        <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                    @else
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        {!! $errors->first('category_id','<span class="invalid-feedback d-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Marca</label>
                        <select class="custom-select2 form-control" name="brand_id" style="width: 100%; height: 38px;" required>
                            @if(isset($product))
                                @foreach($brands as $b)
                                    @if($product->brand_id == $b->id)
                                        <option value="{{$b->id}}" selected>{{$b->name}}</option>
                                    @else
                                        <option value="{{$b->id}}">{{$b->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach($brands as $b)
                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        {!! $errors->first('brand_id','<span class="invalid-feedback d-block">:message</span>') !!}
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                        <!-- <input type="hidden" name="image"> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5">
            <div class="form-group" id="imagen_prev">
            @if(isset($product))
                @if(is_null($product->image))
                    <img src="{{ asset('templates/vendors/images/image.png') }}" alt="" width="500px" height="300px" id="img_prev">
                @else
                    <img src="{{ Storage::Url('upload/'.$product->image) }}" alt=""style="width: 500px; height: 450px" id="img_prev">
                @endif
            @else
                <img src="{{ asset('templates/vendors/images/image.png') }}" alt="" width="500px" height="300px" id="img_prev">
            @endif
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Proveedor</label>
                <select class="custom-select2 form-control"  name="supplier_id" style="width: 100%; height: 38px;" required>
                    @if(isset($product))
                        @foreach($suppliers as $b)
                            @if($product->supplier_id == $b->id)
                                <option value="{{$b->id}}" selected>{{$b->name}}</option>
                            @else
                                <option value="{{$b->id}}">{{$b->name}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($suppliers as $b)
                            <option value="{{$b->id}}">{{$b->name}}</option>
                        @endforeach
                    @endif
                </select>
                {!! $errors->first('supplier_id','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Costo</label>
                @if(isset($product))
                    {{ Form::number('cost', $product->cost, ['id' => 'cost','min' => '0','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('cost') ? ' is-invalid' : '' ), 'required', (isset($product)?'disabled': '')]) }}
                @else
                    {{ Form::number('cost', null, ['id' => 'cost','min' => '0','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('cost') ? ' is-invalid' : '' ), 'required', (isset($product)?'disabled': '')]) }}
                @endif
                {!! $errors->first('cost','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Ganancia(%)</label>
                {{ Form::number('gain', null, ['id' =>  'gain','min' => '0', 'max' => '100','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('gain') ? ' is-invalid' : '' ), 'required']) }}
                {!! $errors->first('gain','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Precio</label>
                <input type="text" id="price" disabled class="form-control{{$errors->has('price')? ' is-invalid' : ''}}" name="prices_dos" value="{{ isset($product)?$product->price:'' }}">
                <input type="hidden" id="price_dos" name="price" value="{{ isset($product)?$product->price:'' }}">
                {!! $errors->first('price','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Unidad de Medida</label>
                <select class="custom-select2 form-control{{$errors->has('measurements_units_id')? ' is-invalid' : ''}}" name="measurements_units_id" style="width: 100%; height: 38px;" required>
                    @if(isset($product))
                        @foreach($units as $u)
                            @if($product->measurements_units_id == $u->id)
                                <option value="{{$u->id}}" selected>{{$u->name}}</option>
                            @else
                                <option value="{{$u->id}}">{{$u->name}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($units as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    @endif
                </select>
                {!! $errors->first('measurements_units_id','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        @if(isset($product))
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Total Stock Actual</label>
                {{ Form::number('total_current_stock', $product->total_current_stock, ['min' => '0','disabled' => 'true' ,'class'=> ' form-control'. ( $errors->has('total_current_stock') ? ' is-invalid' : '' ), 'required']) }}
                {!! $errors->first('total_current_stock','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Total Stock Minimo</label>
                {{ Form::number('total_minimum_stock', $product->total_minimum_stock, ['min' => '0','disabled' => 'true' ,'class'=> ' form-control'. ( $errors->has('total_minimum_stock') ? ' is-invalid' : '' ), 'required']) }}
                {!! $errors->first('total_minimum_stock','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Total Stock Maximo</label>                
                {{ Form::number('total_maximum_stock', $product->total_maximum_stock, ['min' => '0','disabled' => 'true' ,'class'=> ' form-control'. ( $errors->has('total_maximum_stock') ? ' is-invalid' : '' ), 'required']) }}
                {!! $errors->first('total_maximum_stock','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        @endif
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Descripcion</label>
                <textarea class="form-control" name="description" row="2">@if(isset($product)){{$product->description}}@endif</textarea>
                {!! $errors->first('description','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
                <button class="btn btn-outline-primary btn-sm"
                    type="submit">Guardar</button>
            
        <div>
    </div>
@push('scripts')
<script src="{{ asset('templates/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
<script>

    var imagenes_b = false;

    $(function(){

        $("#imagen").change(function () {
            var images = $("#imagen").val();
            if(images != null){

                var files = $('#imagen')[0].files;
                $('#imagen_prev').empty();
                for (var i = 0, f; f = files[i]; i++) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var imagen = '<img src="'+e.target.result+'" alt="imagen" style="width: 500px; height: 400px;">'
                        $('#imagen_prev').append(imagen);
                    }
                    reader.readAsDataURL(f);
                }
                imagenes_b = true;
            }
        });

        var valor_ganancia = 0;
        const gain = document.getElementById('gain');
        gain.addEventListener('input', updateValueGain);

        const cost = document.getElementById('cost');
        cost.addEventListener('input', updateValueCost);

        function updateValueGain(e) {
            var ganancia = parseFloat(e.srcElement.value.length > 0? e.srcElement.value:0);

            if(parseFloat(ganancia)>=0 && parseFloat(ganancia)<=100)
            {
                var costo = ($('#cost').val().length >0 )?$('#cost').val():0;
                var numerador = ganancia * costo;
                var calculo = parseFloat((numerador /100) + parseFloat(costo)).toFixed(2);
                $("#price").val(calculo);
                $("#price_dos").val(calculo);
                valor_ganancia = ganancia;
            } else {
                $('#gain').val(valor_ganancia);
            }
        }
        gain.addEventListener('keypress', e => {
            if(String.fromCharCode(e.which || e.keyCode) == '-'){
                    e.preventDefault();
                    return;
            }
            if(parseFloat(e.srcElement.value)<0){
                e.preventDefault();
                return;
            }
            if(parseFloat(e.srcElement.value)>100){
                e.preventDefault();
                return;
            }
        });
        function updateValueCost(e) {
           
            var ganancia = ($('#gain').val().length >0 )?$('#gain').val():0;
            var costo = parseFloat(e.srcElement.value.length > 0? e.srcElement.value:0);
            var numerador = costo * ganancia;
            var calculo = parseFloat( (numerador /100) + costo ).toFixed(2);
            $("#price").val(calculo);
            $("#price_dos").val(calculo);
            
        }

    });
</script>
@endpush
