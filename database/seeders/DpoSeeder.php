<?php

namespace Database\Seeders;

use App\Models\Dpo;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'title' => 'GUSTI MUHAMMAD SOPHIAN SYARIF, ST',
                'content' => '<p>Nama: GUSTI MUHAMMAD SOPHIAN SYARIF, ST</p><p>Tempat lahir: Banjarmasin</p><p>Umur: 37 Tahun</p><p>Jenis Kelamin: Laki-Laki</p><p>Kebangsaan: Indonesia</p><p>Tempat Tinggal: Jl. Parit Haji Husin II Komp. Paris Royal B-7 Kec. Pontianak Tenggara, Kota Pontianak</p><p>Agama: Islam</p><p>Pekerjaan: Pegawai Bank Rakyat Indonesia</p><p>Ciri-Ciri</p><ul><li>Tinggi Badan : 168 cm</li><li>Warna Kulit : Putih</li><li>Bentuk Muka : Oval</li></ul><p>Bagi Masyarakat yang mengetahui keberadaan orang tersebut diharapkan melaporkan ke Kantor Kejaksaan Negeri terdekat.</p>',
            ],
            [
                'title' => 'SOEGIJONO',
                'content' => '<p>Nama: SOEGIJONO.<br>Tempat, Tanggal lahir: Batang, 23 Nopember 1968<br>Umur: 42 Tahun<br>Jenis kelamin : Lak-laki<br>Kebangsaan : Indonesia<br>Tempat tinggal : Prisma Kedoya Plasa Blok C No. 3 Jl Raya Perjuangan Kebon Jeruk Jakarta Barat. atau<br>Taman Kebon Jeruk Blok E/8 RT.001/009 Srengseng-Kembangan, Jakarta Barat.<br>Agama : Katholik.<br>Pekerjaan : Swasta (tahun 2004-2009 Direktur Utama PT Indoberk Jakarta/Tahun 2009 s/d sekarang sebagai Komisaris Utama PT. Indoberk).<br>Pendidikan: S-1</p><p>Ciri-ciri :&nbsp;</p><ul><li>Keturunan Tionghoa.</li><li>Kulit kuning.</li><li>Tinggi + 163 Cm</li></ul><p>KEPADA MASYARAKAT LUAS BILAMANA MENGETAHUI KEBERADAAN ORANG TERSEBUT DIATAS, AGAR SEGERA MENGHUBUNGI KEJAKSAAN TINGGI JAWA TIMUR, KEJAKSAAN TINGGI SETEMPAT, KEJAKSAAN NEGERI SETEMPAT</p>',
            ],
            [
                'title' => 'SAIFUL ANAM, SH',
                'content' => '<p>Nama Lengkap: SAIFUL ANAM, SH<br>Tempat, Tanggal lahir: Sampang, 01 Juni 1986<br>Umur:&nbsp;<br>Jenis Kelamin: Laki-laki<br>Kebangsaan: Indonesia<br>Tempat Tinggal: Dsn. Gurdibih, Desa Paseyan, Kec. Sampang, Kab. Sampang<br>Agama: Islam<br>Pekerjaan: -<br>Pendidikan: S1</p><p>Ciri-ciri</p><ul><li>Tinggi badan: 160 cm</li><li>Warna kulit: Kuning</li><li>Bentuk muka: Lonjong</li></ul><p>KEPADA MASYARAKAT LUAS BILAMANA MENGETAHUI KEBERADAAN ORANG TERSEBUT DIATAS, AGAR SEGERA MENGHUBUNGI KEJAKSAAN TINGGI JAWA TIMUR, KEJAKSAAN TINGGI SETEMPAT, KEJAKSAAN NEGERI SETEMPAT</p>',
            ],
            [
                'title' => 'DPO Kejari Dumai An.Teuku M.Nasir',
                'content' => '<p>DAFTAR PENCARIAN ORANG (DPO) KEJAKSAAN NEGERI DUMAI TINDAK PIDANA KORUPSI PEMUNGUTAN RETRIBUSI PARKIR TERMINAL BARANG PADA DINAS PERHUBUNGAN KOTA DUMAI PERIODE JANUARI 2013 S D JUNI 2014.</p><p>NAMA: TEUKU MUH.NASIR</p><p>TANGGAL LAHIR: MEUREUDU, 31 DESEMBER 19650</p><p>JENIS KELAMIN: LAKI - LAKI</p><p>KEBANGSAAN: INDONESIA</p><p>TEMPAT TINGGAL: Jl. PAUS GG. RAWASARI NO. 03 RT.O1l KEL. RIMBA SEKAMPUNG KEC. DUMAI BARAT -KOTA DUMAI</p><p>AGAMA: ISLAM</p><p>PEKERJAAN: KEPALA UPT TERMINAL BARANG KOTA DUMAI</p><p>Ciri-Ciri:</p><ul><li>TINGGI BADAN: 165 CM</li><li>WARNA KULIT: SAWO MATANG</li><li>BENTUK MUKA: OVAL</li><li>PENDIDIKAN: SMA (TAMAT)</li></ul><p>Apabila Masyarakat menemukan yang bersangkutan/mendapatkan info keberadaan yang bersangkutan mohon untuk melaporkannya /menghubungi pihak Kejaksaan Negeri Dumai melalui kontak person : 081266873866</p>',
            ],
        ];
        foreach ($datas as $data) :
            Dpo::create(
                [
                    'user_id' => 1,
                    'slug' => Str::slug($data['title']),
                    'title' => Str::headline(Str::lower($data['title'])),
                    'content' => $data['content'],
                ],
            );
        endforeach;
    }
}
