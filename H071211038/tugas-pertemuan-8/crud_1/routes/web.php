<?php

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

Route::controller(App\Http\Controllers\MemberController::class)->group(function () {
    Route::get('/', 'index');
    // Route::get('/', 'show');
    Route::post('/create', 'create');
    Route::patch('/update/{id}', ['as' => 'member.update', 'uses' => 'update']);
    Route::delete('/delete/{id}', ['as' => 'member.delete', 'uses' => 'delete']);
});