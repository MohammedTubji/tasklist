<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@index');

Route::post('store','HomeController@store');

Route::delete('delete/{id}','HomeController@destory');

Route::post('edit/{id}','HomeController@edit');

route::post('update/{id}','HomeController@update');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
