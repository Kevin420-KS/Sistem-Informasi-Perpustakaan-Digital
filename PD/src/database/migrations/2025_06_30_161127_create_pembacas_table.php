<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembaca', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nama'); // nama pembaca
            $table->integer('usia'); // usia
            $table->enum('gender', ['Laki-laki', 'Perempuan']); // jenis kelamin
            $table->string('range_umur'); // kategori umur
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembaca');
    }
};
