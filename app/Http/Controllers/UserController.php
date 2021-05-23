<?php

namespace App\Http\Controllers;

use App\DataTables\UsersRolTable;
use App\Http\Requests\UpdateProfileFormRequest;
use App\Models\BranchOffice;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
            // The passwords matches
            flash()->error('Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.');
            return redirect()->back();
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            flash()->error('La nueva contraseña no puede ser la misma que su contraseña actual. Por favor, elija una contraseña diferente.');
            return redirect()->back();
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:3|confirmed',
        ]);
        //Change Password
        $this->user = auth()->user();
        $this->user->password = bcrypt($request->get('new-password'));
        $this->user->save();
        flash()->success('Contraseña cambiada con éxito!!');
        return redirect()->back();
    }

    public function profile()
    {
        $user = auth()->user();

        return view('users.profile.edit', compact('user'));
    }

    public function updateProfile(UpdateProfileFormRequest $request, User $user)
    {
        $user->fill($request->validated());

        $user->save();

        flash()->updated();

        return redirect()->back();
    }
}
