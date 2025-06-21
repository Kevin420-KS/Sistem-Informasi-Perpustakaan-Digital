<?php

namespace Database\Seeders;

use App\Models\Pembaca;
use Illuminate\Database\Seeder;

class PembacaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Andi', 'usia' => 11, 'gender' => 'Laki-laki', 'kelompok_usia' => 'anak-anak'],
            ['nama' => 'Sari', 'usia' => 12, 'gender' => 'Perempuan', 'kelompok_usia' => 'anak-anak'],
            ['nama' => 'Budi', 'usia' => 16, 'gender' => 'Laki-laki', 'kelompok_usia' => 'remaja'],
            ['nama' => 'Rina', 'usia' => 17, 'gender' => 'Perempuan', 'kelompok_usia' => 'remaja'],
            ['nama' => 'Rizky', 'usia' => 22, 'gender' => 'Laki-laki', 'kelompok_usia' => 'dewasa muda'],
            ['nama' => 'Dewi', 'usia' => 24, 'gender' => 'Perempuan', 'kelompok_usia' => 'dewasa muda'],
            ['nama' => 'Lala', 'usia' => 13, 'gender' => 'Perempuan', 'kelompok_usia' => 'remaja'],
            ['nama' => 'Dimas', 'usia' => 19, 'gender' => 'Laki-laki', 'kelompok_usia' => 'dewasa muda'],
            ['nama' => 'Heri', 'usia' => 30, 'gender' => 'Laki-laki', 'kelompok_usia' => 'dewasa'],
            ['nama' => 'Intan', 'usia' => 35, 'gender' => 'Perempuan', 'kelompok_usia' => 'dewasa'],
        ];

        Pembaca::insert($data);
    }
}
