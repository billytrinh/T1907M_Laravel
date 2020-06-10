<?php
Route::get('/', "HomeController@index");
Route::get('/home', 'HomeController@index')->name('home');

Route::get("/category/{category:slug}","HomeController@category");

Route::get("/product/{product:slug}","HomeController@product");

Route::post("/cart/add/{product}","HomeController@addToCart");

Route::get("/shopping-cart","HomeController@shoppingCart");
Route::get("/checkout","HomeController@checkout")->middleware("auth");
Route::post("/checkout","HomeController@placeOrder")->middleware("auth");
