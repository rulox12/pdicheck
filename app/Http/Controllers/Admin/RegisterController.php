<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rols = Role::All();
        
        return view('auth/register',compact('rols'));
    }
    
    protected function create()
    {
        $rols = Role::All();
        
        //dd($paymentMethod);
        return view('auth.register', compact('rols'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $role_user = Role::where('name', $request->get('idRol'))->first();
        $userexist = User::where('email', $request->get('email'))->first();
        //dd($role_user);
        if(!$userexist){
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt('secret');
            $user->save();
            $user->roles()->attach($role_user);
            return $this->index();
        }else{
            return $this->index();
        }
        
    }
}
