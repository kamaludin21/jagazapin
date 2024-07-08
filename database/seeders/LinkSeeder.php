<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Beranda',
                'url' => '/',
            ],
            [
                'title' => 'Dokumen',
                'url' => '/dokumen',
            ],
            [
                'title' => 'Dpo',
                'url' => '/dpo',
            ],
            [
                'title' => 'Pengaduan',
                'url' => '/pengaduan',
            ],
        ];
        foreach ($data as $item) :
            Link::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                    'url' => $item['url'],
                ],
            );
        endforeach;
    }
}
