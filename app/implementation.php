<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class implementation extends Model
{
    protected $fillable = [
        'id_site'      ,
        'id_type_integration'  ,
        'leader'        ,
        'engineer'      ,
        'start_date'        ,
        'end_date'      ,
        'progress'       ,
        'compensation'
    ];
    
    public static function create(string $id_site,Request $request)
    {
        $implementation = new implementation([
            'id_site'       =>$id_site,
            'id_type_integration'  =>$request->get('documentType'),
            'leader'        =>$request->get('firtsName'),
            'engineer'      =>$request->get('lastName'),
            'start_date'    =>$request->get('company'),
            'end_date'      =>$request->get('emailAddress'),
            'progress'      =>$request->get('address'),
            'compensation'  =>$request->get('city')
        ]);
        $implementation->save();
        return $implementation;
    }
}
