<?php

namespace App\Http\Controllers\Admin;

use App\typeIntegration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class typeIntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
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
        $p=typeIntegration::create($request);
        dd($p);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\typeIntegration  $typeIntegration
     * @return \Illuminate\Http\Response
     */
    public function show(typeIntegration $typeIntegration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\typeIntegration  $typeIntegration
     * @return \Illuminate\Http\Response
     */
    public function edit(typeIntegration $typeIntegration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\typeIntegration  $typeIntegration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, typeIntegration $typeIntegration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\typeIntegration  $typeIntegration
     * @return \Illuminate\Http\Response
     */
    public function destroy(typeIntegration $typeIntegration)
    {
        //
    }
}
