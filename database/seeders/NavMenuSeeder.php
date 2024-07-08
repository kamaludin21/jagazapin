<?php

namespace Database\Seeders;

use App\Models\NavMenu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'parent_id' => -1,
                'order' => 1,
                'modelable_type' => 'App\\Models\\Link',
                'modelable_id' => 1,
                'title' => 'Beranda',
            ],
            [
                'parent_id' => -1,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Profil',
            ],
            [
                'parent_id' => 2,
                'order' => 1,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 2,
                'title' => 'Tentang Kejaksaan',
            ],
            [
                'parent_id' => 2,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 3,
                'title' => 'Visi Misi',
            ],
            [
                'parent_id' => 2,
                'order' => 3,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 4,
                'title' => 'Struktur Organisasi',
            ],
            [
                'parent_id' => 2,
                'order' => 4,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 5,
                'title' => 'Tugas Pokok',
            ],
            [
                'parent_id' => 2,
                'order' => 5,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 6,
                'title' => 'Doktrin Kejaksaan',
            ],
            [
                'parent_id' => 2,
                'order' => 6,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 7,
                'title' => 'Perintah Harian Jaksa Agung',
            ],
            [
                'parent_id' => -1,
                'order' => 4,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Informasi',
            ],
            [
                'parent_id' => 9,
                'order' => 1,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 8,
                'title' => 'Maklumat Pelayanan',
            ],
            [
                'parent_id' => 9,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 9,
                'title' => 'Tugas Penyelenggara Pip',
            ],
            [
                'parent_id' => 9,
                'order' => 3,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Standar Layanan',
            ],
            [
                'parent_id' => 9,
                'order' => 4,
                'modelable_type' => 'App\\Models\\FileCategory',
                'modelable_id' => 2,
                'title' => 'Informasi Berkala',
            ],
            [
                'parent_id' => 9,
                'order' => 5,
                'modelable_type' => 'App\\Models\\FileCategory',
                'modelable_id' => 3,
                'title' => 'Informasi Serta Merta',
            ],
            [
                'parent_id' => 9,
                'order' => 6,
                'modelable_type' => 'App\\Models\\FileCategory',
                'modelable_id' => 4,
                'title' => 'Informasi Setiap Saat',
            ],
            [
                'parent_id' => -1,
                'order' => 5,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 1,
                'title' => 'Pengaduan',
            ],
            [
                'parent_id' => 16,
                'order' => 1,
                'modelable_type' => 'App\\Models\\Page',
                'modelable_id' => 10,
                'title' => 'Tata Cara Pengaduan',
            ],
            [
                'parent_id' => 16,
                'order' => 2,
                'modelable_type' => 'App\\Models\\Link',
                'modelable_id' => 4,
                'title' => 'Form Pengaduan',
            ],
            [
                'parent_id' => -1,
                'order' => 7,
                'modelable_type' => 'App\\Models\\FileCategory',
                'modelable_id' => 1,
                'title' => 'Peraturan',
            ],
            [
                'parent_id' => -1,
                'order' => 8,
                'modelable_type' => 'App\\Models\\Link',
                'modelable_id' => 2,
                'title' => 'Dokumen',
            ],
            [
                'parent_id' => -1,
                'order' => 3,
                'modelable_type' => 'App\\Models\\Category',
                'modelable_id' => 3,
                'title' => 'Siaran',
            ],
            [
                'parent_id' => -1,
                'order' => 6,
                'modelable_type' => 'App\\Models\\Link',
                'modelable_id' => 3,
                'title' => 'Dpo',
            ],
        ];
        foreach ($data as $item) :
            NavMenu::create(
                [
                    'user_id' => 1,
                    'parent_id' => $item['parent_id'],
                    'order' => $item['order'],
                    'modelable_type' => $item['modelable_type'],
                    'modelable_id' => $item['modelable_id'],
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
