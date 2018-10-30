<?php

use Illuminate\Database\Seeder;
use App\User;
use App\commerce;

class commerceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commerce = new commerce();
        $commerce->nit = '123456789';
        $commerce->name = 'Egm Sin fronteras';
        $commerce->save();
        $commerce = new commerce();
        $commerce->nit = '321654987';
        $commerce->name = 'Tienda Lucho ico';
        $commerce->save();
        $commerce = new commerce();
        $commerce->nit = '456789123';
        $commerce->name = 'Corpscati KMT';
        $commerce->save();
    }
}
