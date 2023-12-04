<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('can:manage roles');
    // }

    public function myRoles()
    {

        $user = Auth::user();
        $roles = $user->getRoleNames();

        return view('my-roles', compact('roles'));
    }
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('manage-roles', compact('users', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        
        $this->authorize('change roles', $user);

        $user->syncRoles($request->input('roles', []));

        return redirect()->route('manage.roles')->with('success', 'User roles updated successfully.');
    }
}
