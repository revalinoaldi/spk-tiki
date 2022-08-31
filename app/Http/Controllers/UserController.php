<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $user = User::with('jabatan')->get();
        return view('user/index', ['userList' => $user]);
    }

    public function detail($username){
        
        $user = User::where('username', $username)->with('jabatan')->get();   
        return view('user/detail', ['user' => $user]);
    }

    public function input(){

        $jabatan = Jabatan::select('id', 'jabatan')->get();
        return view('user/create', ['jabatan' => $jabatan]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'status_karyawan' => 'required',
            'nik' => 'required'
        ]);

        $user = User::create([
            'nama_user' => $request->input('nama_user'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'password' => Hash::make($request->input('password')),
            'jabatan_id' => $request->input('jabatan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_karyawan' => $request->input('status_karyawan'),
            'nik' => $request->input('nik')
        ]);

        if($user){
            //redirect dengan pesan sukses
            return redirect('/admin/user')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/user')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $username)
    {
        $this->validate($request, [
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'status_karyawan' => 'required',
            'nik' => 'required'
        ]);

        $user = User::where('username', $username)->first(); 
        $user->update([
            'nama_user' => $request->input('nama_user'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'password' => Hash::make($request->input('password')),
            'jabatan_id' => $request->input('jabatan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status_karyawan' => $request->input('status_karyawan'),
            'nik' => $request->input('nik')
        ]);

        if($user){
             //redirect dengan pesan sukses
             return redirect('/admin/user')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/user')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function edit($username){
        
        $user = User::where('username', $username)->with('jabatan')->first();  
        $jabatan = Jabatan::where('id', '!=', $user->jabatan_id)->get(['id', 'jabatan']);   
        return view('user/edit', ['user' => $user, 'jabatan' => $jabatan]);
    }

    public function delete($username){

        $user = User::where('username', $username)->first();
        return view('user/delete', ['user' => $user]);
    }

    public function destroy($username){

        $user = User::where('username', $username)->first();
        $user->delete();

        return redirect('/admin/user')->with(['status' => 'Data Berhasil Dihapus!']);
    }
}
