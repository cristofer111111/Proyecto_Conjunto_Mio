<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\servicios;

class serviciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicios =servicios::create([
            'nombre'=> 'Salon social pequeño',
            'precio'=>120000
        ]);
        $servicios =servicios::create([
            'nombre'=> 'Salon social grande',
            'precio'=>150000
        ]);
        $servicios =servicios::create([
            'nombre'=> 'BBQ',
            'precio'=>90000
        ]);
        $servicios =servicios::create([
            'nombre'=> 'Parqueadero x 1 mes',
            'precio'=>80000
        ]);
        $servicios =servicios::create([
            'nombre'=> 'Parqueadero x 2 meses',
            'precio'=>160000
        ]);
        $servicios =servicios::create([
            'nombre'=> 'Parqueadero x 3 meses',
            'precio'=>200000
        ]);

    }
}
