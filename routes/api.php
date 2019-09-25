<?php

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

Route::group(['as' => 'api.'], function () {
    Route::post('store/data', 'UserDataController@store')->name('user-data');
    Route::post('store/cards/data', 'UserDataController@storeCardsData')
         ->name('store-cards-data');
    Route::get('/system/cards/{id?}', 'SystemCardController@systemCards')
         ->name('system-cards');
    Route::post('/store/system/cards', 'SystemCardController@storeSystemCards')
         ->name('store-system-cards');
});

