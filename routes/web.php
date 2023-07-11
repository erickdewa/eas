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

Route::get('/', [ 'as' => 'index', 'uses' => 'PageController@index' ]);

Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function() {
    Route::get('/', [ 'as' => 'index', 'uses' => 'MahasiswaController@index' ]);
    Route::get('/create', [ 'as' => 'create', 'uses' => 'MahasiswaController@create' ]);
    Route::post('/store', [ 'as' => 'store', 'uses' => 'MahasiswaController@store' ]);
    Route::get('/edit/{id}', [ 'as' => 'edit', 'uses' => 'MahasiswaController@edit' ]);
    Route::match(['PUT', 'CATCH'], '/update/{id}', [ 'as' => 'update', 'uses' => 'MahasiswaController@update' ]);
    Route::delete('/destroy/{id}', [ 'as' => 'destroy', 'uses' => 'MahasiswaController@destroy' ]);
});

Route::group(['prefix' => 'matakuliah', 'as' => 'matakuliah.'], function() {
    Route::get('/', [ 'as' => 'index', 'uses' => 'MataKuliahController@index' ]);
    Route::get('/create', [ 'as' => 'create', 'uses' => 'MataKuliahController@create' ]);
    Route::post('/store', [ 'as' => 'store', 'uses' => 'MataKuliahController@store' ]);
    Route::get('/edit/{id}', [ 'as' => 'edit', 'uses' => 'MataKuliahController@edit' ]);
    Route::match(['PUT', 'CATCH'], '/update/{id}', [ 'as' => 'update', 'uses' => 'MataKuliahController@update' ]);
    Route::delete('/destroy/{id}', [ 'as' => 'destroy', 'uses' => 'MataKuliahController@destroy' ]);
});

Route::group(['prefix' => 'nilai', 'as' => 'nilai.'], function() {
    Route::get('/', [ 'as' => 'index', 'uses' => 'NilaiController@index' ]);
    Route::post('/export', [ 'as' => 'export', 'uses' => 'NilaiController@export' ]);
    Route::get('/create', [ 'as' => 'create', 'uses' => 'NilaiController@create' ]);
    Route::post('/store', [ 'as' => 'store', 'uses' => 'NilaiController@store' ]);
    Route::get('/edit/{id}', [ 'as' => 'edit', 'uses' => 'NilaiController@edit' ]);
    Route::match(['PUT', 'CATCH'], '/update/{id}', [ 'as' => 'update', 'uses' => 'NilaiController@update' ]);
    Route::delete('/destroy/{id}', [ 'as' => 'destroy', 'uses' => 'NilaiController@destroy' ]);
});