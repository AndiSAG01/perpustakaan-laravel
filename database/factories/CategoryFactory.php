<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'code' => $this->faker->unique()->ean8(),
            'name' => $this->faker->unique()->word(),
        ];
    }
}
