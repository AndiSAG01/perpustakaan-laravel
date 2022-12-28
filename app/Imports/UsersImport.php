<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new User([
            'noId' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'password' => bcrypt('password'),
            'isAdmin' => false,
            'birthday' => $row[3],
            'gender' => $row[4],
            'address' => $row[5],
            'telp' => $row[6],
        ]);
    }
}
