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
    
    public static function create(string $id,Request $request)
    {
        $site = new sites([
            'id_commerce'   =>$id,
            'name'  		=>$request->get('name_site')
        ]);
        $site->save();
        return $site;
    }
}

