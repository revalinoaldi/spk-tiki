<?php

use App\Http\Controllers\JabatanController;
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

Route::get('/admin/jabatan', [JabatanController::class, 'index']);
Route::get('/admin/jabatan/input', [JabatanController::class, 'input']);
Route::post('/admin/jabatan/', [JabatanController::class, 'store']);
Route::get('/admin/jabatan/edit/{id}', [JabatanController::class, 'edit']);
Route::put('/admin/jabatan/{id}', [JabatanController::class, 'update']);
Route::get('/admin/jabatan/delete/{id}', [JabatanController::class, 'delete']);
Route::delete('/admin/jabatan/delete/{id}', [JabatanController::class, 'destroy']);

Route::view('/supervisor', 'dashboard',['name' => 'Dashboard Supervisor']);