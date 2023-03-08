<?php

namespace Database\Seeders;

use App\models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'noId' => '1234567890',
                'name' => 'testing',
                'email' => 'testing@testing.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('testing'),
                'isAdmin' => true,
                'birthday' => now(),
                'gender' => 1,
                'status' => 2,
                'address' => 'Jln. Testing',
                'telp' => random_int(11, 12),
            ],
            [
                'noId' => '1234567897',
                'name' => 'user',
                'email' => 'user@user.com',
                'email_verified_at' => null,
                'password' => bcrypt('password'),
                'isAdmin' => false,
                'birthday' => now(),
                'gender' => 1,
                'status' => 0,
                'address' => 'Jln. user',
                'telp' => random_int(11, 12),
            ]
        ];
        User::insert($data);

        User::factory(10)->create();
    }
}
