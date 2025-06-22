<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['judul' => 'Dunia Sains Remaja', 'penulis' => 'Yulia Dwi', 'jenis_buku' => 'sains populer', 'tahun_terbit' => 2021, 'platform' => 'Perpusnas', 'tanggal_rilis' => '2024-01-15', 'status_akses' => 'gratis'],
            ['judul' => 'Sains Seru untuk Remaja', 'penulis' => 'Yulia Dwi', 'jenis_buku' => 'sains populer', 'tahun_terbit' => 2022, 'platform' => 'Project Gutenberg', 'tanggal_rilis' => '2024-05-18', 'status_akses' => 'beli penuh'],
            ['judul' => 'Kisah Si Robot Kecil', 'penulis' => 'Andi Setiawan', 'jenis_buku' => 'teknologi', 'tahun_terbit' => 2020, 'platform' => 'Amazon Kindle', 'tanggal_rilis' => '2024-02-10', 'status_akses' => 'gratis'],
            ['judul' => 'Dunia Otomasi Digital', 'penulis' => 'Andi Setiawan', 'jenis_buku' => 'teknologi', 'tahun_terbit' => 2023, 'platform' => 'Scribd', 'tanggal_rilis' => '2024-06-01', 'status_akses' => 'beli penuh'],
            ['judul' => 'Cerita Anak Nusantara', 'penulis' => 'Dewi Lestari', 'jenis_buku' => 'pendidikan anak', 'tahun_terbit' => 2019, 'platform' => 'Scribd', 'tanggal_rilis' => '2024-03-25', 'status_akses' => 'gratis'],
            ['judul' => 'Kisah Cerdas untuk Anak', 'penulis' => 'Dewi Lestari', 'jenis_buku' => 'pendidikan anak', 'tahun_terbit' => 2022, 'platform' => 'Gramedia Digital', 'tanggal_rilis' => '2024-05-10', 'status_akses' => 'beli penuh'],
            ['judul' => 'Manga Petualangan Haruka', 'penulis' => 'Kenji Watanabe', 'jenis_buku' => 'komik/manga', 'tahun_terbit' => 2022, 'platform' => 'Project Gutenberg', 'tanggal_rilis' => '2024-04-05', 'status_akses' => 'gratis'],
            ['judul' => 'Legenda Samurai Terakhir', 'penulis' => 'Kenji Watanabe', 'jenis_buku' => 'komik/manga', 'tahun_terbit' => 2023, 'platform' => 'Perpusnas', 'tanggal_rilis' => '2024-06-10', 'status_akses' => 'beli penuh'],
            ['judul' => 'Rahasia Angka', 'penulis' => 'Budi Raharjo', 'jenis_buku' => 'sains populer', 'tahun_terbit' => 2023, 'platform' => 'Gramedia Digital', 'tanggal_rilis' => '2024-05-20', 'status_akses' => 'gratis'],
            ['judul' => 'Matematika dan Imajinasi', 'penulis' => 'Budi Raharjo', 'jenis_buku' => 'sains populer', 'tahun_terbit' => 2024, 'platform' => 'Amazon Kindle', 'tanggal_rilis' => '2024-06-15', 'status_akses' => 'beli penuh'],
            ['judul' => 'Dunia Digital', 'penulis' => 'Rina Kurniawati', 'jenis_buku' => 'teknologi', 'tahun_terbit' => 2020, 'platform' => 'Perpusnas', 'tanggal_rilis' => '2024-02-03', 'status_akses' => 'gratis'],
            ['judul' => 'Kecerdasan Buatan untuk Semua', 'penulis' => 'Rina Kurniawati', 'jenis_buku' => 'teknologi', 'tahun_terbit' => 2023, 'platform' => 'Scribd', 'tanggal_rilis' => '2024-05-30', 'status_akses' => 'beli penuh'],
            ['judul' => 'Bayangan Gelap', 'penulis' => 'Citra Sasmita', 'jenis_buku' => 'fiksi remaja', 'tahun_terbit' => 2021, 'platform' => 'Gramedia Digital', 'tanggal_rilis' => '2024-03-12', 'status_akses' => 'gratis'],
            ['judul' => 'Dunia Fantasi: Negeri Tak Terlihat', 'penulis' => 'Citra Sasmita', 'jenis_buku' => 'fiksi remaja', 'tahun_terbit' => 2024, 'platform' => 'Project Gutenberg', 'tanggal_rilis' => '2024-06-12', 'status_akses' => 'beli penuh'],
            ['judul' => 'Biografi Einstein', 'penulis' => 'Rahmat Fajar', 'jenis_buku' => 'biografi', 'tahun_terbit' => 2018, 'platform' => 'Scribd', 'tanggal_rilis' => '2024-04-27', 'status_akses' => 'gratis'],
            ['judul' => 'Jejak Ilmuwan Dunia', 'penulis' => 'Rahmat Fajar', 'jenis_buku' => 'biografi', 'tahun_terbit' => 2022, 'platform' => 'Amazon Kindle', 'tanggal_rilis' => '2024-05-05', 'status_akses' => 'beli penuh'],
            ['judul' => 'Pelangi Setelah Hujan', 'penulis' => 'Intan Permatasari', 'jenis_buku' => 'fiksi remaja', 'tahun_terbit' => 2021, 'platform' => 'Amazon Kindle', 'tanggal_rilis' => '2024-01-29', 'status_akses' => 'gratis'],
            ['judul' => 'Senja dan Asa', 'penulis' => 'Intan Permatasari', 'jenis_buku' => 'fiksi remaja', 'tahun_terbit' => 2024, 'platform' => 'Gramedia Digital', 'tanggal_rilis' => '2024-06-20', 'status_akses' => 'beli penuh'],
            ['judul' => 'Petualangan Ilmiah Remaja', 'penulis' => 'Dwi Cahya', 'jenis_buku' => 'sains populer', 'tahun_terbit' => 2020, 'platform' => 'Perpusnas', 'tanggal_rilis' => '2024-03-05', 'status_akses' => 'gratis'],
            ['judul' => 'Eksperimen Seru di Rumah', 'penulis' => 'Dwi Cahya', 'jenis_buku' => 'sains populer', 'tahun_terbit' => 2023, 'platform' => 'Scribd', 'tanggal_rilis' => '2024-05-25', 'status_akses' => 'beli penuh'],
        ];

        Buku::insert($data);
    }
}
