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

        $jabatan = Jabatan::all();
        return view('jabatan/create', ['jabatanList' => $jabatan]);
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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jabatan' => 'required'
        ]);

        $slug = Str::slug($request->jabatan, '-');
        $jabatan = Jabatan::findOrFail($id);
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

    public function edit(Request $request, $id){

        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan/edit', ['jabatan' => $jabatan]);
    }

    public function delete($id){

        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan/delete', ['jabatan' => $jabatan]);
    }

    public function destroy($id){

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect('/admin/jabatan')->with(['status' => 'Data Berhasil Dihapus!']);
    }


}
