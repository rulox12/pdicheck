<?php

use Illuminate\Database\Seeder;
use App\User;
use App\typeIntegration;

class typeintegrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeIntegration = new typeIntegration();
        $typeIntegration->name = 'Api';
        $typeIntegration->save();
        $typeIntegration = new typeIntegration();
        $typeIntegration->name = 'WebCheckout';
        $typeIntegration->save();
        $typeIntegration = new typeIntegration();
        $typeIntegration->name = 'IVR';
        $typeIntegration->save();
        $typeIntegration = new typeIntegration();
        $typeIntegration->name = 'Micrositio';
        $typeIntegration->save();
    }
}
