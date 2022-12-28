<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'noId' => Str::random(10),
            'fullname' => $this->faker->firstName(),
            'dateOfBirth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'address' => $this->faker->address(),
            'telp' => $this->faker->randomNumber(9),
            'membership' => $this->faker->randomElement(['Murid', 'Guru']),
        ];
    }
}
