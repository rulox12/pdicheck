<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class detail_implementation extends Model
{
    protected $fillable = [
        'id_implementation'     ,
        'id_item'  ,
        'status'     ,
        'observation'  
        
    ];
    
    public static function create(string $id_implementation,string $id_item)
    {
        $detail_implementation = new detail_implementation([
            'id_implementation'   =>$id_implementation,
            'id_item'  		=>$id_item,
            'status'        =>0,
            'observation'  	=>""

        ]);
        $detail_implementation->save();
        return $detail_implementation;
    }
}
