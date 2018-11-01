<?php

use Illuminate\Database\Seeder;
use App\item;

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
        $item = new item();
        $item->id_payment_methods =1;
        $item->description ="Solicitud Cartas de Terminales";
        $item->save();
        $item = new item();
        $item->id_payment_methods =1;
        $item->description ="Solicitud Terminales";
        $item->save();
        $item = new item();
        $item->id_payment_methods =1;
        $item->description ="cargue de Terminales";
        $item->save();
        $item = new item();
        $item->id_payment_methods =1;
        $item->description ="Pruebas Terminal";
        $item->save();
        //PSE
        $item = new item();
        $item->id_payment_methods =2;
        $item->description ="Afiliacion del comercio ante ACH";
        $item->save();
        $item = new item();
        $item->id_payment_methods =2;
        $item->description ="Configurar datos reales de PSE en la consola";
        $item->save();
        //TUYA
        $item = new item();
        $item->id_payment_methods =3;
        $item->description ="Afiliacion a TUYA";
        $item->save();
        $item = new item();
        $item->id_payment_methods =3;
        $item->description ="Configurar codigo unico en consola";
        $item->save();
        //Efectivo 
        $item = new item();
        $item->id_payment_methods =4;
        $item->description ="Adicion medio de pago en efectivo";
        $item->save();
        //Efectivo Propio 
        $item = new item();
        $item->id_payment_methods =5;
        $item->description ="Enviar documentacion al banco";
        $item->save();
        $item = new item();
        $item->id_payment_methods =5;
        $item->description ="Configurar datos en la consola convenio propio";
        $item->save();
    }
}
