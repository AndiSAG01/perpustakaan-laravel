<?php

namespace Database\Factories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id' => function () {
                return Transaction::all()->random();
            },
            'count' => rand(1,99999),
            'description' => $this->faker->word()
        ];
    }
}
