<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat role super_admin jika belum ada
        Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);

        // Buat user admin
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        // Assign role ke user
        $user->assignRole('super_admin');

        // Jalankan semua seeder lainnya
        $this->call([
            PembacaSeeder::class,
            BukuSeeder::class,
            PeminatSeeder::class,
        ]);
    }
}
