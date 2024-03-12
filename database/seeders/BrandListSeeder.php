<?php

namespace Database\Seeders;

use App\Models\BrandList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [[
            'logo'          => 'https://icons8.com/icon/12580/email',
            'kode_brand'    => 'D001',
            'name'          => 'Smile Consulting',
            'tagline'       => 'Hore-hore',
            'maskot'        => 'https://icons8.com/icon/12580/email',
            'address'       => 'jl.sriwijaya',
            'status'        => 1,
        ],[
            'logo'          => 'https://icons8.com/icon/12580/email',
            'kode_brand'    => 'D002',
            'name'          => 'Assesment Indonesia',
            'tagline'       => 'Hore-hore',
            'maskot'        => 'https://icons8.com/icon/12580/email',
            'address'       => 'jl.sriwijaya',
            'status'        => 1,
        ]];

        foreach ($brands as $data) {
            BrandList::create($data);
        }
    }
}
