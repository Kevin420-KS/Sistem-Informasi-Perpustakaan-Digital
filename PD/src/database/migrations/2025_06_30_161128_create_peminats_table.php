<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminat', function (Blueprint $table) {
            $table->id();
            $table->integer('usia_min');
            $table->integer('usia_max');
            $table->string('kelompok_usia');
            $table->string('jenis_buku');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->integer('total_pembaca');
            $table->string('tingkat_minat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminat');
    }
};