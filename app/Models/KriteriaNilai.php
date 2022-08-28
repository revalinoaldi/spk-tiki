<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaNilai extends Model
{
    use HasFactory;

    protected $fillable = ['kode','keterangan','slug','bobot','bobotInFloat','target','deskripsi'];
}
