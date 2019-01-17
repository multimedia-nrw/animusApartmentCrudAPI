<?php

use Illuminate\Http\Request;

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

Route::get('apartments', 'Api\ApartmentsController@index');
Route::get('apartment/{access_token}', 'Api\ApartmentsController@show');
Route::get('apartment/delete/{access_token}', 'Api\ApartmentsController@destroy');

Route::post('apartment/store', 'Api\ApartmentsController@store');
Route::post('apartment/update/{access_token}', 'Api\ApartmentsController@update');
