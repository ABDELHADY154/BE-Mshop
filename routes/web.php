<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




Route::group(['prefix' => '/', 'as' => 'home.'], function () {
    Route::resource('/', 'FrontController');
});


Auth::routes();

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/products', 'ProductController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/clients', 'ClientController');
    Route::resource('/users', 'UserController');
    Route::resource('/inventories', 'InventoryController');
    Route::get('image-upload', 'ProductController@imageUpload')->name('image.upload');
    Route::post('image-upload', 'ProductController@imageUploadPost')->name('image.upload.post');
});

Route::get('/{product}', 'FrontController@show')->name('front.show');


//clients routes


Route::get('clients/register', "Auth\RegisterController@clientRegisterForm")->name('client-register-form');
Route::post('clients/register', "Auth\RegisterController@registerClient")->name('register-client');

Route::get('clients/login', "Auth\LoginController@clientloginForm")->name('client-login-form');
Route::post('clients/login', "Auth\LoginController@loginClient")->name('login-client');
Route::get('client/logout', 'Auth\LoginController@logout')->name('client-logout');
