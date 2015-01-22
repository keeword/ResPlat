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

Route::get('/login', array('as' => 'login','uses' =>
    'App\Controllers\AuthController@getLogin')
);
Route::delete('/login', array('as' => 'logout','uses' =>
    'App\Controllers\AuthController@delLogin')
);

Route::group(array('before' => 'unlogined'), function()
{
    Route::get('/', array('as' => 'home', 'uses' =>
        'App\Controllers\HomeController@getIndex')
    );
    Route::get('/user', array('as' => 'user', 'uses' =>
        'App\Controllers\UserController@getUser')
    );
    Route::get('/user/create', array('as' => 'user.create', 'uses' =>
        'App\Controllers\UserController@getUserCreate')
    );
});

Route::group(array('before' => 'csrf'), function()
{
    Route::post('/login', array('as' => 'login.post','uses' =>
        'App\Controllers\AuthController@postLogin')
    );
});

Route::filter('unlogined', function()
{
    if ( !Sentry::check())
    {
        return Redirect::to('login');
    }
});
