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

Route::get('/', 'UserController@index');
// Route::get('/', function () {
// });

Route::group(['prefix' => 'user'], function () {
    Route::get('add', 'UserController@create');
    Route::post('add', 'UserController@store');
    Route::get('', 'UserController@index');
    Route::get('edit/{id}', 'UserController@edit');
    Route::post('edit/{id}', 'UserController@update');
    Route::delete('delete/{id}', 'UserController@destroy');
});
