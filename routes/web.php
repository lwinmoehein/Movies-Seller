<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
        Route::get('/','MovieController@index');
        Route::resource('movie', 'MovieController');
        Route::get('movies/destroy/{movie}','MovieController@destroy')->name('movies.destroy');

        Route::resource('serie','SeriesController');
        Route::get('series/destroy/{serie}','SeriesController@destroy')->name('series.destroy');

        Route::resource('tag','TagController');
        Route::get('tags/destroy/{tag}','TagController@destroy')->name('tags.destroy');

        Route::resource('country','CountryController');
        Route::get('countries/destroy/{country}','CountryController@destroy')->name('countries.destroy');

        Route::resource('year','YearController');
        Route::get('years/destroy/{year}','YearController@destroy')->name('years.destroy');
});
