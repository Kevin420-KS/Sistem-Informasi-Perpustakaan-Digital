<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembaca', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nama');
            $table->integer('usia');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('range_umur');
            $table->enum('status', ['aktif', 'tidak aktif', 'keluar'])->default('aktif');
            $table->date('tanggal_keluar')->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembaca');
    }
};
