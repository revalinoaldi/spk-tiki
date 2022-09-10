<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailkriteriapenilaiansemester()
    {
        return $this->hasMany(DetailKriteriaPenilaianSemester::class);
    }
}
