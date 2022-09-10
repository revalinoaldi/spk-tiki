<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaian;
use App\Models\Penilaian;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PDF;

class DetailPenilaianController extends Controller
{
    public function index($kode_penilaian){

        $penilaian = DetailPenilaian::whereHas('penilaian', function(Builder $query) use($kode_penilaian){
            $query->where('kode_penilaian', $kode_penilaian);
        })->orderBy('total_final_nilai', 'desc')->get();
        return view('laporan/penilaian', [
            'list' => $penilaian,
            'kode' => $kode_penilaian
        ]);
    }

    public function cetak($kode_penilaian)
    {
        $detail = DetailPenilaian::whereHas('penilaian', function(Builder $query) use($kode_penilaian){
            $query->where('kode_penilaian', $kode_penilaian);
        })->orderBy('total_final_nilai', 'desc')->get();

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();

        $data = PDF::loadview('laporan/cetak', [
            'penilaian' => $penilaian,
            'detail' => $detail,
        ]);
        //mendownload laporan.pdf
    	return $data->download('laporan_hasil_penilaian_karyawan.pdf');
    }
}
