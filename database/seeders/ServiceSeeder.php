<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'order' => 1,
                'title' => 'Call Center 0897-1226-666',
                'description' => 'Layanan pengaduan dengan telpon langsung atau kirim pesan whatsapp',
                'url' => 'https://wa.me/628971226666?text=Hallo%20Jaksa%20Kejati%20Riau',
            ],
            [
                'order' => 2,
                'title' => 'Lapor',
                'description' => 'Layanan Aspirasi dan Pengaduan Online Rakyat, Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang',
                'url' => 'https://www.lapor.go.id/',
            ],
            [
                'order' => 3,
                'title' => 'Kritik dan Saran',
                'description' => 'Berikan keritik dan saran anda untuk kemajuan kedepannya ',
                'url' => '/kritik-saran',
            ],
            [
                'order' => 4,
                'title' => 'Pengaduan',
                'description' => ' Layanan Aspirasi dan Pengaduan Online Masyarakat, Sampaikan laporan Anda langsung kepada kami ',
                'url' => '/pengaduan',
            ],
        ];
        foreach ($data as $item) :
            Service::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                    'description' => $item['description'],
                    'url' => $item['url'],
                ],
            );
        endforeach;
    }
}
