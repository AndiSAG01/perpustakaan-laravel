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
        $startDate = now()->subYear(1);
        $endDate = now();
        $faker = $this->faker;
        return [
            'name' => $faker->name(),
            'from' => $faker->country(),
            'description' => $faker->word(),
            'date' => $faker->date(),
            'updated_at' => $faker->date(),
            'created_at' => $faker->date(),
        ];
    }
}
