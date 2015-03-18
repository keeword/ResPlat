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
    Route::get('/user', array('as' => 'user.index', 'uses' =>
        'App\Controllers\User\UserController@getIndex')
    );
    Route::get('/material', array('as' => 'material', 'uses' =>
        'App\Controllers\MaterialController@getMaterial')
    );
    Route::get('/category/list', array('as' => 'category.list', 'uses' =>
        'App\Controllers\CategoryController@getCategoryList')
    );
    Route::get('/workroom', array('as' => 'workroom', 'uses' =>
        'App\Controllers\WorkroomController@getWorkroom')
    );
    Route::get('/meetingroom', array('as' => 'meetingroom', 'uses' =>
        'App\Controllers\WorkroomController@getMeetingroom')
    );
    Route::get('/meetingroom/list', array('as' => 'meetingroom.list', 'uses' =>
        'App\Controllers\WorkroomController@getMeetingroomList')
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
    Route::get('/workroom/create', array('as' => 'workroom.create', 'uses' =>
        'App\Controllers\WorkroomController@getWorkroomCreate')
    );
    Route::get('/meetingroom/create', array('as' => 'meetingroom.create', 'uses' =>
        'App\Controllers\WorkroomController@getMeetingroomCreate')
    );
});

Route::group(array('before' => 'isLogined|isAdmin'), function()
{
    Route::get('/user/create', array('as' => 'user.create', 'uses' =>
        'App\Controllers\User\UserController@getCreate')
    );
    Route::get('/user/{id}/edit', array('as' => 'user.edit', 'uses' =>
        'App\Controllers\User\UserController@getEdit')
    )
    ->where('id', '[0-9]+');
    Route::delete('/user/{id}', array('as' => 'user.delete', 'uses' =>
        'App\Controllers\User\UserController@deleteUser')
    )
    ->where('id', '[0-9]+');
    Route::get('/material/create', array('as' => 'material.create', 'uses' =>
        'App\Controllers\MaterialController@getMaterialCreate')
    );
    Route::post('/material/batch', array('as' => 'material.batch', 'uses' =>
        'App\Controllers\MaterialController@postMaterialBatch')
    );
    Route::delete('/material/{id}', array('as' => 'material.delete', 'uses' =>
        'App\Controllers\MaterialController@delMaterial')
    )
    ->where('id', '[0-9]+');
    Route::put('/material', array('as' => 'material', 'uses' =>
        'App\Controllers\MaterialController@putMaterialUpdate')
    );
    Route::get('/category', array('as' => 'category', 'uses' =>
        'App\Controllers\CategoryController@getCategory')
    );
    Route::post('/category', array('as' => 'category.create', 'uses' =>
        'App\Controllers\CategoryController@postCategory')
    );
    Route::delete('/category/{id}', array('as' => 'category.delete', 'uses' =>
        'App\Controllers\CategoryController@delCategory')
    )
    ->where('id', '[0-9]+');
    Route::get('/application/update', array('as' => 'application.update', 'uses' =>
        'App\Controllers\ApplicationController@getApplicationUpdate')
    );
    Route::get('/application/{id}', array('as' => 'application.detail', 'uses' =>
        'App\Controllers\ApplicationController@getApplicationDetail')
    )
    ->where('id', '[0-9]+');
    Route::get('/workroom/update', array('as' => 'workroom.update', 'uses' =>
        'App\Controllers\WorkroomController@getWorkroomUpdate')
    );
    Route::put('/workroom/{id}', array('as' => 'workroom.put', 'uses' =>
        'App\Controllers\WorkroomController@putWorkroomUpdate')
    )
    ->where('id', '[0-9]+');
});

Route::group(array('before' => 'isLogined|isChecker'), function()
{
});

Route::group(array('before' => 'isLogined|csrf'), function()
{
    Route::post('/application', array('as' => 'application', 'uses' =>
        'App\Controllers\ApplicationController@postApplication')
    );
    Route::post('/workroom', array('as' => 'workroom', 'uses' =>
        'App\Controllers\WorkroomController@postWorkroom')
    );
});

Route::group(array('before' => 'isLogined|isChecker|csrf'), function()
{
});
Route::group(array('before' => 'isLogined|isAdmin|csrf'), function()
{
    Route::put('/application/{id}', array('uses' =>
        'App\Controllers\ApplicationController@postApplicationUpdate')
    );
    Route::post('/user', array('as' => 'user.store','uses' =>
        'App\Controllers\User\UserController@postStore')
    );
    Route::put('/user/{id}', array('as' => 'user.update','uses' =>
        'App\Controllers\User\UserController@putUpdate')
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
