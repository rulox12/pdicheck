<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\commerce;
use RealRashid\SweetAlert\Facades\Alert;


class commerceController extends Controller
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
        $commerce = commerce::All();
        return view('commerce.table', compact('commerce'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commerce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('nit')==null || $request->get('name')==null){
            Alert::error('Error', 'Faltan campos');
        }else{
            Alert::success('Excelente', 'Se registro correctamente');
            commerce::create($request);
        }
        $commerce = commerce::All();
        //toast('Your Post as been submited!','success','top-right');
        //dd("commerce");
        //alert()->html('<i>HTML</i> <u><h3>Excelente</h3></u>'," You can use <b>bold text</b>, <a href='//github.com'>links</a> Comercio creado correctamente ",'success');

        return view('commerce.table', compact('commerce'));
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