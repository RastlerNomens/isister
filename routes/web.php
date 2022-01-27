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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //Mascota
    Route::get('/mascotas','PetController@index')->name('mascotas.index');
    Route::post('/mascotas/add','PetController@store')->name('mascotas.store');
    Route::put('/mascotas/update/{id}','PetController@update')->name('mascotas.update');
    Route::delete('/mascotas/delete/{id}','PetController@destroy')->name('mascotas.destroy');

    //Vacuna
    Route::get('mascotas/{id}/vacunas', 'VaccineController@index')->name('vacunas.index');
    Route::post('mascotas/vacunas', 'VaccineController@store')->name('vacunas.store');
    Route::get('mascotas/{id}/vacunas/pdf','VaccineController@report')->name('vacunas.report');

    //Profile
    Route::get('profile','HomeController@profile')->name('profile');
    Route::post('profile/zoological','HomeContoller@zoological')->name('profile.zoological');
    Route::post('profile/zoological/exist','HomeController@is_zoological')->name('profile.is_zoological');
    Route::post('profile/particular','HomeController@particular')->name('profile.particular');
});

// Social Login
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');