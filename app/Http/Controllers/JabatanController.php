<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(){

        $jabatan = Jabatan::all();
        return view('jabatan/index', ['jabatanList' => $jabatan]);
    }

    public function input(){

        return view('jabatan/create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'jabatan' => 'required'
        ]);

        $slug = Str::slug($request->jabatan, '-');
        $jabatan = Jabatan::create([
            'jabatan' => $request->input('jabatan'),
            'slug' => $slug
        ]);

        if($jabatan){
            //redirect dengan pesan sukses
            return redirect('/admin/jabatan')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/jabatan')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'jabatan' => 'required'
        ]);

        $jabatan = Jabatan::where('slug', $slug)->first();
        $slug = Str::slug($request->jabatan, '-');
        $jabatan->update([
            'jabatan' => $request->input('jabatan'),
            'slug' => $slug
        ]);

        if($jabatan){
             //redirect dengan pesan sukses
             return redirect('/admin/jabatan')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/jabatan')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function edit($slug){
        
        $jabatan = Jabatan::where('slug', $slug)->first();   
        return view('jabatan/edit', ['jabatan' => $jabatan]);
    }

    public function delete($slug){

        $jabatan = Jabatan::where('slug', $slug)->first();
        return view('jabatan/delete', ['jabatan' => $jabatan]);
    }

    public function destroy($slug){

        $jabatan = Jabatan::where('slug', $slug)->first();
        $jabatan->delete();

        return redirect('/admin/jabatan')->with(['status' => 'Data Berhasil Dihapus!']);
    }


}
