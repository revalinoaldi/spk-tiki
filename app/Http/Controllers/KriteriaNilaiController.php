<?php

namespace App\Http\Controllers;

use App\Models\KriteriaNilai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KriteriaNilaiController extends Controller
{
    public function index(){

        $kriterianilai = KriteriaNilai::all();
        return view('kriteria-nilai/index', ['kriterianilaiList' => $kriterianilai]);
    }

    public function input(){

        return view('kriteria-nilai/create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'keterangan' => 'required',
            'bobot' => 'required',
            'target' => 'required',
            'deskripsi' => 'required',
        ]);

        $slug = Str::slug($request->keterangan, '-');
        $bobotInFloat = $request->bobot/100;
        $kriterianilai = KriteriaNilai::create([
            'kode' => $request->input('kode'),
            'keterangan' => $request->input('keterangan'),
            'slug' => $slug,
            'bobot' => $request->input('bobot'),
            'bobotInFloat' => $bobotInFloat,
            'target' => $request->input('target'),
            'deskripsi' => $request->input('deskripsi')
        ]);

        if($kriterianilai){
            //redirect dengan pesan sukses
            return redirect('/admin/kriteria-nilai')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/kriteria-nilai')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'kode' => 'required',
            'keterangan' => 'required',
            'bobot' => 'required',
            'target' => 'required',
            'deskripsi' => 'required',
        ]);

        $kriterianilai = KriteriaNilai::where('slug', $slug)->first(); 
        $slug = Str::slug($request->keterangan, '-');
        $bobotInFloat = $request->bobot/100;
        $kriterianilai->update([
            'kode' => $request->input('kode'),
            'keterangan' => $request->input('keterangan'),
            'slug' => $slug,
            'bobot' => $request->input('bobot'),
            'bobotInFloat' => $bobotInFloat,
            'target' => $request->input('target'),
            'deskripsi' => $request->input('deskripsi')
        ]);

        if($kriterianilai){
             //redirect dengan pesan sukses
             return redirect('/admin/kriteria-nilai')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/kriteria-nilai')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function edit($slug){
        
        $kriterianilai = KriteriaNilai::where('slug', $slug)->first();   
        return view('kriteria-nilai/edit', ['kriterianilai' => $kriterianilai]);
    }

    public function delete($slug){

        $kriterianilai = KriteriaNilai::where('slug', $slug)->first();
        return view('kriteria-nilai/delete', ['kriterianilai' => $kriterianilai]);
    }

    public function destroy($slug){

        $kriterianilai = KriteriaNilai::where('slug', $slug)->first();
        $kriterianilai->delete();

        return redirect('/admin/kriteria-nilai')->with(['status' => 'Data Berhasil Dihapus!']);
    }
}
