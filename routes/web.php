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
    return view('layouts\app');
});

Auth::routes();

Route::get('/list', 'App\Http\Controllers\ProductoController@index');

Route::post('/registro', 'App\Http\Controllers\ProductoController@registro');
Route::post('/edicion', 'App\Http\Controllers\ProductoController@editar');
Route::post('/producto', 'App\Http\Controllers\ProductoController@getProducto');
Route::get('/borrar/{id}', 'App\Http\Controllers\ProductoController@deletProducto');