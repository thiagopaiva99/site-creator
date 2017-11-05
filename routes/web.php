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

Route::get('/', function () {
    return redirect((Auth::check() ? url('/home') : url('/login')));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('site-plugins', 'PluginController');

    Route::resource('sites', 'SiteController');
    Route::post('sites/add-theme', 'SiteController@addTheme');
    Route::get('sites/{id}/start', 'SiteController@start');
    Route::get('sites/{id}/stop', 'SiteController@stop');
    Route::get('sites/{id}/theme/{theme}', 'SiteController@theme');
    Route::get('sites/{id}/plugin/{plugin}', 'SiteController@plugin');

    Route::get('/home', 'HomeController@index')->name('home');
});
