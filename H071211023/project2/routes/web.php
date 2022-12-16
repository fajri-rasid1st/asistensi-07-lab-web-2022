<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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
    return view('FrontEnd.master');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('Is_admin');
});


Route::get('/', [FrontEndController::class, "index"]);
Route::get('/redirects', [FrontEndController::class, "redirects"])->middleware('auth');


Route::resource('/dashboard/categories', CategoryController::class)->middleware('Is_admin');


Route::resource('/dashboard/foods', FoodController::class)->middleware('Is_admin');
Route::resource('/dashboard/orders', OrderController::class)->middleware('Is_admin');
Route::resource('/dashboard/tags', TagController::class)->middleware('Is_admin');

Route::resource('/dashboard/users', UserController::class)->middleware('Is_admin');

Route::get('/dashboard/foods/checkSlug', [FoodController::class, 'checkSlug'])->middleware('auth');