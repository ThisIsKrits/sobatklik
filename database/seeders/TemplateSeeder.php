<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [[
            'type' => 'Pembukan',
            'content' => 'Halo dengan saya admin saat ini kamu sedang ditanggapi oleh  customer service Assessment Indonesia'
        ],[
            'type' => 'Penutup',
            'content' => 'Terima kasih telah menghubungi kami, jika ada pertanyaan lain silahkan menghubungi kami.'
        ]];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}
