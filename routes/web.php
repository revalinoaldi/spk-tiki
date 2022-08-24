<?php

use App\Http\Controllers\BobotNilaiController;
use App\Http\Controllers\JabatanController;
use App\Models\BobotNilai;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('layouts/home');
});


//Routes for Jabatan
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
