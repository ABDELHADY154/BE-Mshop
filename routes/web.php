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


// Route::get('/', function () {
//     return redirect(route('admin.dashboard'));
// });

// Route::get('/', function () {
//     if (isset(Auth::guard('clients')->user()->name)) {
//         return 'welcome ' . Auth::guard('clients')->user()->name;
//     } else {
//         return redirect(route('admin.dashboard'));
//     }
// })->name('front-index');
Route::group(['prefix' => '/', 'as' => 'home.'], function () {
    Route::resource('/', 'FrontController');
});

// Route::get('/', 'FrontController@index')->name('front-index');

Route::get('client/logout', 'FrontController@logout')->name('client-logout');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'DashboardController')->name('dashboard');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/products', 'ProductController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/clients', 'ClientController');
    Route::resource('/users', 'UserController');

    // Route::get('/clients', 'ClientController@getClients')->name('getClients');
});

Auth::routes();
Route::get('/{product}', 'FrontController@show')->name('front.show');


//clients routes


Route::get('clients/register', "Auth\RegisterController@clientRegisterForm")->name('client-register-form');
Route::post('clients/register', "Auth\RegisterController@registerClient")->name('register-client');

Route::get('clients/login', "Auth\LoginController@clientloginForm")->name('client-login-form');
Route::post('clients/login', "Auth\LoginController@loginClient")->name('login-client');
