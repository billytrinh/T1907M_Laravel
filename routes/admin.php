<?php
Route::get("/","WebController@dashboard");
// Category
Route::get("/list-category","WebController@listCategory");
Route::get("/new-category","WebController@newCategory");
Route::post("/save-category","WebController@saveCategory");

Route::get("/edit-category/{id}","WebController@editCategory");
Route::put("/update-category/{id}","WebController@updateCategory");

Route::delete("/delete-category/{id}","WebController@deleteCategory");

// Product
Route::get("/list-product","WebController@listProduct");
Route::get("/new-product","WebController@newProduct");
Route::post("/save-product","WebController@saveProduct");
