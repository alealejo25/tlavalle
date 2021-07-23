<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller
{    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
    {
	$users=User::paginate();
	return view('abms.usuarios.index',compact('users'));
	}
	
	public function edit($user)
    {
        $user=User::find($user);

        $roles=Role::get();
        
        return view('abms.usuarios.edit',compact('user','roles'));
            
            
    }


     public function update(Request $request,$user)
    {	
    	$usuario=new User();
    	$usuario->id=$user;

    	$usuario->roles()->sync($request->get('roles'));
    	return Redirect('abms/usuarios')->with('Mensaje','Actualizado');
      
    }
}
  
