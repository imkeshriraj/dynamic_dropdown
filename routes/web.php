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

Route::get('/index','dynamic_dropdown@index');


Route::get('getState/{country}','dynamic_dropdown@getState');

Route::get('getcity/{state}','dynamic_dropdown@getCity');

Route::post('/save','dynamic_dropdown@store');

Route::get('/show','dynamic_dropdown@show');


// Route::get('/join','dynamic_dropdown@join');

Route::get('/delete/{id}','dynamic_dropdown@destroy');


