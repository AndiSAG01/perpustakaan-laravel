<?php

namespace Database\Seeders;

use App\models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'noId'=> '1234567890',
            'name'	=> 'testing',
            'email'	=> 'testing@testing.com',
            'password'	=> bcrypt('testing'),
            'isAdmin' => true,
            'birthday' => now(),
            'gender' => 1,
            'address' => 'Jln. Testing',
            'telp' => '08978301766',
    ]);
    }
}
