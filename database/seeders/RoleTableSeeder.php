<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=> 'residente',
            'guard_name'=> 'web',
        ]);
        Role::create([
            'name'=> 'admin',
            'guard_name'=> 'web',
        ]);
        Role::create([
            'name'=> 'Vigilante',
            'guard_name'=> 'web',
        ]);
        Role::create([
            'name'=> 'Aseador',
            'guard_name'=> 'web',
        ]);
    }
}
