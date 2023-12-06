<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();

        return view("manage-permissions", compact("users","permissions"));
    }

    public function update(Request $request,User $user ){
        $this->authorize("change permissions", $user);

        $user->syncPermissions($request->input('permissions',[]));

        $permissions = implode(', ', $request->input('permissions', []));
        return redirect()->route('manage.permissions')->with('success', "The user {$user->name} updated permissions: {$permissions} successfully.");
    }
}
