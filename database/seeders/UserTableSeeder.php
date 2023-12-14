<?php

namespace Database\Seeders;

use App\Models\administrador;
use App\Models\funcionario;
use App\Models\residente;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Admin
        $user =User::create([
            'name'=> 'Administrador Sevillana del Parque',
            'document'=> '1012485',
            'phone'=> '300142785',
            'email'=> 'conjuntomio.adm@gmail.com',
            'password'=>Hash::make(123456789),
        ]);
        administrador::create([
            'horario_entrada' => '09:11:29',
            'horario_salida' => '18:13:29',
            'usuarios_id'=>$user->id,
        ]);
        $user->assignRole('admin');

        // Vigilante

        $user =User::create([
            'name'=> 'Camilo Espinosa - Vigilante ',
            'document'=> '1012342',
            'phone'=> '300141234',
            'email'=> 'vigia@correo.com',
            'password'=>Hash::make(123456789),
        ]);
        funcionario::create([

            'cargo' => 'Vigilante',
            'fecha_ingreso' => '2021-11-27 00:19:19.000000',
            'fecha_salida' => '2021-11-27 00:19:19.000000',
            'usuarios_id'=>$user->id,
            'observaciones' => 'ninguna',
        ]);
        $user->assignRole('Vigilante');

        // aseador

        $user =User::create([
            'name'=> 'Pedro Sanchez - Servicios Varios',
            'document'=> '1011111',
            'phone'=> '30012121',
            'email'=> 'asea@correo.com',
            'password'=>Hash::make(123456789),
        ]);
        funcionario::create([

            'cargo' => 'Aseador',
            'fecha_ingreso' => '2021-11-27 00:19:19.000000',
            'fecha_salida' => '2021-11-27 00:19:19.000000',
            'usuarios_id'=>$user->id,
            'observaciones' => 'ninguna',
        ]);
        $user->assignRole('Aseador');
    }

}
