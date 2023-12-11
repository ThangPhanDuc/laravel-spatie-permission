<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();

        return view('roles.index', compact('users', 'roles'));
    }

    // public function updateRoles(Request $request, User $user)
    // {
    //     $this->authorize('change_roles', $user);

    //     $user->syncRoles($request->roles);

    //     return redirect()->route('roles.index')->with('success', 'User roles updated successfully.');
    // }

    public function updateRoles(Request $request, User $user)
    {
        $this->authorize('change_roles', $user);

        $user->syncRoles($request->roles);

        return redirect()->route('roles.index')->with('success', 'User roles updated successfully.');
    }


}
