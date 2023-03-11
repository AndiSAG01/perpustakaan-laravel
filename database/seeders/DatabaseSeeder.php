<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SourceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LateSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BookSeeder::class);
        $this->call(GuestSeeder::class);
        Transaction::factory(10)->create();
        Income::factory(10)->create();

    }
}
