<?php

namespace Database\Seeders;

use App\Models\guest;
use Carbon\Factory;
use Database\Factories\GuestFactory;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guest::factory(10)->create();    }
}
