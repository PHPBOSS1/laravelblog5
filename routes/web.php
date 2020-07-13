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
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('post.index');
//});
Route::get("/", "HomeController@index");

Route::group(['middleware'  =>  'auth' ], function(){
    Route::get('/blog/create ', 'BlogController@create');
    Route::post("/blog/post/store", "BlogController@store");
    Route::get("/blog", "BlogController@index");
    Route::get("/blog/edit/{id}", "BlogController@edit");
    Route::post("/blog/post/edit_store/{id}", "BlogController@edit_store");
    Route::get("/blog/post/delete/{id}", "BlogController@destroy");

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
