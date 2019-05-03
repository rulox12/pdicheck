<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    public static function create(string $id_site,Request $request)
    {
        $retur = new implementation([
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
