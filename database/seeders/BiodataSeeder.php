<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Seeder;

class BiodataSeeder extends Seeder
{
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Purno',
                'photo' => 'https://indonesiaexpat.id/wp-content/uploads/2017/10/img_6172.jpg',
                'address' => 'Indonesia',
                'phone' => '085755380202',
                'email' => 'purno@gmail.com',
            ],
        ];
        foreach ($datas as $value) {
            Biodata::create($value);
        }
    }
}
