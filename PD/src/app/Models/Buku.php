<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan model ini
    protected $table = 'buku';

    // Kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'judul',
        'penulis',
        'jenis_buku',
        'tahun_terbit',
        'platform',
        'tanggal_rilis',
        'status_akses',
    ];
}
