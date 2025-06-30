<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembaca extends Model
{
    use HasFactory;

    protected $table = 'pembaca';

    // Field yang bisa diisi massal
    protected $fillable = [
        'nama',
        'usia',
        'gender',
        'range_umur',
    ];

    /**
     * Mengatur range_umur secara otomatis setiap menyimpan data
     */
    protected static function booted()
    {
        static::saving(function ($pembaca) {
            $usia = $pembaca->usia;

            if ($usia >= 0 && $usia <= 9) {
                $pembaca->range_umur = 'Anak-anak';
            } elseif ($usia >= 10 && $usia <= 12) {
                $pembaca->range_umur = 'Praremaja';
            } elseif ($usia >= 13 && $usia <= 17) {
                $pembaca->range_umur = 'Remaja';
            } elseif ($usia >= 18 && $usia <= 40) {
                $pembaca->range_umur = 'Dewasa';
            } else {
                $pembaca->range_umur = 'Dewasa';
            }
        });
    }
}
