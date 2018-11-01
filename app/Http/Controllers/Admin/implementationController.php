<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\site;
use App\commerce;
use App\item;
use App\implementation;
use App\detail_implementation;
use App\payment_method_implementation;

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
        return view('create.index', compact('commerce','arrayDetalle','typeintegrations'));  
    }

    /**
     * Store a newly created resource in storage.
     *|
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site  = site::create($request->commerce,$request);
        $implementation = implementation::create($site->id,$request);
        if($request->TC != null){
            $this->createDetails(1,$implementation->id);
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,1);
        }
        if($request->PSE !=  null){
            $this->createDetails(2,$implementation->id);
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,2);
        }
        if($request->TU !=  null){
            $this->createDetails(3,$implementation->id);
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,3);
        }
        if($request->EF !=  null){
            $this->createDetails(4,$implementation->id);
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,4);
        }
        if($request->EFP !=  null){
            $this->createDetails(5,$implementation->id);
            $paymentmethodimplementation = payment_method_implementation::create(
                $implementation->id,5);
        }
    }

    /**
     * crear el detalle de implementecion 
     */
    public function createDetails($id_payment,$id_implementation)
    {
        $items = DB::table('items')->where('id_payment_methods', $id_payment)->get();
        foreach($items as $item)
        {
            $detail_implementation  = detail_implementation::create($id_implementation,$item->id_item);
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