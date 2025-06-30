<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Membuat tabel 'buku' di database.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id(); // Kolom ID utama (auto increment)
            $table->string('judul'); // Judul buku
            $table->string('penulis'); // Nama penulis
            $table->string('jenis_buku'); // Jenis atau kategori buku
            $table->year('tahun_terbit'); // Tahun terbit (4 digit)
            $table->string('platform'); // Platform tempat diterbitkan
            $table->date('tanggal_rilis'); // Tanggal rilis resmi
            $table->enum('status_akses', ['gratis', 'beli penuh']); // Akses buku
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Menghapus tabel jika rollback.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
