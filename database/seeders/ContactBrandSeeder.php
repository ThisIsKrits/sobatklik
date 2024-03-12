<?php

namespace Database\Seeders;

use App\Models\ContactBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactBrand::create([
            'brand_id'      => 1,
            'contact_id'    => 1,
            'label'         => 'Whatsapp',
            'link'          => 'fb.com'
        ]);
    }
}
