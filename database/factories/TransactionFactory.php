<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transactionCode' => 'TRX'.Str::random(5),
            'book_id'=> rand(1,40),
            'user_id'=> rand(2, 40),
            'late_id'=> 1,
            'entry'=> $this->faker->date(),
            'return'=> $this->faker->date(),
            'lateDay' => rand(1, 5) . ' Hari',
            'description' => 'Total Denda Rp. '. Str::random(5),
            'status'=> false,
        ];
    }
}
