<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $fillable = ['nama_user','username', 'email', 'alamat',
    // 'no_telp', 'password', 'remember_token', 'jabatan_id', 'jenis_kelamin', 'status_karyawan', 'nik'];

    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function detailpenilaian()
    {
        return $this->hasMany(DetailPenilaian::class);
    }
}
