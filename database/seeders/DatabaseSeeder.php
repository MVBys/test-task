<?php

namespace Database\Seeders;

use App\Models\ActiveSubstance;
use App\Models\Manufacturer;
use App\Models\MedicinalProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ActiveSubstance::factory()->count(10)->create();
        Manufacturer::factory()->count(10)->create();
        MedicinalProduct::factory()->count(50)->create();

    }
}
