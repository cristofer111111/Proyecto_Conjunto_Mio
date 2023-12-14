<?php

namespace Database\Seeders;

use App\Models\torre;
use Illuminate\Database\Seeder;

class TorreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $torre =torre::create([
            'torre'=> '1',
        ]);
        $torre =torre::create([
            'torre'=> '2',
        ]);
        $torre =torre::create([
            'torre'=> '3',
        ]);
        $torre =torre::create([
            'torre'=> '4',
        ]);

    }
}
