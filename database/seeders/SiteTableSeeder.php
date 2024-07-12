<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::create([
            'nama_site' => 'JagaZapin',
            'logo' => '',
            'favicon' => '',
            'hp' => '',
            'medsos' =>''
        ]);
    }
}
