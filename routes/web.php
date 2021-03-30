<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function(){ return view('home'); });

Route::get('about',function(){ return view('about'); });

Route::get('top10','App\Http\Controllers\ScoreController@index');

Route::get('categories/{id}','App\Http\Controllers\CategoryController@index')->name('categories');

// Route::prefix('categories')->group(function () {
//     Route::get('/{id}','App\Http\Controllers\CategoryController@index')->name('categories');
//     Route::post('/{id}/fetchArticle','App\Http\Controllers\ArticleController@fetchArticle')->name('fetchArticle');
// });

Route::post('fetchArticle','App\Http\Controllers\ArticleController@fetchArticle')->name('fetchArticle');

Route::get('typingTest','App\Http\Controllers\ArticleController@random')->name('typingTest');

Route::post('/verifyScore','App\Http\Controllers\ScoreController@verifyScore');

Route::post('/updateUser','App\Http\Controllers\ScoreController@updateUser')->name('update');

Route::post('/NewPost','App\Http\Controllers\PostController@Insert')->name('NewPost');

Route::post('/reply','App\Http\Controllers\PostController@InsertReply')->name('reply');
