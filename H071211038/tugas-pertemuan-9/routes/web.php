<?php

use Illuminate\Support\Facades\Route;

// ELOQUENT
Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/category', 'indexUseEloquent');
    Route::post('/category/create', 'createUseEloquent');
    Route::patch('/category/update/{id}', ['as' => 'category.update', 'uses' => 'updateUseEloquent']);
    Route::delete('/category/delete/{id}', ['as' => 'category.delete', 'uses' => 'deleteUseEloquent']);
});
 
Route::controller(App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/product', 'indexUseEloquent');
    Route::post('/product/create', 'createUseEloquent');
    Route::patch('/product/update/{id}', ['as' => 'product.update', 'uses' => 'updateUseEloquent']);
    Route::delete('/product/delete/{id}', ['as' => 'product.delete', 'uses' => 'deleteUseEloquent']);
});

Route::controller(App\Http\Controllers\SellerController::class)->group(function () {
    Route::get('/', 'indexUseEloquent');
    Route::get('/seller', 'indexUseEloquent');
    Route::post('/seller/create', 'createUseEloquent');
    Route::patch('/seller/update/{id}', ['as' => 'seller.update', 'uses' => 'updateUseEloquent']);
    Route::delete('/seller/delete/{id}', ['as' => 'seller.delete', 'uses' => 'deleteUseEloquent']);
});

Route::controller(App\Http\Controllers\PermissionController::class)->group(function () {
    Route::get('/permission', 'indexUseEloquent');
    Route::post('/permission/create', 'createUseEloquent');
    Route::patch('/permission/update/{id}', ['as' => 'permission.update', 'uses' => 'updateUseEloquent']);
    Route::delete('/permission/delete/{id}', ['as' => 'permission.delete', 'uses' => 'deleteUseEloquent']);
});

Route::controller(App\Http\Controllers\SellerPermissionController::class)->group(function () {
    Route::get('/seller-permission', 'indexUseEloquent');
    Route::post('/seller-permission/create', 'createUseEloquent');
    Route::patch('/seller-permission/update/{id}', ['as' => 'seller-permission.update', 'uses' => 'updateUseEloquent']);
    Route::delete('/seller-permission/delete/{id}', ['as' => 'seller-permission.delete', 'uses' => 'deleteUseEloquent']);
});

// QUERY BUILDER
/*
Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/category', 'indexUseQueryBuilder');
    Route::post('/category/create', 'createUseQueryBuilder');
    Route::patch('/category/update/{id}', ['as' => 'category.update', 'uses' => 'updateUseQueryBuilder']);
    Route::delete('/category/delete/{id}', ['as' => 'category.delete', 'uses' => 'deleteUseQueryBuilder']);
});
 
Route::controller(App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/product', 'indexUseEloquent');
    Route::post('/product/create', 'createUseQueryBuilder');
    Route::patch('/product/update/{id}', ['as' => 'product.update', 'uses' => 'updateUseQueryBuilder']);
    Route::delete('/product/delete/{id}', ['as' => 'product.delete', 'uses' => 'deleteUseQueryBuilder']);
});

Route::controller(App\Http\Controllers\SellerController::class)->group(function () {
    Route::get('/seller', 'indexUseQueryBuilder');
    Route::get('/seller', 'indexUseQueryBuilder');
    Route::post('/seller/create', 'createUseQueryBuilder');
    Route::patch('/seller/update/{id}', ['as' => 'seller.update', 'uses' => 'updateUseQueryBuilder']);
    Route::delete('/seller/delete/{id}', ['as' => 'seller.delete', 'uses' => 'deleteUseQueryBuilder']);
});

Route::controller(App\Http\Controllers\PermissionController::class)->group(function () {
    Route::get('/permission', 'indexUseQueryBuilder');
    Route::post('/permission/create', 'createUseQueryBuilder');
    Route::patch('/permission/update/{id}', ['as' => 'permission.update', 'uses' => 'updateUseQueryBuilder']);
    Route::delete('/permission/delete/{id}', ['as' => 'permission.delete', 'uses' => 'deleteUseQueryBuilder']);
});

Route::controller(App\Http\Controllers\SellerPermissionController::class)->group(function () {
    Route::get('/seller-permission', 'indexUseQueryBuilder');
    Route::post('/seller-permission/create', 'createUseQueryBuilder');
    Route::patch('/seller-permission/update/{id}', ['as' => 'seller-permission.update', 'uses' => 'updateUseQueryBuilder']);
    Route::delete('/seller-permission/delete/{id}', ['as' => 'seller-permission.delete', 'uses' => 'deleteUseQueryBuilder']);
});
*/