<?php

namespace Database\Seeders;

use App\Models\Pembaca;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PembacaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            // Anak-anak (6–9)
            ['nama' => 'Andi', 'usia' => 7, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Budi', 'usia' => 8, 'gender' => 'Laki-laki', 'status' => 'tidak aktif'],
            ['nama' => 'Fahri', 'usia' => 9, 'gender' => 'Laki-laki', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(6)],
            ['nama' => 'Rizky', 'usia' => 6, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Yoga', 'usia' => 8, 'gender' => 'Laki-laki', 'status' => 'tidak aktif'],
            ['nama' => 'Sari', 'usia' => 7, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Lina', 'usia' => 6, 'gender' => 'Perempuan', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(7)],
            ['nama' => 'Nina', 'usia' => 9, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Putri', 'usia' => 8, 'gender' => 'Perempuan', 'status' => 'tidak aktif'],
            ['nama' => 'Rara', 'usia' => 6, 'gender' => 'Perempuan', 'status' => 'aktif'],

            // Praremaja (10–12)
            ['nama' => 'Dimas', 'usia' => 10, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Reza', 'usia' => 11, 'gender' => 'Laki-laki', 'status' => 'tidak aktif'],
            ['nama' => 'Ilham', 'usia' => 12, 'gender' => 'Laki-laki', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(5)],
            ['nama' => 'Tomi', 'usia' => 11, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Johan', 'usia' => 10, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Nadya', 'usia' => 12, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Rani', 'usia' => 10, 'gender' => 'Perempuan', 'status' => 'tidak aktif'],
            ['nama' => 'Salsa', 'usia' => 11, 'gender' => 'Perempuan', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(9)],
            ['nama' => 'Vina', 'usia' => 12, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Mega', 'usia' => 10, 'gender' => 'Perempuan', 'status' => 'aktif'],

            // Remaja (13–17)
            ['nama' => 'Arif', 'usia' => 13, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Bayu', 'usia' => 15, 'gender' => 'Laki-laki', 'status' => 'tidak aktif'],
            ['nama' => 'Hendra', 'usia' => 17, 'gender' => 'Laki-laki', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(10)],
            ['nama' => 'Fikri', 'usia' => 14, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Galang', 'usia' => 16, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Dewi', 'usia' => 13, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Maya', 'usia' => 14, 'gender' => 'Perempuan', 'status' => 'tidak aktif'],
            ['nama' => 'Sinta', 'usia' => 17, 'gender' => 'Perempuan', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(8)],
            ['nama' => 'Wulan', 'usia' => 15, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Citra', 'usia' => 16, 'gender' => 'Perempuan', 'status' => 'aktif'],

            // Dewasa (18–40)
            ['nama' => 'Taufik', 'usia' => 25, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Roni', 'usia' => 32, 'gender' => 'Laki-laki', 'status' => 'tidak aktif'],
            ['nama' => 'Imam', 'usia' => 28, 'gender' => 'Laki-laki', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(11)],
            ['nama' => 'Agus', 'usia' => 38, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Zaki', 'usia' => 29, 'gender' => 'Laki-laki', 'status' => 'aktif'],
            ['nama' => 'Linda', 'usia' => 26, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Yuni', 'usia' => 31, 'gender' => 'Perempuan', 'status' => 'tidak aktif'],
            ['nama' => 'Tari', 'usia' => 35, 'gender' => 'Perempuan', 'status' => 'keluar', 'tanggal_keluar' => Carbon::now()->subMonths(12)],
            ['nama' => 'Melati', 'usia' => 28, 'gender' => 'Perempuan', 'status' => 'aktif'],
            ['nama' => 'Kartika', 'usia' => 30, 'gender' => 'Perempuan', 'status' => 'aktif'],
        ];

        foreach ($data as $item) {
            $tanggalKeluar = $item['tanggal_keluar'] ?? null;

            if ($tanggalKeluar) {
                $createdAt = Carbon::parse($tanggalKeluar)->copy()->subMonth();
                Pembaca::create(array_merge($item, [
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]));
            } else {
                Pembaca::create($item);
            }
        }
    }
}
