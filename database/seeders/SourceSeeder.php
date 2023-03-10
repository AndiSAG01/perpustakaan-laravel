<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['body' => 'Donasi'],
            ['body' => 'Hadiah'],
            ['body' => 'Pembelian'],
            ['body' => 'Pertukaran'],
            ['body' => 'Ganti rugi'],
            ['body' => 'Lainnya'],
           
        ];
        Source::insert($data);
    }
}
