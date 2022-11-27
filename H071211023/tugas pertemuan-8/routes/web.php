<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\tokobukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
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

Route::get('/tokobuku', [tokobukuController::class, 'index']);

Route::post('/tokobuku/add', [tokobukuController::class, 'store']);

Route::get('/tokobuku/delete/{id}', [tokobukuController::class, 'delete']);

Route::get('/tokobuku/edit/{id}', [tokobukuController::class, 'edit']);

Route::post('/tokobuku/update/{id}', [tokobukuController::class, 'update']);

Route::get('/register', [registerController::class, 'register']);
Route::post('/register', [registerController::class, 'validasi']);

Route::get('/login', [loginController::class, 'login']);
Route::post('/login', [loginController::class, 'autentikasi']);

Route::post('/logout', [loginController::class, 'logout']);
