<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;


class RoleController extends Controller
{
	public function index()
    {
	$roles=Role::paginate();
	return view('abms.roles.index',compact('roles'));
	}
	
	public function edit(Role $role)
    {

        $permissions=Permission::get();
        
        return view('abms.roles.edit',compact('role','permissions'));
            
            
    }


     public function update(Request $request,Role $role)
    {	
    	//actualizar roles
    	$role->update($request->all());
    	//actualizar permisos
		$role->permissions()->sync($request->get('permissions'));
    


    
    	
    	return redirect()->route('roles.edit',$role->id)
    		->with('info','Role Actualizado con exito');
      
    }

	public function create()
    {	
    	$permissions=Permission::get();
    	return view('abms.roles.create',compact('permissions'));
      
    }

    public function store(Request $request)
    {
		$role=Role::create($request->all());
    	//actualizar permisos
		$role->permissions()->sync($request->get('permissions'));
    	
    	return redirect()->route('roles.index')
    		->with('info','Role Guardado con exito');
    }

}
