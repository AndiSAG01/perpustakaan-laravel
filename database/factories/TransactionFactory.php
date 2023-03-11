<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = rand(1, 10);
        
        return [
            'transactionCode' => 'TRX'.Str::random(5),
            'book_id'=> function() {
                return Book::all()->random();
            },
            'user_id'=> function() {
                return user::all()->random();
            },
            'late_id'=> 1,
            'entry'=> now()->addMonths($random),
            'return'=> now()->subDays($random),
            'lateDay' => 0,
            'description' => 'Total Denda Rp. '. rand(1,100),
            'status'=> rand(0, 3),
            'created_at' => now()->subHours(rand(1,100)),
            'updated_at' => now()->subHours(rand(1,100)),
        ];
    }
}
