<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->locale('id_ID');
        $faker = $this->faker;
        return [
            'name' => $faker->name(),
            'from' => $faker->country(),
            'description' => $faker->word(),
            'date' => now()->subMonth(1),
            'updated_at' => now()->subMonth(1),
            'created_at' => now()->subMonth(1),
        ];
    }
}
