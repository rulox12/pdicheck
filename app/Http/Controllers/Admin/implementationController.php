<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use App\site;
use App\commerce;
use App\item;
use App\implementation;
use App\detail_implementation;
use App\payment_method_implementation;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;

class implementationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $implementation = DB::table('implementations')
            ->join('sites', 'implementations.id_site', '=', 'sites.id_site')
            ->join('users as leader', 'leader.id','=','implementations.leader')
            ->join('users as engineer', 'engineer.id','=','implementations.engineer')
            ->select('implementations.*', 'sites.name AS name_site','leader.name AS name_leader','engineer.name AS name_engineer')
            ->get();
        return view('implementation.index', compact('implementation'));     
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
        return view('implementation.create', compact('commerce','arrayDetalle','typeintegrations'));  
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
        Alert::success('Excelente', 'Se creo la implementacion correctamente');
        return $this->index();
        
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
    public function show($id_implementation)
    {   
        $implementation = DB::table('implementations')
        ->join('sites', 'implementations.id_site', '=', 'sites.id_site')
        ->join('commerces', 'commerces.id_commerce', '=','sites.id_commerce')
        ->join('users as leader', 'leader.id','=','implementations.leader')
        ->join('users as engineer', 'engineer.id','=','implementations.engineer')
        ->join('type_integrations', 'type_integrations.id_type_integration','=','implementations.id_type_integration')
        ->where('implementations.id_implementation', $id_implementation)
        ->select('implementations.*', 'sites.name AS name_site','leader.name AS name_leader','engineer.name AS name_engineer','commerces.name AS name_commerce','type_integrations.name AS name_typeintegration')
        ->get();
        $TC = DB::table('detail_implementations')
        ->join('items as item', 'item.id_item', '=', 'detail_implementations.id_item')
        ->where('detail_implementations.id_implementation', $id_implementation)
        ->where('item.id_payment_methods',1)
        ->select('detail_implementations.*','item.description')
        ->get();
        $PSE = DB::table('detail_implementations')
        ->join('items as item', 'item.id_item', '=', 'detail_implementations.id_item')
        ->where('detail_implementations.id_implementation', $id_implementation)
        ->where('item.id_payment_methods',2)
        ->select('detail_implementations.*','item.description')
        ->get();
        $TY = DB::table('detail_implementations')
        ->join('items as item', 'item.id_item', '=', 'detail_implementations.id_item')
        ->where('detail_implementations.id_implementation', $id_implementation)
        ->where('item.id_payment_methods',3)
        ->select('detail_implementations.*','item.description')
        ->get();
        $EF = DB::table('detail_implementations')
        ->join('items as item', 'item.id_item', '=', 'detail_implementations.id_item')
        ->where('detail_implementations.id_implementation', $id_implementation)
        ->where('item.id_payment_methods',4)
        ->select('detail_implementations.*','item.description')
        ->get();
        $EFP = DB::table('detail_implementations')
        ->join('items as item', 'item.id_item', '=', 'detail_implementations.id_item')
        ->where('detail_implementations.id_implementation', $id_implementation)
        ->where('item.id_payment_methods',5)
        ->select('detail_implementations.*','item.description')
        ->get();
        return view('implementation.update', compact('implementation','TC','PSE','TY','EF','EFP'));    
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

            if($request->TC){
                $this->changeState($request->TC,$request->TCD);
            }
            if($request->PSE){
                $this->changeState($request->PSE,$request->PSED);
            }
            if($request->TY){
                $this->changeState($request->TY,$request->TYD);
            }
            if($request->EF){
                $this->changeState($request->EF,$request->EFD);
            }
            if($request->EFP){
                $this->changeState($request->EFP,$request->EFPD);
            }
            $dimplementations = DB::table('detail_implementations')->where('id_implementation',$id)
            ->get();
            $dimplementationscheck = DB::table('detail_implementations')->where('id_implementation',$id)
            ->where('status','1')
            ->get();
            $countitemsI=count($dimplementations);
            $countitemsICheck=count($dimplementationscheck);    
            if($countitemsI==$countitemsICheck){
                $detail_implementation = implementation::where('id_implementation',$id)
                    ->update(["progress" =>$countitemsICheck*100/$countitemsI,"end_date" => new DateTime()]);
            }else{
                $detail_implementation = implementation::where('id_implementation',$id)
                ->update(["progress" =>$countitemsICheck*100/$countitemsI ]);
            }
            return $this->index();
    }

    public function changeState($arrayitem,$arraydescription)
    {
        if($arrayitem && $arraydescription){
            foreach($arrayitem as $item){
                $detail_implementation = detail_implementation::where('id_detail_implementations',$item)
                ->update(["status" => "1","observation"=>$arraydescription[$item]]);
            }
        }
        return ;

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