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
        $payment_method_implementation = new payment_method_implementation([
            'id_implementation'   =>$id_implementation,
            'id_payment_methods'  		=>$idpayment
        ]);
        $payment_method_implementation->save();
        return $payment_method_implementation;
    }
}
