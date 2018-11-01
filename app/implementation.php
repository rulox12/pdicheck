<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Http\Request;

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
            'leader'        =>5,
            'engineer'      =>$request->get('id_enginer'),
            'start_date'    =>new DateTime(),
            'progress'      => 0,
            'compensation'  =>$request->get('compensation_id')
        ]);
        $implementation->save();
        return $implementation;
    }
}
