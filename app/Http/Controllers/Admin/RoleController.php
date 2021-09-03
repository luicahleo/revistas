<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // creo constructor para 
    public function __construct()
    {
        $this->middleware('can:Listar role')->only('index');
        $this->middleware('can:Crear role')->only('create','store');
        $this->middleware('can:Editar role')->only('edit','update');
        $this->middleware('can:Eliminar role')->only('destroy');

    }



    public function index()
    {

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    
    public function create()
    {

        //recuperamos los registros de los permisos
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'permissions'=>'required'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        $role->permissions()->attach($request->permissions);



        return redirect()->route('admin.roles.index')->with('info', 'El rol se creo satisfactoriamente!!!');
    }

   
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role','permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',
            'permissions'=>'required'
        ]);    

        //actualizamos el campo nombre 

        //el metodo sync() elimina todos los permisos de determinado rol, y nuevamente los asigna con los parametros que le pasamos
        $role->permissions()->sync($request->permissions);
        
        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.roles.edit', $role);
    }

   
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info', 'El rol se ha eliminado con exito!!!');
    }
}
