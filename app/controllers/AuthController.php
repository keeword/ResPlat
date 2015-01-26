<?php
namespace App\Controllers;

use BaseController, View, Input, Redirect, Response, Lang, Session;
use Sentry;

class AuthController extends BaseController {

    /**
     * 显示登录页面
     * GET /login
     *
     * @return View
     */
    public function getLogin()
    {
        // logined
        if ( Sentry::check() )
        {
            return Redirect::home();
        }

        // did not logined
        return View::make('auth.login');
    }

    /**
     * POST 验证登录
     * POST /login
     *
     * @return Redirect
     */
    public function postLogin()
    {
        $credentials    = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );
        $remember       = Input::get('remember');

        try
        {
            $user  = Sentry::authenticate($credentials, $remember);
            $group = $user->getGroups()->first()->name;

            Session::put('userid',    $user->id);
            Session::put('username',  $user->username);
            Session::put('nickname',  $user->nickname);
            Session::put('group',     $group);
            Session::put('usergroup', Lang::get('user.'.$group));

            return Response::json(array('success' => true));
        }
        catch (\Exception $e)
        {
                return Response::json(array('success' => false, 
                    'error' => Lang::get('user.login_error')));
        }
    }

    /**
     * 登出
     * DELETE /login
     *
     * @return Redirect
     */
    public function delLogin()
    {
        Sentry::logout();

        return Response::json(array('success' => true));
    }

}
