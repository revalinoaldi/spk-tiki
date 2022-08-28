<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    
    protected $fillable = ['kode_penilaian','periode_bulan','periode_tahun','title'];
}
