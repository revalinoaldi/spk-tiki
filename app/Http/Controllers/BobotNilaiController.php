<?php

namespace App\Http\Controllers;

use App\Models\BobotNilai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BobotNilaiController extends Controller
{
    public function index(){

        $bobotnilai = BobotNilai::all();
        return view('bobot-nilai/index', ['bobotnilaiList' => $bobotnilai]);
    }

    public function input(){

        return view('bobot-nilai/create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'minNilai' => 'required',
            'grade' => 'required',
        ]);

        $slug = Str::slug($request->keterangan, '-');
        $bobotnilai = BobotNilai::create([
            'keterangan' => $request->input('keterangan'),
            'slug' => $slug,
            'minNilai' => $request->input('minNilai'),
            'grade' => $request->input('grade')
        ]);

        if($bobotnilai){
            //redirect dengan pesan sukses
            return redirect('/admin/bobot-nilai')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/bobot-nilai')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'keterangan' => 'required',
            'minNilai' => 'required',
            'grade' => 'required',
        ]);

        $bobotnilai = BobotNilai::where('slug', $slug)->first(); 
        $slug = Str::slug($request->keterangan, '-');
        $bobotnilai->update([
            'keterangan' => $request->input('keterangan'),
            'slug' => $slug,
            'minNilai' => $request->input('minNilai'),
            'grade' => $request->input('grade')
        ]);

        if($bobotnilai){
             //redirect dengan pesan sukses
             return redirect('/admin/bobot-nilai')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/bobot-nilai')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function edit($slug){
        
        $bobotnilai = BobotNilai::where('slug', $slug)->first();   
        return view('bobot-nilai/edit', ['bobotnilai' => $bobotnilai]);
    }

    public function delete($slug){

        $bobotnilai = BobotNilai::where('slug', $slug)->first();
        return view('bobot-nilai/delete', ['bobotnilai' => $bobotnilai]);
    }

    public function destroy($slug){

        $bobotnilai = BobotNilai::where('slug', $slug)->first();
        $bobotnilai->delete();

        return redirect('/admin/bobot-nilai')->with(['status' => 'Data Berhasil Dihapus!']);
    }
}
