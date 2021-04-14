@if ($encargados->isNotEmpty())
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>CI</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($encargados as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->ci }}</td>
                <td>{{ $user->telephone }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form onsubmit="return confirmSubmit('¿Está seguro de eliminar a {{ $user->name }}?')"
                        action="{{route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-asignar-{{ $user->id }}">
                            <i class="fa fa-plus"></i> Asignar a sucursal
                        </button>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Eliminar</button>
                      </form>
                </td>
            </tr>
            @include('users.modals.asignar-sucursal')
        @endforeach
    </tbody>
</table>
@else
    <p>Sin registros.</p>
@endif
