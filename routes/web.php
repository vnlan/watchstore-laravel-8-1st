<?php

use App\Http\Controllers\ShopProductController;
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
    return view('watch-shop/home');
});
Route::get('/admin', function () {
    return view('admin/home'); 
});


//Route for shop font
Route::prefix('/')->group(function () {
    //Category
    Route::prefix('products')->group(function () {
        Route::get('/',[
            'as' => 'shop.products.all',
            'uses' => 'App\Http\Controllers\ShopProductController@index']);
    });
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
    //Products
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
    //Products Company
    Route::prefix('product-company')->group(function () {
        Route::get('/',[
            'as' => 'product-company.index',
            'uses' => 'App\Http\Controllers\ProductCompanyController@index']);
        Route::get('/create',[
            'as' => 'product-company.create',
            'uses' => 'App\Http\Controllers\ProductCompanyController@create']);
        Route::post('/store',[
            'as' => 'product-company.store',
            'uses' => 'App\Http\Controllers\ProductCompanyController@store']);
        Route::get('/edit/{id}',[
            'as' => 'product-company.edit',
            'uses' => 'App\Http\Controllers\ProductCompanyController@edit']);
        Route::get('/delete/{id}',[
            'as' => 'product-company.delete',
            'uses' => 'App\Http\Controllers\ProductCompanyController@delete']);
        Route::post('/update/{id}',[
            'as' => 'product-company.update',
            'uses' => 'App\Http\Controllers\ProductCompanyController@update']);
    });

    
    
});




