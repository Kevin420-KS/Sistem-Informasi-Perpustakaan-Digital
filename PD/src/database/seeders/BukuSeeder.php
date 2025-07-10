<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Anak-anak (0–9) — Penulis: Ayu Lestari
            [
                'judul' => 'Belajar Seru di Rumah',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Pendidikan Anak',
                'tahun_terbit' => 2020,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-01-10',
                'status_akses' => 'gratis',
                'lembar_terjual' => 500,
            ],
            [
                'judul' => 'Petualangan Gajah Kecil',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Dongeng',
                'tahun_terbit' => 2021,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-02-12',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 400,
            ],
            [
                'judul' => 'Cerita Bergambar: Dunia Binatang',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Cerita Bergambar',
                'tahun_terbit' => 2022,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-03-05',
                'status_akses' => 'gratis',
                'lembar_terjual' => 450,
            ],
            [
                'judul' => 'Komik Anak Pintar',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Komik/Manga',
                'tahun_terbit' => 2023,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-04-10',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 380,
            ],
            [
                'judul' => 'Aktivitas Seru Balita Cerdas',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Aktivitas Anak',
                'tahun_terbit' => 2023,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-05-20',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 320,
            ],

            // Praremaja (10–12) — Penulis: Dwi Cahya
            [
                'judul' => 'Tips Jitu Matematika',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Pendidikan Anak',
                'tahun_terbit' => 2021,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-01-25',
                'status_akses' => 'gratis',
                'lembar_terjual' => 510,
            ],
            [
                'judul' => 'Komik Sains Cilik',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Komik/Manga',
                'tahun_terbit' => 2022,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-02-18',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 390,
            ],
            [
                'judul' => 'Fiksi Petualangan Si Detektif',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Fiksi Remaja',
                'tahun_terbit' => 2023,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-03-30',
                'status_akses' => 'gratis',
                'lembar_terjual' => 425,
            ],
            [
                'judul' => 'Ensiklopedia Mini Dunia',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Ensiklopedia',
                'tahun_terbit' => 2022,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-04-12',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 410,
            ],
            [
                'judul' => 'Sains Populer untuk Praremaja',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Sains Populer',
                'tahun_terbit' => 2024,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-05-05',
                'status_akses' => 'gratis',
                'lembar_terjual' => 470,
            ],

            // Remaja (13–17) — Penulis: Citra Sasmita
            [
                'judul' => 'Cinta di Balik Langit',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Fiksi Remaja',
                'tahun_terbit' => 2021,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-01-15',
                'status_akses' => 'gratis',
                'lembar_terjual' => 600,
            ],
            [
                'judul' => 'Komik Anak SMA',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Komik/Manga',
                'tahun_terbit' => 2022,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-02-10',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 520,
            ],
            [
                'judul' => 'Sains untuk Remaja',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Sains Populer',
                'tahun_terbit' => 2023,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-03-12',
                'status_akses' => 'gratis',
                'lembar_terjual' => 450,
            ],
            [
                'judul' => 'Motivasi untuk Anak Muda',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Motivasi Remaja',
                'tahun_terbit' => 2023,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-04-15',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 390,
            ],
            [
                'judul' => 'Novel Fantasi Sekolah',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Fiksi Remaja',
                'tahun_terbit' => 2024,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-05-20',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 480,
            ],

            // Dewasa (18–40) — Penulis: Rahmat Fajar
            [
                'judul' => 'Biografi Habibie',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Biografi',
                'tahun_terbit' => 2019,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-01-08',
                'status_akses' => 'gratis',
                'lembar_terjual' => 550,
            ],
            [
                'judul' => 'Jejak Pemimpin Bangsa',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Biografi',
                'tahun_terbit' => 2022,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-02-05',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 430,
            ],
            [
                'judul' => 'Sains Modern dan Teknologi',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Sains Populer',
                'tahun_terbit' => 2023,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-03-15',
                'status_akses' => 'gratis',
                'lembar_terjual' => 490,
            ],
            [
                'judul' => 'Fiksi Kehidupan Jakarta',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Fiksi Remaja',
                'tahun_terbit' => 2022,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-04-05',
                'status_akses' => 'beli penuh',
                'lembar_terjual' => 410,
            ],
            [
                'judul' => 'Kumpulan Esai Populer',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Esai',
                'tahun_terbit' => 2024,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-06-01',
                'status_akses' => 'gratis',
                'lembar_terjual' => 460,
            ],
        ];

        Buku::insert($data);
    }
}
