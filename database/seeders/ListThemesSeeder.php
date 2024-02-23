<?php

namespace Database\Seeders;

use App\Models\API\ListTheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = [[
            'colors' => '#9A8DE7'
        ],[
            'colors' => '#757BFF'
        ],[
            'colors' => '#84D7FF'
        ],[
            'colors' => '#FFDA8C'
        ],[
            'colors' => '#6BBD7D'
        ],[
            'colors' => '#DD8CCB'
        ],[
            'colors' => '#FF7378'
        ],[
            'colors' => '#A0A3BD'
        ]];

        foreach ($themes as $theme) {
            ListTheme::create($theme);
        }
    }
}
