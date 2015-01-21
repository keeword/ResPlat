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
            $users = Sentry::findAllUsers();
        }            
        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }
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
     * Store a newly created resource in storage.
     * POST /user
     *
     * @return Response
     */
    public function store()
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
