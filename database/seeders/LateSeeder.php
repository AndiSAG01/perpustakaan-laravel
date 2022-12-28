<?php

namespace Database\Seeders;

use App\Models\Late;
use Illuminate\Database\Seeder;

class LateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Late::create([
            'body'=> '1000',
    ]);
    }
}
