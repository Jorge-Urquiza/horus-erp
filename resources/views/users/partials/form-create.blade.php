<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('name', 'Nombre*', ['class' => 'weight-500' , 'required' => true]) }}
        {{ Form::text('name', null, ['class'=> ' form-control', 'required' => true]) }}
    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('last_name', 'Apellido*', ['class' => 'weight-500'])}}
        {{ Form::text('last_name', null, ['class'=> ' form-control', 'required' => true]) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('telephone', 'Telefono o Celular*', ['class' => 'weight-500'])}}
        {{ Form::text('telephone', null, ['class'=> ' form-control', 'required' => true]) }}
    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('ci', 'CI*') }}
        {{ Form::text('ci', null, ['class'=> ' form-control', 'id' => 'ci' , 'required' => true]) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('branch_office', 'Sucursales*') }}
        {!! Form::select('branch_office_id', $branchOffices, null, ['class' => 'form-control',
            'placeholder'=> 'Seleccionar sucursal', 'id' => 'branch_office_id', 'required' => true]) !!}
    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('rol', 'Roles*', ['class' => 'weight-500'])}}
        <select class="form-control" id="type" name="rol" id="rol" required placeholder="Seleccionar Rol">
            @foreach($roles as $rol)
                <option value="{{ $rol->name }}"
                        @if ( isset($user) && ($user->getRoleNames()->first() === $rol->name))
                            selected='selected'
                        @endif>
                    {{ $rol->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-6">
        {{ Form::label('email', 'Email*', ['class' => 'weight-500'])}}
        {{ Form::email('email', null, ['class'=> ' form-control', 'id' => 'email', 'required']) }}

    </div>
    <div class="col-12 col-lg-6">
        {{ Form::label('password', 'Contraseña*') }}
        {{ Form::password('password',['class'=> 'form-control',
            'placeholder' =>'Ingrese su contraseña' , 'id' => 'password', 'required']) }}
    </div>
   {{--
     <div class="col-12 col-lg-3">
        {{ Form::label('password', 'Confirmar contraseña*') }}
        {{ Form::password('password_confirmation',
        ['class' => 'form-control','placeholder'=>'Re escriba su contraseña', 'required' => true]) }}
    </div>
     --}}
</div>
<button type="submit" class="btn btn-outline-primary">
 <i class="fa fa-save" aria-hidden="true"></i> Registrar
</button>

