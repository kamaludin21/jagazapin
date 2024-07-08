<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'file_category_id' => 1,
                'title' => 'PERATURAN JAKSA AGUNG REPUBLIK INDONESIA NOMOR : PER-025/A/JA/11/2015 TENTANG PETUNJUK PELAKSANAAN PENEGAKAN HUKUM, BANTUAN HUKUM, PERTIMBANGAN HUKUM, TINDAKAN HUKUM LAIN DAN PELAYANAN HUKUM DI BIDANG PERDATA DAN TATA USAHA NEGARA',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PER-011/A/JA/06/2013 TENTANG STANDAR PELAYANAN PUBLIK KEJAKSAAN REPUBLIK INDONESIA',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PER-026/A/JA/10/2013 TENTANG PENANGANAN DAN PERLINDUNGAN TERHADAP PELAPOR PELANGGARAN HUKUM DI LINGKUNGAN KEJAKSAAN REPUBLIK INDONESIA',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PERATURAN KEJAKSAAN RI NOMOR 3 TAHUN 2020 PENANGANAN LAPORAN DAN PERLINDUNGAN TERHADAP PELAPOR PELANGGARAN HUKUM (WHISTLE BLOWING SYSTEM) DI KEJAKSAAN REPUBLIK INDONESIA',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PERATURAN KEJAKSAAN RI NOMOR 02 TAHUN 2020 TENTANG PENANGANAN BENTURAN KEPENTINGAN DI LINGKUNGAN KEJAKSAAN RI',
            ],
            [
                'file_category_id' => 1,
                'title' => 'Kode Penomoran Naskah Dinas di lingkungan Kejaksaan RI',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PERATURAN KEJAKSAAN RI NOMOR: 3 TAHUN 2019 TENTANG PENGENDALIAN GRATIFIKASI DI LINGKUNGAN KEJAKSAAN RI',
            ],
            [
                'file_category_id' => 1,
                'title' => 'UU Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik',
            ],
            [
                'file_category_id' => 1,
                'title' => 'UU Nomor 16 Tahun 2004 tentang Kejaksaan RI',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PERATURAN JAKSA AGUNG REPUBLIK INDONESIA NOMOR PER-014/A/JA/08/2015 TENTANG PEDOMAN KEPROTOKOLAN DI LINGKUNGAN KEJAKSAAN REPUBLIK INDONESIA',
            ],
            [
                'file_category_id' => 1,
                'title' => 'PERATURAN JAKSA AGUNG REPUBLIK INDONESIA NOMOR: PER-024/A/JA/2014 TENTANG ADMINISTRASI INTELIJEN KEJAKSAAN REPUBLIK INDONESIA',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Rencana strategis Kejaksaan',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Ringkasan laporan kinerja Kejaksaan Tinggi Riau Tahun 2022',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Ringkasan laporan Keuangan & Realisasi Anggaran Tahun 2022',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Daftar pencarian orang',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Rekapitulasi penyelesaian perkara tindak pidana umum, tindak pidana khusus, perdata, dan tata usaha negara yang ditangani Kejaksaan Tahun 2022',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Pengumuman Seleksi CPNS Kejaksaan TA 2023',
            ],
            [
                'file_category_id' => 2,
                'title' => 'Laporan Tahunan Tahun 2023',
            ],
            [
                'file_category_id' => 2,
                'title' => 'LAKIP Tahun 2023 (Laptri IV Tahun 2023)',
            ],
            [
                'file_category_id' => 3,
                'title' => 'Perubahan Jadwal Seleksi CPNS Kejaksaan TA 2023',
            ],
            [
                'file_category_id' => 4,
                'title' => 'Prosedur kerja yang berkaitan dengan pelayanan masyarakat',
            ],
        ];
        foreach ($data as $item) :
            File::create(
                [
                    'user_id' => 1,
                    'file_category_id' => $item['file_category_id'],
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                ],
            );
        endforeach;
    }
}
