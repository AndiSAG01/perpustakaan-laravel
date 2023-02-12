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
        $startDate = now();
        $endDate = now();
        $faker = $this->faker;
        return [
            'name' => $faker->name(),
            'from' => $faker->country(),
            'description' => $faker->word(),
            'date' => $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
            'updated_at' => $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
            'created_at' => $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
        ];
    }
}
