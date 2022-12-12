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



Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa');
// Route::get('/tambahmahasiswa', [MahasiswaController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');
Route::post('/insertdata', [MahasiswaController::class, 'insertdata']);
// Route::get('/tampilkandata/{id}', [MahasiswaController::class, 'tampilkandata'])->name('tampilkandata');
Route::put('/updatedata/{id}', [MahasiswaController::class, 'updatedata']);
Route::get('/delete/{id}', [MahasiswaController::class, 'delete']);
