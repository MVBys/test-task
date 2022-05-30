<?php

namespace Database\Seeders;

use App\Models\ActiveSubstance;
use Illuminate\Database\Seeder;

class ActiveSubstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActiveSubstance::factory()->count(5)->create();
    }
}
