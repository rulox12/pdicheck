<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_method_implementation extends Model
{
    protected $fillable = [
        'id_implementation'     ,
        'id_payment_methods'  
    ];
    
    public static function create(string $id_implementation,string $idpayment)
    {
        $site = new sites([
            'id_implementation'   =>$id_implementation,
            'id_payment_methods'  		=>$idpayment
        ]);
        $site->save();
        return $site;
    }
}
