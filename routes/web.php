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

Auth::routes();

// Al desloguearse el usuario, se llama a una funcion logout sobreescrita
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Al loguearse el usuario, primiero se dirige a este controllador
Route::get('/mis_opiniones', 'HomeController@index')->name('mis_opiniones');