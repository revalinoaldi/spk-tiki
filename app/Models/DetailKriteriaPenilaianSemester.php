<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKriteriaPenilaianSemester extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detailpenilaian()
    {
        return $this->hasMany(DetailPenilaian::class);
    }

    public function kriteria_nilai()
    {
        return $this->belongsTo(KriteriaNilai::class);
    }
}
