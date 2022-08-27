<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['nama_user','username', 'email', 'alamat', 
    'no_telp', 'password', 'remember_token', 'jabatan_id', 'jenis_kelamin', 'status_karyawan', 'nik'];
 
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
