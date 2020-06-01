<?php
Route::get('/', "HomeController@index");
Route::get('/home', 'HomeController@index')->name('home');

Route::get("/category/{category:slug}","HomeController@category");
