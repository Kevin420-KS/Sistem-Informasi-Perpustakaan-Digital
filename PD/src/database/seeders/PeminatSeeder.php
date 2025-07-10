<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminat;

class PeminatSeeder extends Seeder
{
    public function run(): void
    {
        // Data awal peminat berdasarkan kelompok usia dan jenis buku
        $rawData = [
            // Anak-anak (0-9)
            ['usia_min' => 0, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'buku cerita bergambar', 'laki_laki' => 25, 'perempuan' => 28],
            ['usia_min' => 0, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'buku interaktif', 'laki_laki' => 20, 'perempuan' => 23],
            ['usia_min' => 0, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'buku edukasi dasar', 'laki_laki' => 22, 'perempuan' => 24],
            ['usia_min' => 0, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'buku aktivitas', 'laki_laki' => 18, 'perempuan' => 20],
            ['usia_min' => 0, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'buku cerita religius anak', 'laki_laki' => 19, 'perempuan' => 21],

            // Praremaja (10–12)
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'novel fantasi ringan', 'laki_laki' => 24, 'perempuan' => 27],
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'komik petualangan', 'laki_laki' => 28, 'perempuan' => 25],
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'pengetahuan populer anak', 'laki_laki' => 20, 'perempuan' => 22],
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'kisah tokoh inspiratif anak', 'laki_laki' => 17, 'perempuan' => 19],
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'buku aktivitas otak', 'laki_laki' => 21, 'perempuan' => 20],

            // Remaja (13–17)
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'novel fiksi remaja', 'laki_laki' => 30, 'perempuan' => 35],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'komik remaja', 'laki_laki' => 26, 'perempuan' => 29],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'fantasi dan sci-fi remaja', 'laki_laki' => 22, 'perempuan' => 24],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'self improvement remaja', 'laki_laki' => 18, 'perempuan' => 23],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'buku pendidikan sekolah', 'laki_laki' => 32, 'perempuan' => 31],

            // Dewasa (18–40)
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'novel sastra dan fiksi umum', 'laki_laki' => 29, 'perempuan' => 32],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'self-help dan psikologi populer', 'laki_laki' => 27, 'perempuan' => 35],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'buku bisnis dan produktivitas', 'laki_laki' => 31, 'perempuan' => 25],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'nonfiksi populer', 'laki_laki' => 22, 'perempuan' => 19],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'keagamaan dan spiritualitas', 'laki_laki' => 24, 'perempuan' => 28],
        ];

        // Hitung total dan tingkat minat
        $data = [];

        foreach ($rawData as $item) {
            $total = $item['laki_laki'] + $item['perempuan'];
            $minat = match (true) {
                $total <= 40 => 'Kurang Diminati',
                $total <= 70 => 'Lumayan Diminati',
                default => 'Sangat Diminati',
            };

            $data[] = [
                ...$item,
                'total_pembaca' => $total,
                'tingkat_minat' => $minat,
            ];
        }

        // Insert ke DB
        Peminat::insert($data);
    }
}
