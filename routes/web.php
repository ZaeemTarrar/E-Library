<?php

/*
             |--------------------------------------------------------------------------
             | Web Routes
             |--------------------------------------------------------------------------
             |
             | Here is where you can register web routes for your application. These
             | routes are loaded by the RouteServiceProvider within a group which
             | contains the " web " middleware group. Now create something great!
             |
             */

Auth::routes();

## Route
Route::get('/', function () {
    return redirect('/home');
});

## Route
Route::get('/sample', 'FrontController@sample')->name('sample');

## Route
Route::get('/extra', 'FrontController@extra')->name('extra');

## Route
## New Route Here

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    ###  Route
    Route::get('/', 'DashboardController@index')->name('dashboard');

    ###  Route
    ###  New Route Here
    //User
    Route::get('/user/profile','UserController@profile')->name('user.profile');
    Route::get('/user/profile/edit','UserController@profileEdit')->name('user.profile.edit');
    Route::post('/user/profile/update','UserController@profileUpdate')->name('user.profile.update');
    Route::get('/user/profile/password/reset','UserController@passwordreset')->name('user.profile.password.reset');
    Route::post('/user/profile/password/reseted','UserController@passwordreseted')->name('user.profile.password.reseted');

    //Flip Book
    Route::resource('/book', 'FlipbookController');
});

