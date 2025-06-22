<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembaca extends Model
{
    use HasFactory;

    protected $table = 'pembaca';

    protected $fillable = [
        'nama',
        'usia',
        'gender',
        'kelompok_usia',
    ];

    protected static function booted()
    {
        static::saving(function ($pembaca) {
            $usia = $pembaca->usia;

            if ($usia <= 12) {
                $pembaca->kelompok_usia = '0-12';
            } elseif ($usia <= 17) {
                $pembaca->kelompok_usia = '13-17';
            } elseif ($usia <= 25) {
                $pembaca->kelompok_usia = '18-25';
            } elseif ($usia <= 35) {
                $pembaca->kelompok_usia = '26-35';
            } elseif ($usia <= 50) {
                $pembaca->kelompok_usia = '36-50';
            } else {
                $pembaca->kelompok_usia = '51+';
            }
        });
    }
}
