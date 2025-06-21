<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $user->assignRole('super_admin');

        // Jalankan semua seeder lainnya
        $this->call([
            PembacaSeeder::class,
            BukuSeeder::class,
            PeminatSeeder::class,
        ]);
    }
}
