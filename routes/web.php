<?php


Route::get('/', 'MainController@index');
Route::get('/elements/{category}', 'MainController@elements');