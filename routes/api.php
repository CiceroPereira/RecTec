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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->name('api.')->group(function() {  
    Route::post('/login', 'UserController@login')->name('login_user');
});

Route::middleware('auth.basic')->namespace('api')->name('api.')->group(function() {
    Route::post('/register', 'UserController@store')->name('register_user');
    
    Route::get('/pluviometria', 'PluviometriaController@index')->name('index_pluviometrias');
    Route::get('/pluviometria/{id}', 'PluviometriaController@show')->name('single_pluviometria');
    Route::post('/pluviometria', 'PluviometriaController@store')->name('store_pluviometria'); 
    Route::put('/pluviometria/{id}', 'PluviometriaController@update')->name('update_pluviometria');
    Route::delete('/pluviometria/{id}', 'PluviometriaController@delete')->name('delete_pluviometria');

    Route::get('/pluviometro', 'PluviometroController@index')->name('index_pluviometro');
    Route::post('/pluviometro', 'PluviometroController@store')->name('store_pluviometro');

    Route::get('/modelo', 'ModeloController@index')->name('index_modelo');
    Route::post('/modelo', 'ModeloController@store')->name('store_modelo');
});