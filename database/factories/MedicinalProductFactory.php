<?php

namespace Database\Factories;

use App\Models\ActiveSubstance;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicinalProduct>
 */
class MedicinalProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $created = $this->faker->dateTimeBetween('-3 years', 'now', null);
        $updated = $this->faker->dateTimeBetween('-3 years', 'now', null);
        return [
            'title' => $this->faker->word(),
            'substance_id' => ActiveSubstance::inRandomOrder()->first()->id,
            'manufacturer_id' => Manufacturer::inRandomOrder()->first()->id,
            'created_at' => $created,
            'updated_at' => $updated > $created ? $updated : $created,
        ];
    }
}
