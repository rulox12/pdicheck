<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\commerce;

class helpController extends Controller
{
    public function createcommerce(Request $request)
    {
       	commerce::create($request);
       	$commerce = commerce::All();       	
       	return view('site.index', compact('commerce'));
    }

    public function indexsite()
    {
       	$commerce = commerce::All();

       	return view('site.index', compact('commerce'));
    }
}
