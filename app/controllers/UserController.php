<?php
namespace App\Controllers;

use User;
use BaseController, View, Input, Redirect, Response, Session;
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
            $admin = Sentry::findGroupByName('admin');
            $isAdmin = $user->inGroup($admin);

            if ($admin)
            {
                $users = User::with('groups')->get();
            }
            else
            {
                $users = User::with('groups')->where('id', Session::get('userid'))->get();
            }
        }
        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('user')->with('users', $users)->with('isAdmin', $isAdmin);

    }

    /**
     * 添加账户页面
     * GET /user/create
     *
     * @return View
     */
    public function getUserCreate()
    {
        try
        {   
            $user = Sentry::getUser();
            $admin = Sentry::findGroupByName('admin');
            $isAdmin = $user->inGroup($admin);

            if ($isAdmin)
            {
                return View::make('user.create');
            }

        }
        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }


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
