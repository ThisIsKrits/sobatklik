<?php

namespace Database\Seeders;

use App\Models\SosmedCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $somseds = [[
            'name'      => 'Instagram',
            'icon'      => 'https://icons8.com/icon/32309/instagram',
            'status'    => 1
        ],[
            'name'  => 'Facebook',
            'icon'  => 'https://icons8.com/icon/8818/facebook',
            'status'    => 1
        ]];

        foreach ($somseds as $sosmed) {
            SosmedCategory::create($sosmed);
        }
    }
}
