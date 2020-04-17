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

// Rutas sin autenticacion
// Route::apiResources([
//     'opinions' => 'OpinionController',
//     'companies' => 'CompanyController'
// ]);

// index, store, show
Route::apiResource('companies', 'CompanyController')->middleware('auth:api');

// store
Route::post('opinions', 'OpinionController@store')->middleware('auth:api');

// show
Route::get('opinions/{user_id}', 'OpinionController@showByUserId')->middleware('auth:api');



