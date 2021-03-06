<div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Codigo Local</label>
                        {{ Form::text('local_code', $product->local_code, ['disabled' => 'true', 'class'=> ' form-control'. ( $errors->has('local_code') ? ' is-invalid' : '' )]) }}
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Nombre</label>
                        {{ Form::text('name', $product->name, ['disabled' => 'true', 'class'=> ' form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) }}
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Categoria</label>
                        <input class="form-control" disabled value="{{$product->category->name}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Marca</label>
                        <input class="form-control" disabled value="{{$product->brand->name}}">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="image">Imagen</label>
                @if(is_null($product->image))
                <img src="{{ asset('templates/vendors/images/image.png') }}" alt="" width="500px" height="300px" id="img_prev">
                @else
                <img src="{{ Storage::Url('upload/'.$product->image) }}" alt="" style="width: 500px; height: 400px; ">
                @endif
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Proveedor</label>
                <input class="form-control" disabled value="{{$product->supplier->name}}">
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Costo</label>
                {{ Form::number('price', $product->cost, ['disabled' => 'true', 'min' => '0','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('costo') ? ' is-invalid' : '' )]) }}
                
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Ganancia (%)</label>
                {{ Form::number('price', $product->gain, ['disabled' => 'true', 'min' => '0','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('costo') ? ' is-invalid' : '' )]) }}
            </div>
        </div>
        <div class="col-md-2 col-sm-2">
            <div class="form-group">
                <label>Precio</label>
                {{ Form::number('price', $product->price, ['disabled' => 'true', 'min' => '0','step' => 'any' ,'class'=> ' form-control'. ( $errors->has('price') ? ' is-invalid' : '' )]) }}
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Unidad de Medida</label>
                <input class="form-control" disabled value="{{$product->measurementsUnit->name}}">
            </div>
        </div>
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
    </div>
    <div class="row">
		<div class="col-md-12  col-sm-12">
            <div class="form-group">
                <label>Descripcion</label>
                <textarea class="form-control" disabled name="description" row="2">{{$product->description}}</textarea>
                
            </div>
        </div>
    </div>
    