<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class site extends Model
{
    protected $fillable = [
        'id_commerce'     ,
        'name'  
        
    ];
    
    public static function create(Request $request)
    {
        $commerce = new commerce([
            'id_commerce'   =>$request->get('id_commerce'),
            'name'  		=>$request->get('name')
        ]);
        $commerce->save();
        return $commerce;
    }
}

