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

Route::group(['middleware' => 'web'], function () {
    Route::get("/subscriptions/", "TwoSeven\Controllers\SubscriptionController@index");
    Route::get("/user/{id}/subscriptions/", "TwoSeven\Controllers\SubscriptionController@userIndex")->where('id', '[0-9]+');
    Route::post("/user/{id}/subscriptions/", "TwoSeven\Controllers\SubscriptionController@subscribe")->where('id', '[0-9]+');
});
