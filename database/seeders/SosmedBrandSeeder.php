<?php

namespace Database\Seeders;

use App\Models\SosmedBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SosmedBrand::create([
            'brand_id'      => '1',
            'sosmed_id'     => '1',
            'label'         => 'Instagram',
            'link'          => 'fb.com'
        ]);
    }
}
