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
    Route::get('/material', array('as' => 'material', 'uses' =>
        'App\Controllers\MaterialController@getMaterial')
    );
    Route::get('/workroom', array('as' => 'workroom', 'uses' =>
        'App\Controllers\WorkroomController@getWorkroom')
    );
    Route::get('/workroom/list', array('as' => 'workroom.list', 'uses' =>
        'App\Controllers\WorkroomController@getWorkroomList')
    );
    Route::get('/application', array('as' => 'application', 'uses' =>
        'App\Controllers\ApplicationController@getApplication')
    );
    Route::get('/application/create', array('as' => 'application.create', 'uses' =>
        'App\Controllers\ApplicationController@getApplicationCreate')
    );
});

Route::group(array('before' => 'isLogined|isAdmin'), function()
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
    Route::get('/material/create', array('as' => 'material.create', 'uses' =>
        'App\Controllers\MaterialController@getMaterialCreate')
    );
    Route::get('/category', array('as' => 'category', 'uses' =>
        'App\Controllers\CategoryController@getCategory')
    );
    Route::post('/category', array('as' => 'category.create', 'uses' =>
        'App\Controllers\CategoryController@postCategory')
    );
});


Route::group(array('before' => 'isLogined|isChecker'), function()
{
    Route::get('/application/update', array('as' => 'application.update', 'uses' =>
        'App\Controllers\ApplicationController@getApplicationUpdate')
    );
    Route::get('/application/{id}', array('as' => 'application.detail', 'uses' =>
        'App\Controllers\ApplicationController@getApplicationDetail')
    )
    ->where('id', '[0-9]+');
});

Route::group(array('before' => 'isLogined|csrf'), function()
{
    Route::post('/application', array('as' => 'application', 'uses' =>
        'App\Controllers\ApplicationController@postApplication')
    );
});

Route::group(array('before' => 'isLogined|isAdmin|csrf'), function()
{
    Route::post('/user', array('as' => 'user.post','uses' =>
        'App\Controllers\UserController@postUserCreate')
    );
    Route::put('/user/{id}', array('as' => 'user.put','uses' =>
        'App\Controllers\UserController@putUserUpdate')
    )
    ->where('id', '[0-9]+');
    Route::post('/material', array('as' => 'material.post','uses' =>
        'App\Controllers\MaterialController@postMaterial')
    );
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

Route::filter('isChecker', function()
{
    if ( ! Session::get('group') === 'checker' )
    {
        return Response::make('Not Found', 404);
    }
}
);
