<?php

namespace Database\Seeders;

use App\Models\TermCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $term = TermCondition::create([
            'terms' => ''
        ]);
    }
}
