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

Route::get('/', 'MuseuController@index')->name('home');

Route::get('/emigrantes', 'EmigranteController@index')->name('emigrantesIndex');
Route::get('/emigrantes/{emigrante}', 'EmigranteController@show')->name('emigrantesShow');

Route::get('/processo/{processo}', 'ProcessoController@show')->name('processo');

Route::get('/xml/{filename}', 'XmlController@convertXML');