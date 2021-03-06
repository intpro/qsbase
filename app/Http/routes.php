<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {


    return view('welcome');
});


Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function()
{
    Route::get('/init',   ['as' => 'init_group',   'uses' => 'App\Http\Controllers@init']);
    Route::get('/save',   ['as' => 'save_atype',   'uses' => 'App\Http\Controllers@save']);
    Route::get('/delete', ['as' => 'delete_group', 'uses' => 'App\Http\Controllers@delete']);
});
