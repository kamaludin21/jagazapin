<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ReporterCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReporterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Korban',],
            ['title' => 'Keluarga Korban',],
            ['title' => 'Saksi',],
            ['title' => 'Masyarakat Umum',],
            ['title' => 'Pejabat Negara atau Aparat Penegak Hukum',],
            ['title' => 'Lembaga Swadaya Masyarakat (LSM)',],
        ];
        foreach ($data as $item) :
            ReporterCategory::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
