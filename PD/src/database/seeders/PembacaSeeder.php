<?php

namespace Database\Seeders;

use App\Models\Pembaca;
use Illuminate\Database\Seeder;

class PembacaSeeder extends Seeder
{
    public function run(): void
    {
        // Data pembaca untuk testing dan statistik
        $data = [
            ['nama' => 'Andi', 'usia' => 7, 'gender' => 'Laki-laki'],        // Anak-anak
            ['nama' => 'Sari', 'usia' => 10, 'gender' => 'Perempuan'],      // Praremaja
            ['nama' => 'Budi', 'usia' => 13, 'gender' => 'Laki-laki'],      // Remaja
            ['nama' => 'Rina', 'usia' => 17, 'gender' => 'Perempuan'],      // Remaja
            ['nama' => 'Rizky', 'usia' => 18, 'gender' => 'Laki-laki'],     // Dewasa
            ['nama' => 'Dewi', 'usia' => 22, 'gender' => 'Perempuan'],      // Dewasa
            ['nama' => 'Lala', 'usia' => 11, 'gender' => 'Perempuan'],      // Praremaja
            ['nama' => 'Dimas', 'usia' => 8, 'gender' => 'Laki-laki'],      // Anak-anak
            ['nama' => 'Heri', 'usia' => 35, 'gender' => 'Laki-laki'],      // Dewasa
            ['nama' => 'Intan', 'usia' => 40, 'gender' => 'Perempuan'],     // Dewasa
        ];

        // Simpan data ke database menggunakan create (agar trigger range_umur aktif)
        foreach ($data as $row) {
            Pembaca::create($row);
        }
    }
}
