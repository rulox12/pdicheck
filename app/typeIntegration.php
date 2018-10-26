<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class typeIntegration extends Model
{
    protected $primaryKey = 'id_type_integration';

    protected $fillable = [
        'name'  
        
    ];

    public static function create(Request $request)
    {
        $typeIntegration = new typeIntegration([
            'name'  	=>$request->get('name')
        ]);
        $typeIntegration->save();
        return $typeIntegration;
    }
    //
}
