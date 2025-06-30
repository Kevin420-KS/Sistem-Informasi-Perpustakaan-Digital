<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminat extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'peminat';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'usia_min',
        'usia_max',
        'kelompok_usia',
        'jenis_buku',
        'laki_laki',
        'perempuan',
        'total_pembaca',
        'tingkat_minat',
    ];
}
