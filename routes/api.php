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

use App\Http\Controllers\StoreUserScoreController;

Route::group(['as' => 'api.'], function () {
    Route::post('store/data', 'UserDataController@store')->name('user-data');
    Route::post('user/cards', 'UserDataController@userCardsData')
         ->name('user-cards');
    
    Route::get('/generate/cards/{id?}',
        'GenerateSystemCardsController@displaySystemCards')
         ->name('generate-cards');
    
    Route::post('/result',
        'StoreUserScoreController@storeUserScore')
         ->name('user-score');
});

