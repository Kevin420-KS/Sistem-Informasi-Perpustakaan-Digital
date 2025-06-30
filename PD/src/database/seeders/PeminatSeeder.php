<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminat;

class PeminatSeeder extends Seeder
{
    public function run(): void
    {
        $rawData = [
            // Anak-anak (6–9)
            ['usia_min' => 6, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'pendidikan anak', 'laki_laki' => 20, 'perempuan' => 22],
            ['usia_min' => 6, 'usia_max' => 9, 'kelompok_usia' => 'Anak-anak', 'jenis_buku' => 'komik/manga', 'laki_laki' => 30, 'perempuan' => 28],

            // Praremaja (10–12)
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'pendidikan anak', 'laki_laki' => 18, 'perempuan' => 16],
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'komik/manga', 'laki_laki' => 25, 'perempuan' => 30],
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'Praremaja', 'jenis_buku' => 'fiksi remaja', 'laki_laki' => 28, 'perempuan' => 35],

            // Remaja (13–17)
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'komik/manga', 'laki_laki' => 24, 'perempuan' => 26],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'fiksi remaja', 'laki_laki' => 35, 'perempuan' => 40],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'Remaja', 'jenis_buku' => 'sains populer', 'laki_laki' => 30, 'perempuan' => 32],

            // Dewasa (18–40)
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'sains populer', 'laki_laki' => 20, 'perempuan' => 18],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'sains populer', 'laki_laki' => 40, 'perempuan' => 38],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'biografi', 'laki_laki' => 17, 'perempuan' => 14],
            ['usia_min' => 18, 'usia_max' => 40, 'kelompok_usia' => 'Dewasa', 'jenis_buku' => 'fiksi remaja', 'laki_laki' => 33, 'perempuan' => 36],
        ];

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

        Peminat::insert($data);
    }
}
