<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminat;

class PeminatSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['usia_min' => 10, 'usia_max' => 12, 'kelompok_usia' => 'anak-anak', 'jenis_buku' => 'komik/manga', 'laki_laki' => 20, 'perempuan' => 25, 'total_pembaca' => 45, 'tingkat_minat' => 'sangat diminati'],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'remaja', 'jenis_buku' => 'fiksi remaja', 'laki_laki' => 18, 'perempuan' => 22, 'total_pembaca' => 40, 'tingkat_minat' => 'sangat diminati'],
            ['usia_min' => 13, 'usia_max' => 17, 'kelompok_usia' => 'remaja', 'jenis_buku' => 'komik/manga', 'laki_laki' => 16, 'perempuan' => 18, 'total_pembaca' => 34, 'tingkat_minat' => 'lumayan diminati'],
            ['usia_min' => 18, 'usia_max' => 25, 'kelompok_usia' => 'dewasa muda', 'jenis_buku' => 'teknologi', 'laki_laki' => 30, 'perempuan' => 15, 'total_pembaca' => 45, 'tingkat_minat' => 'lumayan diminati'],
            ['usia_min' => 18, 'usia_max' => 25, 'kelompok_usia' => 'dewasa muda', 'jenis_buku' => 'sains populer', 'laki_laki' => 25, 'perempuan' => 20, 'total_pembaca' => 45, 'tingkat_minat' => 'sangat diminati'],
            ['usia_min' => 26, 'usia_max' => 35, 'kelompok_usia' => 'dewasa', 'jenis_buku' => 'biografi', 'laki_laki' => 17, 'perempuan' => 21, 'total_pembaca' => 38, 'tingkat_minat' => 'lumayan diminati'],
            ['usia_min' => 26, 'usia_max' => 35, 'kelompok_usia' => 'dewasa', 'jenis_buku' => 'fiksi remaja', 'laki_laki' => 15, 'perempuan' => 27, 'total_pembaca' => 42, 'tingkat_minat' => 'sangat diminati'],
        ];

        Peminat::insert($data);
    }
}
