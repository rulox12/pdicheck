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

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


        $view = view('implementation.pdf', compact('implementation','TC','PSE','TY','EF','EFP')); 
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
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
