<?php

namespace Database\Seeders;

use App\Models\ContactCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [[
            'name'      => 'Whatsapp',
            'icon'      => 'https://icons8.com/icon/vbST8WV7crEk/whatsapp',
            'status'    => 1
        ],[
            'name'  => 'Email',
            'icon'  => 'https://icons8.com/icon/12580/email',
            'status'    => 1
        ]];

        foreach ($contacts as $contact) {
            ContactCategory::create($contact);
        }
    }
}
