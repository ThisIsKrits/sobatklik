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
            'terms' => '<ul><ol>
            Penerimaan Syarat dan Ketentuan</ol>
            Dengan mengunduh, mengakses, atau menggunakan aplikasi "Sobat Klik" - Call Center ("Aplikasi"), pengguna setuju untuk tunduk pada semua syarat dan ketentuan yang tercantum di bawah ini.
            <ol>Definisi</ol>
            <ul>Aplikasi: Merujuk pada aplikasi "Sobat Klik".</ul>
            <ul>Pengguna: Individu atau entitas yang menggunakan Aplikasi.</ul>
            <ul>Call Center: Layanan dukungan pengguna yang disediakan melalui Aplikasi "Sobat Klik".</ul>
            </ul>'
        ]);
    }
}
