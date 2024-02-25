<?php

namespace Database\Seeders;

use App\Models\API\ColorSelect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SelectColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $select = ColorSelect::create([
            'theme_id'  => 1,
        ]);
    }
}
