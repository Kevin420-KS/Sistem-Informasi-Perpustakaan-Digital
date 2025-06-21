<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'jenis_buku',
        'tahun_terbit',
        'platform',
        'tanggal_rilis',
        'status_akses'
    ];
}
