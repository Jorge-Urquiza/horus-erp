<?php

namespace App\Http\Controllers;

use App\DataTables\RolesTable;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();

        return view('roles.create', compact('permisos'));
    }

    public function store(Request $request)
    {
       $rol = Role::create($request->post());

       $rol->permissions()->sync($request->permissions);

       flash()->stored();

       return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        $permisos = $role->permissions;

        $usuarios = User::role($role->name)->get();

        return view('roles.show', compact('role', 'permisos', 'usuarios'));
    }

    public function edit(Role $role)
    {
        $permisos = $role->permissions;

        $permisos = Permission::all();

        return view('roles.edit', compact('role', 'permisos', ));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->post());

        $role->permissions()->sync($request->permissions);

        flash()->updated();

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        flash()->deleted();

        return back();
    }

    public function list()
    {
        return RolesTable::generate();
    }
}
