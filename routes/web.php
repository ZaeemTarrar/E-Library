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
    Route::get('/category', 'CategoryController@index')->name('category.index');

    ###  Route
    ###  New Route Here
});
