<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 9),
            'barcode' => Str::random(10),
            'image' => $this->faker->imageUrl(),
            'isbn' => $this->faker->ean13(),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'publisher'=> $this->faker->company(),
            'publicationYear' => $this->faker->year(),
            'stock' => rand(1, 100),
        ];
    }
}
