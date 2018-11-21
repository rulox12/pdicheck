<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::success('Excelente', 'Se registro correctamente');
            return $this->getusers();
        }else{
            Alert::info('Informacion', 'Ya existe un usuario creado con este correo');
            return $this->index();
        }
        
    }
    public function getusers()
    {
        //dd($request);
        $users = DB::table('users')
        ->join('role_user as role_user', 'role_user.user_id', '=', 'users.id')
        ->join('roles as rol', 'rol.id', '=', 'role_user.role_id')
        ->select('users.*','rol.name AS role')
        ->get();
        //dd($users);
        return view('auth.table',compact('users'));
        
    }


}
