<?php

use App\Http\Controllers\BobotNilaiController;
use App\Http\Controllers\DetailPenilaianController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KriteriaNilaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\UserController;
use App\Models\DetailPenilaian;
use App\Models\KriteriaNilai;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/',[LoginController::class,'auth']);
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth');


Route::middleware(['auth'])->group(function() {
    Route::get('/admin', function () {
        $data = [
            'countKaryawan' => User::where('jabatan_id', 4)->count(),
            'countPenilaian' => DetailPenilaian::count(),
            'countKriteria' => KriteriaNilai::count()
        ];
        return view('layouts/home', $data);
    });

    // Routes for Jabatan
    Route::get('/admin/jabatan', [JabatanController::class, 'index']);
    Route::get('/admin/jabatan/input', [JabatanController::class, 'input']);
    Route::post('/admin/jabatan/', [JabatanController::class, 'store']);
    Route::get('/admin/jabatan/edit/{slug}', [JabatanController::class, 'edit']);
    Route::put('/admin/jabatan/{slug}', [JabatanController::class, 'update']);
    Route::get('/admin/jabatan/delete/{slug}', [JabatanController::class, 'delete']);
    Route::delete('/admin/jabatan/delete/{slug}', [JabatanController::class, 'destroy']);

    //Routes for Bobot Nilai
    Route::get('/admin/bobot-nilai', [BobotNilaiController::class, 'index']);
    Route::get('/admin/bobot-nilai/input', [BobotNilaiController::class, 'input']);
    Route::post('/admin/bobot-nilai/', [BobotNilaiController::class, 'store']);
    Route::get('/admin/bobot-nilai/edit/{slug}', [BobotNilaiController::class, 'edit']);
    Route::put('/admin/bobot-nilai/{slug}', [BobotNilaiController::class, 'update']);
    Route::get('/admin/bobot-nilai/delete/{slug}', [BobotNilaiController::class, 'delete']);
    Route::delete('/admin/bobot-nilai/delete/{slug}', [BobotNilaiController::class, 'destroy']);

    //Routes for User
    Route::get('/admin/user', [UserController::class, 'index']);
    Route::get('/admin/user/input', [UserController::class, 'input']);
    Route::post('/admin/user/', [UserController::class, 'store']);
    Route::get('/admin/user/detail/{username}', [UserController::class, 'detail']);
    Route::get('/admin/user/edit/{username}', [UserController::class, 'edit']);
    Route::put('/admin/user/{username}', [UserController::class, 'update']);
    Route::get('/admin/user/delete/{username}', [UserController::class, 'delete']);
    Route::delete('/admin/user/delete/{username}', [UserController::class, 'destroy']);

    //Routes for Kriteria Nilai
    Route::get('/admin/kriteria-nilai', [KriteriaNilaiController::class, 'index']);
    Route::get('/admin/kriteria-nilai/input', [KriteriaNilaiController::class, 'input']);
    Route::post('/admin/kriteria-nilai/', [KriteriaNilaiController::class, 'store']);
    Route::get('/admin/kriteria-nilai/edit/{slug}', [KriteriaNilaiController::class, 'edit']);
    Route::put('/admin/kriteria-nilai/{slug}', [KriteriaNilaiController::class, 'update']);
    Route::get('/admin/kriteria-nilai/delete/{slug}', [KriteriaNilaiController::class, 'delete']);
    Route::delete('/admin/kriteria-nilai/delete/{slug}', [KriteriaNilaiController::class, 'destroy']);

    //Routes for Penilaian
    Route::get('/admin/penilaian', [PenilaianController::class, 'index']);
    Route::get('/admin/penilaian/input', [PenilaianController::class, 'input']);
    Route::post('/admin/penilaian/', [PenilaianController::class, 'store']);
    Route::get('/admin/penilaian/edit/{kode_penilaian}', [PenilaianController::class, 'edit']);
    Route::put('/admin/penilaian/{kode_penilaian}', [PenilaianController::class, 'update']);
    Route::get('/admin/penilaian/delete/{kode_penilaian}', [PenilaianController::class, 'delete']);
    Route::delete('/admin/penilaian/delete/{kode_penilaian}', [PenilaianController::class, 'destroy']);

    Route::get('/admin/penilaian/proses/{kode_penilaian}', [PenilaianController::class, 'penilaian']);
    Route::post('/admin/penilaian/proses/hitung', [PenilaianController::class, 'hasilpenilaian']);

    Route::get('/admin/penilaian/hasil/{kode_penilaian}', [DetailPenilaianController::class, 'index']);
    Route::get('/admin/penilaian/cetak/hasil/{kode_penilaian}', [DetailPenilaianController::class, 'cetak']);

});
