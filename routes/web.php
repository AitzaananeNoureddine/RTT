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

Route::get('fetchArticles','App\Http\Controllers\CategoryController@fetch');

Route::get('randomTest','App\Http\Controllers\ArticleController@random');
