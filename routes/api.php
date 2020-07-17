<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/clients', 'API\V1\ClientController@index');
Route::get('/clients/{client}', 'API\V1\ClientController@show');
Route::get('/products', 'API\V1\ProductController@index');
Route::get('/products/{product}', 'API\V1\ProductController@show');

Route::post('/clientsCreate', 'ClientController@store');
