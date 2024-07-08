<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\ComplaintCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Tindak Pidana',],
            ['title' => 'Korupsi',],
            ['title' => 'Penyalahgunaan Wewenang',],
            ['title' => 'Pelanggaran HAM',],
            ['title' => 'Pengaduan Administratif',],
            ['title' => 'Penyelewengan Keuangan Negara',],
            ['title' => 'Pengaduan Pelayanan Hukum',],
        ];
        foreach ($data as $item) :
            ComplaintCategory::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
