<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(){

        $penilaian = Penilaian::all();
        return view('penilaian/index', ['penilaianList' => $penilaian]);
    }

    public function input(){

        return view('penilaian/create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'title' => 'required',
            'periode_bulan' => 'required',
            'periode_tahun' => 'required',
        ]);

        $penilaian = Penilaian::create([
            'kode_penilaian' => $request->input('kode'),
            'periode_bulan' => $request->input('periode_bulan'),
            'periode_tahun' => $request->input('periode_tahun'),
            'title' => $request->input('title')
        ]);

        if($penilaian){
            //redirect dengan pesan sukses
            return redirect('/admin/penilaian')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/penilaian')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $kode_penilaian)
    {
        $this->validate($request, [
            'kode' => 'required',
            'title' => 'required',
            'periode_bulan' => 'required',
            'periode_tahun' => 'required',
        ]);

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        $penilaian->update([
            'kode_penilaian' => $request->input('kode'),
            'periode_bulan' => $request->input('periode_bulan'),
            'periode_tahun' => $request->input('periode_tahun'),
            'title' => $request->input('title')
        ]);

        if($penilaian){
             //redirect dengan pesan sukses
             return redirect('/admin/penilaian')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/penilaian')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function edit($kode_penilaian){
        
        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();   
        return view('penilaian/edit', ['penilaian' => $penilaian]);
    }

    public function delete($kode_penilaian){

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        return view('penilaian/delete', ['penilaian' => $penilaian]);
    }

    public function destroy($kode_penilaian){

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        $penilaian->delete();

        return redirect('/admin/penilaian')->with(['status' => 'Data Berhasil Dihapus!']);
    }
}
