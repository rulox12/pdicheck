<?php

use Illuminate\Database\Seeder;

class itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tarjetas de credito
        $payment = new payment_method();
        $payment->id_payment_methods =1;
        $payment->description ="Solicitud Cartas de Terminales";
        $payment->save();
        $payment = new payment_method();
        $payment->id_payment_methods =1;
        $payment->description ="Solicitud Terminales";
        $payment->save();
        $payment = new payment_method();
        $payment->id_payment_methods =1;
        $payment->description ="cargue de Terminales";
        $payment->save();
        
    }
}
