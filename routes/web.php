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
        Route::get('/detail/{id}',[
            'as' => 'shop.products.detail',
            'uses' => 'App\Http\Controllers\ShopProductController@detail']);
    });
    Route::prefix('cart')->group(function () {
        Route::get('/',[
            'as' => 'shop.cart.index',
            'uses' => 'App\Http\Controllers\CartController@index']);
        Route::get('/add/{id}',[
            'as' => 'shop.cart.add',
            'uses' => 'App\Http\Controllers\CartController@add']);
        Route::get('/delete/{rowId}',[
            'as' => 'shop.cart.delete',
            'uses' => 'App\Http\Controllers\CartController@delete']);
    });
    Route::prefix('checkout')->group(function () {
        Route::get('/',[
            'as' => 'shop.checkout.index',
            'uses' => 'App\Http\Controllers\CheckoutController@index']);
        Route::post('/add-not-registered-order',[
            'as' => 'shop.checkout.add-nr-order',
            'uses' => 'App\Http\Controllers\CheckoutController@addNotRegisteredOrder']);
    });
       
});




Route::group(['prefix' => 'laravel-filemanager', 'middleware' ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::prefix('admin')->group(function () {
    // Đăng nhập và xử lý đăng nhập
    Route::get('login', [ 'as' => 'admin.auth.login', 'uses' => 'App\Http\Controllers\Auth\LoginController@getLogin']);
    Route::post('login', [ 'as' => 'admin.auth.login', 'uses' => 'App\Http\Controllers\Auth\LoginController@postLogin']);
    
    // Đăng xuất
    Route::get('logout', [ 'as' => 'admin.auth.logout', 'uses' => 'App\Http\Controllers\Auth\LogoutController@getLogout']);
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

        //User route
        Route::prefix('users')->group( function () {
            Route::get('/',[
                'as' => 'users.index',
                'uses' => 'App\Http\Controllers\UserController@index']);
            Route::get('/create',[
                'as' => 'users.create',
                'uses' => 'App\Http\Controllers\UserController@create']);
            Route::post('/store',[
                'as' => 'users.store',
                'uses' => 'App\Http\Controllers\UserController@store']);
            Route::get('/edit/{id}',[
                'as' => 'users.edit',
                'uses' => 'App\Http\Controllers\UserController@edit']);
            Route::get('/delete/{id}',[
                'as' => 'users.delete',
                'uses' => 'App\Http\Controllers\UserController@delete']);
            Route::post('/update/{id}',[
                'as' => 'users.update',
                'uses' => 'App\Http\Controllers\UserController@update']);
        });
        Route::prefix('roles')->group( function () {
            Route::get('/',[
                'as' => 'roles.index',
                'uses' => 'App\Http\Controllers\RoleController@index']);
            Route::get('/create',[
                'as' => 'roles.create',
                'uses' => 'App\Http\Controllers\RoleController@create']);
            Route::post('/store',[
                'as' => 'roles.store',
                'uses' => 'App\Http\Controllers\RoleController@store']);
            Route::get('/edit/{id}',[
                'as' => 'roles.edit',
                'uses' => 'App\Http\Controllers\RoleController@edit']);
            Route::get('/delete/{id}',[
                'as' => 'roles.delete',
                'uses' => 'App\Http\Controllers\RoleController@delete']);
            Route::post('/update/{id}',[
                'as' => 'roles.update',
                'uses' => 'App\Http\Controllers\RoleController@update']);
                Route::get('/test',[
                    'as' => 'roles.test',
                    'uses' => 'App\Http\Controllers\RoleController@test']);
        });
        Route::prefix('orders-not-registered')->group(function () {
            Route::get('/',[
                'as' => 'orders-not-registered.all',
                'uses' => 'App\Http\Controllers\OrderController@allNROrders']);
            // Route::get('/create',[
            //     'as' => 'orders-not-registered.create',
            //     'uses' => 'App\Http\Controllers\ProductCompanyController@create']);
            // Route::post('/store',[
            //     'as' => 'product-company.store',
            //     'uses' => 'App\Http\Controllers\ProductCompanyController@store']);
            Route::get('/edit/{id}',[
                'as' => 'orders-not-registered.edit',
                'uses' => 'App\Http\Controllers\OrderController@editNROrder']);
            Route::get('/delete/{id}',[
                'as' => 'orders-not-registered.delete',
                'uses' => 'App\Http\Controllers\OrderController@deleteNROrder']);
            Route::post('/update/{id}',[
                'as' => 'orders-not-registered.update',
                'uses' => 'App\Http\Controllers\OrderController@updateNROrder']);
            Route::get('/check/{id}',[
                'as' => 'orders-not-registered.check',
                'uses' => 'App\Http\Controllers\OrderController@checkNROrder']);
            Route::get('/deny/{id}',[
                'as' => 'orders-not-registered.deny',
                'uses' => 'App\Http\Controllers\OrderController@denyNROrder']);
        });
    
});




