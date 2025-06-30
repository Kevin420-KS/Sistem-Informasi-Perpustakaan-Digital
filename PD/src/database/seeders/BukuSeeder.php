<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Menjalankan proses seeding untuk tabel buku.
     */
    public function run(): void
    {
        // Kumpulan data buku yang akan dimasukkan ke database
        $data = [
            // Kategori: Pendidikan Anak
            [
                'judul' => 'Belajar Seru di Rumah',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Pendidikan Anak',
                'tahun_terbit' => 2020,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-01-15',
                'status_akses' => 'gratis'
            ],
            [
                'judul' => 'Dunia Anak Ceria',
                'penulis' => 'Ayu Lestari',
                'jenis_buku' => 'Pendidikan Anak',
                'tahun_terbit' => 2021,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-02-18',
                'status_akses' => 'beli penuh'
            ],

            // Kategori: Komik/Manga
            [
                'judul' => 'Petualangan Naruto',
                'penulis' => 'Kenji Harada',
                'jenis_buku' => 'Komik/Manga',
                'tahun_terbit' => 2022,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-03-05',
                'status_akses' => 'gratis'
            ],
            [
                'judul' => 'Samurai Legenda',
                'penulis' => 'Kenji Harada',
                'jenis_buku' => 'Komik/Manga',
                'tahun_terbit' => 2023,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-04-10',
                'status_akses' => 'beli penuh'
            ],

            // Kategori: Fiksi Remaja
            [
                'judul' => 'Cinta di SMA',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Fiksi Remaja',
                'tahun_terbit' => 2021,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-05-01',
                'status_akses' => 'gratis'
            ],
            [
                'judul' => 'Rahasia Remaja',
                'penulis' => 'Citra Sasmita',
                'jenis_buku' => 'Fiksi Remaja',
                'tahun_terbit' => 2024,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-06-15',
                'status_akses' => 'beli penuh'
            ],

            // Kategori: Sains Populer
            [
                'judul' => 'Eksperimen Ilmiah',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Sains Populer',
                'tahun_terbit' => 2021,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-05-08',
                'status_akses' => 'gratis'
            ],
            [
                'judul' => 'Sains untuk Semua',
                'penulis' => 'Dwi Cahya',
                'jenis_buku' => 'Sains Populer',
                'tahun_terbit' => 2024,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-06-10',
                'status_akses' => 'beli penuh'
            ],

            // Kategori: Biografi
            [
                'judul' => 'Biografi Habibie',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Biografi',
                'tahun_terbit' => 2019,
                'platform' => 'Perpusnas',
                'tanggal_rilis' => '2024-04-01',
                'status_akses' => 'gratis'
            ],
            [
                'judul' => 'Jejak Ilmuwan Indonesia',
                'penulis' => 'Rahmat Fajar',
                'jenis_buku' => 'Biografi',
                'tahun_terbit' => 2022,
                'platform' => 'Gramedia Digital',
                'tanggal_rilis' => '2024-05-20',
                'status_akses' => 'beli penuh'
            ],
        ];

        // Menyimpan semua data sekaligus ke tabel buku
        Buku::insert($data);
    }
}
