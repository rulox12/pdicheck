<?php

use Illuminate\Database\Seeder;
use App\payment_method;

class payment_methodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = new payment_method();
        $payment->name ="Tarjetas de credito";
        $payment->save();
        $payment = new payment_method();
        $payment->name = 'PSE';
        $payment->save();
        $payment = new payment_method();
        $payment->name = 'TUYA';
        $payment->save();
        $payment = new payment_method();
        $payment->name = 'Efectivo';
        $payment->save();
    }
}
