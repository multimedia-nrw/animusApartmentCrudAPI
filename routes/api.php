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

// Get the list of all the apartments
Route::get('apartments', 'Api\ApartmentsController@index');

// Get the information about one apartment based on the token
Route::get('apartment/{access_token}', 'Api\ApartmentsController@show');

// Delete one apartment based on the token
Route::get('apartment/delete/{access_token}', 'Api\ApartmentsController@destroy');

// Store New Apartment
Route::post('apartment/store', 'Api\ApartmentsController@store');

// Update Existing Apartment Based on Token
Route::post('apartment/update/{access_token}', 'Api\ApartmentsController@update');
