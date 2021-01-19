<?php

namespace Database\Seeders;


use random;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    //    $roles =  DB::select('SELECT id  FROM roles WHERE rol_name = ?', ["admin"]);

    //    dd($roles);

    //     DB::table('users')->insert([

    //         'cc' => rand(000000000,999999999),
    //         'firstName' => Str::random(7),
    // 'secondName' => Str::random(7),
    // 'fLastName' => Str::random(7),
    // "sLastName" => Str::random(7),
    // "area" =>  rand(1,5),
    // "email" => Str::random(10)."@gmail.com",
    // "password" => "123456789",
    // "role_id" => $roles[0]->id
    //     ]);

        

    DB::table('users')->insert([

        'cc' => 1143263155,
        'firstName' => "Kelvin",
        'secondName' => "Gil",
        'fLastName' => "Martinez",
        "sLastName" => "Ramos",
        "area" =>  1,
        "email" => "kmr19972015@gmail.com",
        "password" => Hash::make(123456789)
    ]);


    DB::table('items')->insert([
        'serial' => "AFZ-23456",
        'marca' => "ASUS",
        'nombre' => "ASUS PRO-PLAYER",
        'tipo' => "Portatil",
        'modelo' => "ASUS Z-GAMING",
        'procesador' => "Intel core i 7-9900K",
        'ram' => "12GB",
        'disco_duro' => "SSD 1TB",
        'sistema_operativo' => "Windows 10",
        'estado_equipo' => "Funcinal",
    ]);
    }
}
