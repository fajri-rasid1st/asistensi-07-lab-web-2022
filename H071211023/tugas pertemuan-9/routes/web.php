<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SellerPermissionController;
use App\Models\seller;

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
  return view('seller', [
    "title" => "Data Seller",
    "data" => seller::orderBy('updated_at', 'desc')->paginate(10)
  ]);
});

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/add', [ProductController::class, 'store']);
Route::post('/product/update/{id}', [ProductController::class, 'update']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);


Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/add', [CategoryController::class, 'store']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);


Route::get('/seller', [SellerController::class, 'index']);
Route::post('/seller/add', [SellerController::class, 'store']);
Route::post('/seller/update/{id}', [SellerController::class, 'update']);
Route::get('/seller/delete/{id}', [SellerController::class, 'delete']);


Route::get('/permission', [PermissionController::class, 'index']);
Route::post('/permission/add', [PermissionController::class, 'store']);
Route::post('/permission/update/{id}', [PermissionController::class, 'update']);
Route::get('/permission/delete/{id}', [PermissionController::class, 'delete']);


Route::get('/seller_permission', [SellerPermissionController::class, 'index']);
Route::post('/seller_permission/add', [SellerPermissionController::class, 'store']);
Route::post('/seller_permission/update/{id}', [SellerPermissionController::class, 'update']);
Route::get('/seller_permission/delete/{id}', [SellerPermissionController::class, 'delete']);
