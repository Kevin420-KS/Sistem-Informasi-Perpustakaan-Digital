<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminat extends Model
{
    use HasFactory;

    protected $table = 'peminat';

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