<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => function () {
                return Category::all()->random();
            },
            'barcode' => $this->faker->ean13(),
            'image' => $this->faker->imageUrl(640, 480, 'books', true),
            'isbn' => $this->faker->isbn10(),
            'title' => $this->faker->sentence(4) ,
            'author' => $this->faker->name(),
            'publisher'=> $this->faker->company(),
            'publicationYear' => $this->faker->year(),
            'stock' => rand(1, 50),
        ];
    }
}
