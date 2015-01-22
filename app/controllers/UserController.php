<?php
namespace App\Controllers;

use User;
use BaseController, View, Input, Redirect, Response;
use Sentry;

class UserController extends BaseController {

    /**
     * 获取用户列表
     * GET /user
     *
     * @return View
     */
    public function getUser()
    {
        try
        {   
            $user = Sentry::getUser();
            $permissions = $user->getPermissions();
        }
        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }
        try
        {
            $users = User::with('groups')->get();
        }            
        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('user')->with('users', $users)->with('permissions', $permissions);

    }

    /**
     * 添加账户页面
     * GET /user/create
     *
     * @return View
     */
    public function getUserCreate()
    {

    }

    /**
     * 添加账户
     * POST /user
     *
     * @return Response
     */
    public function postUserCreate()
    {
        //
    }

    /**
     * 更新用户信息
     * GET /user/{id}
     *
     * @return View
     */
    public function getUserUpdate()
    {
        //
    }

    /**
     * 更新用户信息
     * PUT /user/{id}
     *
     * @return Response
     */
    public function putUserUpdate()
    {
        //
    }

    /**
     * 删除账户
     * DELETE /user/{id}
     *
     * @return Response
     */
    public function delUser()
    {
        //
    }

}
