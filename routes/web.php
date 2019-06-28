<?php

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


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::post('/pluvimetria', 'PluviometriaController@store');
	Route::get('/listar', 'PluviometriaController@index');
	Route::get('/listarr', 'PluviometriaController@indexx');
	Route::get('/configurar', 'PluviometriaController@showConfig');
	Route::post('/configurar/insert', 'PluviometriaController@config');
	Route::delete('listar/delete/{id}', 'PluviometriaController@destroy');
	Route::get('/edit/{id}' , 'PluviometriaController@edit');
	Route::put('/edit/{id}' , 'PluviometriaController@edit');
	Route::put('/edit/{id}' , 'PluviometriaController@update');
	Route::get('/getnomes', 'PluviometriaController@buscaUser');
	Route::post('/getnomes', 'PluviometriaController@buscaUser');
	Route::get('/getdatas', 'PluviometriaController@buscaIntervalo');
	Route::post('/getdatas', 'PluviometriaController@buscaIntervalo');
	Route::get('/gettipo', 'PluviometriaController@buscaTipo');
	Route::post('/gettipo', 'PluviometriaController@buscaTipo');
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/dashboard/interval', 'DashboardController@showByDate');
 });

	Route::get('/api/index', 'api\ApiController@index');
	Route::get('/api/show/{id}', 'api\ApiController@show');
	Route::get('/api/destroy/{id}', 'api\ApiController@destroy');
	Route::post('/api/store', 'api\ApiController@store');
	Route::get('/api/hora', 'api\ApiController@getHour');
	Route::get('/api/pluviometros', 'api\ApiController@allPluviometers');
	Route::get('/api/getmea/{id}', 'api\ApiController@getMedByPluvId');
