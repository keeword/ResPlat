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


Route::group(array('before' => 'isLogined'), function()
{
    Route::get('/', array('as' => 'home', 'uses' =>
        'App\Controllers\HomeController@getIndex')
    );
    Route::delete('/login', array('as' => 'logout','uses' =>
        'App\Controllers\AuthController@delLogin')
    );
    Route::get('/user', array('as' => 'user', 'uses' =>
        'App\Controllers\UserController@getUser')
    );
});

Route::group(array('before' => 'isAdmin'), function()
{
    Route::get('/user/create', array('as' => 'user.create', 'uses' =>
        'App\Controllers\UserController@getUserCreate')
    );
    Route::get('/user/{id}', array('as' => 'user.update', 'uses' =>
        'App\Controllers\UserController@getUserUpdate')
    )
    ->where('id', '[0-9]+');
    Route::delete('/user/{id}', array('as' => 'user.delete', 'uses' =>
        'App\Controllers\UserController@delUser')
    )
    ->where('id', '[0-9]+');
});

Route::group(array('before' => 'isAdmin|csrf'), function()
{
    Route::post('/user', array('as' => 'user.post','uses' =>
        'App\Controllers\UserController@postUserCreate')
    );
    Route::put('/user/{id}', array('as' => 'user.put','uses' =>
        'App\Controllers\UserController@putUserUpdate')
    )
    ->where('id', '[0-9]+');
});

// Route::group(array('before' => 'csrf'), function()
// {
    Route::post('/login', array('as' => 'login.post','uses' =>
        'App\Controllers\AuthController@postLogin')
    );
// });


Route::filter('isLogined', function()
{
    if ( ! Sentry::check())
    {
        return Redirect::to('login');
    }
});

Route::filter('isAdmin', function()
{
    if ( ! Session::get('group') === 'admin' )
    {
        return Response::make('Not Found', 404);
    }
});
