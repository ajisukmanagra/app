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
Route::get('/add', 'ArtikelController@add');
Route::get('/', 'ArtikelController@show');
Route::post('/add_process', 'ArtikelController@add_process');
Route::get('/detail/{id}', 'ArtikelController@detail');
Route::get('/admin', 'ArtikelController@show_by_admin');
Route::get('/edit/{id}', 'ArtikelController@edit');
Route::post('/edit_process', 'ArtikelController@edit_process');
Route::get('/delete/{id}', 'ArtikelController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
