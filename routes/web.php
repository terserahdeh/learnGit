<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
    return view('welco me');
});

Route::get('/Mahasiswa', [MahasiswaController::class, 'index']) -> name('Mahasiswa.index'); 
Route::get('/Mahasiswa/create', [MahasiswaController::class, 'create']) -> name('Mahasiswa.create'); 
Route::post('/Mahasiswa', [MahasiswaController::class, 'store']) -> name('Mahasiswa.store'); 
Route::get ('/Mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit']) -> name('Mahasiswa.edit'); 
Route::put ('/Mahasiswa/{mahasiswa}/update', [MahasiswaController::class, 'update']) -> name('Mahasiswa.update'); 
Route::delete ('/Mahasiswa/{mahasiswa}/delete', [MahasiswaController::class, 'delete']) -> name('Mahasiswa.delete'); 
