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
            'id_type_integration'  =>$request->get('id_type_integration'),
            'leader'        =>$request->get('id_leader'),
            'engineer'      =>$request->get('id_enginer'),
            'start_date'    =>$request->get('start_date'),
            'end_date'      =>$request->get('start_date'),
            'progress'      => 0,
            'compensation'  =>$request->get('compensation_id')
        ]);
        $implementation->save();
        return $implementation;
    }
}
