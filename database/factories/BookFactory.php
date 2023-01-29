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
            'category_id' => rand(1, 5),
            'barcode' => Str::random(10),
            'image' => $this->faker->imageUrl(640, 480, 'cats'),
            'isbn' => $this->faker->ean13(),
            'title' => "Buku " . $this->faker->words(3, true) ,
            'author' => $this->faker->name(),
            'publisher'=> $this->faker->company(),
            'publicationYear' => $this->faker->year(),
            'stock' => rand(1, 100),
        ];
    }
}
