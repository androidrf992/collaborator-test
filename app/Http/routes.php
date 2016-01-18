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

Route::get('/', function(){
    return view('welcome');
});

Route::resource('collaborator', 'CollaboratorController');

Route::group(['prefix' => 'collaborator'], function(){
    Route::post('sort', 'CollaboratorController@sort');
    Route::post('search', 'CollaboratorController@search');
    Route::post('person', 'CollaboratorController@person');
//    Route::get('nodes', 'CollaboratorController@nodes');
});

Route::get('nodes', 'CollaboratorController@nodes');

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
});


