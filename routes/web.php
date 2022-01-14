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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mascotas','PetController@index')->name('mascotas.index');
Route::post('/mascotas/add','PetController@store')->name('mascotas.store');
Route::put('/mascotas/update/{id}','PetController@update')->name('mascotas.update');
Route::delete('/mascotas/delete/{id}','PetController@destroy')->name('mascotas.destroy');