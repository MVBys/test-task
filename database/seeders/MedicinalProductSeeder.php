<?php

namespace Database\Seeders;

use App\Models\MedicinalProduct;
use Illuminate\Database\Seeder;

class MedicinalProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicinalProduct::factory()->count(50)->create();
    }
}
