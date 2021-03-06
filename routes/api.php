<?php

use Illuminate\Http\Request;

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


Route::group(['middleware' => ['api']], function () {
    Route::post('/register', [
        'uses' => 'Api\Auth\AuthController@register',
    ]);

    Route::post('/login', [
        'uses' => 'Api\Auth\AuthController@login',
    ]);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/user', [
            'uses' => 'Api\UserController@show',
        ]);
        Route::post('/zipcode', [
            'uses' => 'Api\ZipCodeController@create',
        ]);
        Route::get('/weather', [
            'uses' => 'Api\WeatherController@index',
        ]);
    });

});