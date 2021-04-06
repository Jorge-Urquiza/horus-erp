@if ($admins->isNotEmpty())
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
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->apellidos }}</td>
                <td>{{ $admin->ci }}</td>
                <td>{{ $admin->celular }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <form onsubmit="return confirmSubmit('¿Está seguro de eliminar a {{ $admin->name }}?')"
                        action="{{route('users.destroy', $admin->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('users.edit', $admin->id)}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Eliminar</button>
                      </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>Sin registros.</p>
@endif
