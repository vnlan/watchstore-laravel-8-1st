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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin/home');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::prefix('admin')->group(function () {
    //Category
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index']);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create']);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store']);
        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete']);
        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update']);
    });
    //Product
    Route::prefix('products')->group(function () {
        Route::get('/',[
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\ProductController@index']);
        Route::get('/create',[
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\ProductController@create']);
        Route::post('/store',[
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\ProductController@store']);
        Route::get('/edit/{id}',[
            'as' => 'products.edit',
            'uses' => 'App\Http\Controllers\ProductController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'products.delete',
            'uses' => 'App\Http\Controllers\ProductController@delete']);
        Route::post('/update/{id}',[
            'as' => 'products.update',
            'uses' => 'App\Http\Controllers\ProductController@update']);
    });
});
