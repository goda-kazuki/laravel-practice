<?php

use App\Http\Middleware\HelloMiddleware;
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

Route::get("/hello", "helloController@index");
Route::post("/hello", "helloController@post");
Route::post("/hello/add", "helloController@add");
Route::get("/hello/add", "helloController@index");

Route::get("/hello/edit", "helloController@edit")->name("hello.edit");
Route::post("/hello/update", "helloController@update");
