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

Route::get('/', function () {
    return view('user_data');
})->name('user-data');

Route::get('/cards/{id?}', function () {
    return view('user_cards');
})->name('user-cards');


Route::get('/show/data', 'ShowResultController@getData')->name('show-result');
