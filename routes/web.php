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

//admin panels
Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/','SeriesController@index')->name('index');
        Route::resource('movie', 'MovieController');
        Route::get('movies/destroy/{movie}','MovieController@destroy')->name('admin.movies.destroy');

        Route::resource('serie','SeriesController');
        Route::get('series/destroy/{serie}','SeriesController@destroy')->name('series.destroy');

        Route::resource('tag','TagController');
        Route::get('tags/destroy/{tag}','TagController@destroy')->name('tags.destroy');

        Route::resource('country','CountryController');
        Route::get('countries/destroy/{country}','CountryController@destroy')->name('countries.destroy');

        Route::resource('year','YearController');
        Route::get('years/destroy/{year}','YearController@destroy')->name('years.destroy');

        Route::resource('copyorders','CopyOrderController');
        Route::get('copyorders/{copyOrder}/confirmPurchase','CopyOrderController@confirmPurchase')->name('copyorders.confirmPurchase');

        Route::resource('users','UserController');
});



Auth::routes();

//user routes
Route::get('/', 'HomeController@index')->name('index');
Route::resource('/series','User\SeriesController');
Route::resource('/movies','User\MoviesController');
Route::post('/movies/addcopylist','User\MoviesController@addCopyList')->name('movies.addToCopyList');
Route::post('/series/addcopylist','User\SeriesController@addCopyList')->name('series.addToCopyList');
Route::get('copyitems/{copyitem}/destroy','User\CopyListController@destroy')->name('users.copyitems.destroy');
Route::get('copyitems/movies/{movie}/destroy','User\CopyListController@movieCopyDestroy')->name('users.movies.copyitems.destroy');
Route::get('copyitems/series/{serie}/destroy','User\CopyListController@serieCopyDestroy')->name('users.series.copyitems.destroy');

Route::get('copyitems/confirm','User\CopyListController@confirmOrder')->name('users.copyitems.confirm');


