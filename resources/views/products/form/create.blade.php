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
        <div class="col-md-6 col-sm-6">
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
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <label>Unidad de Medida</label>
                <select class="custom-select2 form-control{{$errors->has('measurements_units_id')? ' is-invalid' : ''}}" name="measurements_units_id" style="width: 100%; height: 38px;" required>
                    @if(isset($product))
                        @foreach($units as $u)
                            @if($product->measurements_units_id == $u->id)
                                <option value="{{$u->id}}" selected>{{$u->abbreviation}}</option>
                            @else
                                <option value="{{$u->id}}">{{$u->abbreviation}}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach($units as $u)
                            <option value="{{$u->id}}">{{$u->abbreviation}}</option>
                        @endforeach
                    @endif
                </select>
                {!! $errors->first('measurements_units_id','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <label>Precio</label>
                {{ Form::number('price', null, ['min' => '0','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('price') ? ' is-invalid' : '' ), 'required']) }}
                {!! $errors->first('price','<span class="invalid-feedback d-block">:message</span>') !!}
            </div>
        </div>
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
            <div class="col text-right">
                <button class="btn btn-primary btn-sm"
                    type="submit"><span class="icon-copy ti-save"></span>   Guardar</button>
            <div>
        <div>
    </div>
@push('scripts')
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
    });
</script>
@endpush
