<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', "WebController@index");

Route::get("/demo-routing","WebController@demoRouting");
Route::get("/login","WebController@login");
Route::get("/register","WebController@register");

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
