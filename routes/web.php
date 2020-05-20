<?php

use Illuminate\Support\Facades\Route;

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
