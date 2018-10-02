<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\commerce;

class helpController extends Controller
{
    public function createcommerce(Request $request)
    {
       	$commerce = commerce::create($request);
    }

    public function indexsite()
    {
       	$commerce = commerce::All();

       	return view('site.index', compact('commerce'));
    }
}
