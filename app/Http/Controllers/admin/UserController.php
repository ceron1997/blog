<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        // $users=User::all();
        return view('admin.users.index');
    }

  
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles); 
        return redirect()->route('admin.users.edit', $user)->with('info', 'Asignado Correctamente');
    }

}
