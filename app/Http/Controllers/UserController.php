<?php

namespace App\Http\Controllers;

use App\DataTables\UsersRolTable;
use App\Models\BranchOffice;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('users.index', compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();

        $branchOffices = BranchOffice::all()->pluck('name', 'id');

        return view('users.create', compact('roles', 'branchOffices'));
    }

    public function store(Request $request)
    {
        User::create(
            $request->only('name', 'email', 'last_name', 'ci', 'telephone', 'branch_office_id' ) +
            [
                'password'=> bcrypt($request->input('password')),
            ]

        )->assignRole($request->rol);

        flash()->stored();

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $roles = Role::all();

        $branchOffices = BranchOffice::all()->pluck('name', 'id');

        return view('users.show', compact('user', 'branchOffices', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        //dd($user->getRoleNames()->first());
        $branchOffices = BranchOffice::all()->pluck('name', 'id');

        return view('users.edit', compact('roles', 'branchOffices', 'user'));
    }


    public function update(Request $request, User $user)
    {
        $data=  $request->only('name', 'email', 'last_name', 'ci', 'telephone', 'branch_office_id');

        $password= $request->password;

        if($password) $data['password'] = bcrypt($password);

        $user->fill($data);

        $user->assignRole($request->rol);

        $user->save(); // para guardar los cambios despues de haber usado el "fill"

        flash()->updated();

        return redirect()->route('users.index');

    }


    public function destroy(User $user)
    {
        $user->delete();

        flash()->deleted();

        return redirect()->route('users.index');
    }

    public function indexUserRol(Role $rol)
    {
        Session::put('key', $rol);

        return view('users.index-rol', compact('rol'));
    }

    public function list()
    {
        return UsersRolTable::generate();
    }
}
