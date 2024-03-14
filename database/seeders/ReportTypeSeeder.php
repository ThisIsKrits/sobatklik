<?php

namespace Database\Seeders;

use App\Models\ReportType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [[
            'name' => 'Pelayanan'
        ],[
            'name' => 'Langganan'
        ],[
            'name' => 'Kendala'
        ]];

        foreach ($types as $type) {
            ReportType::create($type);
        }
    }
}
