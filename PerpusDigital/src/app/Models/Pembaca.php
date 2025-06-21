<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembaca extends Model
{
    use HasFactory;

    protected $table = 'pembaca'; 

    protected $fillable = ['nama', 'usia', 'gender', 'kelompok_usia'];
}
