<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Kepala Kejaksaan Tinggi ',],
            ['title' => 'Wakil Kepala Kejaksaan Tinggi ',],
            ['title' => 'Asisten Intelijen',],
            ['title' => 'Asisten Pidana Khusus',],
            ['title' => 'Asisten Perdata dan Tata Usaha Negara',],
            ['title' => 'Asisten Pidana Militer',],
            ['title' => 'Asisten Pengawasan',],
        ];
        foreach ($data as $item) :
            Position::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
