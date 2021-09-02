<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        return view('admin.users.index');
    }
  
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit' , compact('user', 'roles'));

    }
    
    public function update(Request $request, User $user)
    {
        // con esto vemos lo que nos esta mandando el formulario de users.edit
        //return $request->all();

        //accedemos al registro de user, despues que recupere relacion roles
        //despues sincroniza con los datos que le envio por el formulario, con roles
        $user->roles()->sync($request->roles);

        //ahora redirigimos, y le pasamos el registro user
        return redirect()->route('admin.users.edit', $user);
    }
    
}
