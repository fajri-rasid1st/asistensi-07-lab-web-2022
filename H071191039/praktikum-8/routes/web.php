<?php

use App\Http\Controllers\MahasiswaController;
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


Route::get('/', [MahasiswaController::class, 'index']);
Route::post('/', [MahasiswaController::class, 'store']);

// Route::get('/add', [MahasiswaController::class, 'create']);
Route::get('/add/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/add/update/{id}', [MahasiswaController::class, 'update']);

Route::get('/add/delete/{id}', [MahasiswaController::class, 'destroy']);
