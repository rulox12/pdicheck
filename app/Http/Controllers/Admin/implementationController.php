<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\site;
use App\commerce;

class implementationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commerce = commerce::All();
        return view('implementation.index', compact('commerce'));     
    }

    public function indexv()
    {
        $commerce = commerce::All();
        return view('implementation.index', compact('commerce'));    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * route-> implementation
     */
    public function create(Request $request)
    {
        $commerce = commerce::All();
        $rol = DB::table('roles')->where('name', 'enginer')->first();
        $idusers = DB::table('role_user')->where('role_id', $rol->id)->get();
        $arrayDetalle = Array();
        foreach($idusers as $iduser){
            $user = DB::table('users')->find($iduser->user_id);
            $arrayDetalle[] = $user;
        }
        $typeintegrations = DB::table('type_integrations')->get();

        return view('implementation.index', compact('commerce','arrayDetalle','typeintegrations'));  
    }

    /**
     * Store a newly created resource in storage.
     *|
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site  = site::create($request->id_commerce,$request);
        $implementation = implementation::create($site->id,$request);
        if($request->TC){
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,1);
        }
        if($request->PSE){
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,2);
        }
        if($request->TUYA){
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,3);
        }
        if($request->Efectivo){
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,4);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}