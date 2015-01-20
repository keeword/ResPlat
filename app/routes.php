<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' =>
    'App\Controllers\HomeController@getIndex')
);

Route::get('/login', array('as' => 'login','uses' =>
    'App\Controllers\AuthController@getLogin')
);
Route::post('/login', array('as' => 'login','uses' =>
    'App\Controllers\AuthController@postLogin')
);
Route::delete('/login', array('as' => 'login','uses' =>
    'App\Controllers\AuthController@delLogin')
);
