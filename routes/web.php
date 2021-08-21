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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'AdminController@index')->name('adminDashboard');

Route::get('/panel', 'UserController@index')->name('userDashboard');

Route::get('/reservations', 'ReservationController@getReservations')->name('getReservations');

Route::post('/reservation/submit', 'ReservationController@store')->name('storeReservation');

Route::post('/table/submit', 'TableController@store')->name('storeTable');

Route::post('/hours/update/{id}', 'OperatingHourController@update')->name('updateHours');

Route::delete('/tables/{table}', 'TableController@destroy')->name('deleteTable');
