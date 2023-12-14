<?php

namespace Database\Seeders;

use App\Models\apto;
use Illuminate\Database\Seeder;

class AptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apto =apto::create([
            'apartamento'=> '101',
            'torre_id'=> '1',
        ]);
        $apto =apto::create([
            'apartamento'=> '201',
            'torre_id'=> '2',
        ]);
        $apto =apto::create([
            'apartamento'=> '301',
            'torre_id'=> '3',
        ]);
        $apto =apto::create([
            'apartamento'=> '401',
            'torre_id'=> '4',
        ]);
    }
}
