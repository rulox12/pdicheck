<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class commerce extends Model
{
    protected $fillable = [
        'nit'     ,
        'name'  
        
    ];
    
    public static function create(Request $request)
    {
        $commerce = new commerce([
            'nit'   	=>$request->get('nit'),
            'name'  	=>$request->get('name')
        ]);
        $commerce->save();
        return $commerce;
    }
}
