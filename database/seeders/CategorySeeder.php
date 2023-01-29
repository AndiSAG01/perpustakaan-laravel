<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no = 1;
        $data = [
            [
                'code' => '000',
                'name' => 'Generalities (Karya Umum)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '100',
                'name' => 'Philosopy and Psychology (Filsafat dan Psikologi)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '200',
                'name' => 'Religion (Agama)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '300',
                'name' => 'Social Science (Ilmu-ilmu Sosial)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '400',
                'name' => 'Language (Bahasa)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '500',
                'name' => 'Natural Science and Mathematics (Ilmu-ilmu Alam dan Matematika)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '600',
                'name' => 'Technology and Applied Science (Teknologi dan Ilmu-ilmu Terapan)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '700',
                'name' => 'The Art, Fine and Sport (Kesenian, Hiburan dan Olahraga)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '800',
                'name' => 'Literature and Rhetoric (Kesusastraan)',
                'location' => 'Rak ' . $no++
            ],
            [
                'code' => '900',
                'name' => 'Geography and History (Geografi dan Sejarah)',
                'location' => 'Rak ' . $no++
            ],
            
        ];

        Category::insert($data);
    }
}
