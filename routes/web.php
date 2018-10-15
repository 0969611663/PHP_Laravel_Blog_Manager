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


//Route::get('/', function () {
//    return view('welcome');
//});

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'blog'], function (){
   Route::get('/', 'BlogController@index')->name('blog_index');

   Route::get('/create','BlogController@create')->name('blog_create');

   Route::post('/create','BlogController@store')->name('blog_store');

   Route::get('/show-blog/{id}', 'BlogController@show')->name('blog_show');

   Route::get('/edit/{id}', 'BlogController@edit' )->name('blog_edit');

   Route::post('/update/{id}', 'BlogController@update')->name('blog_update');

   Route::get('/delete-blog/{id}', 'BlogController@destroy')->name('blog_destroy');
});
