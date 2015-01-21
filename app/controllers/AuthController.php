<?php
namespace App\Controllers;

use BaseController, View, Input, Redirect, Response, Lang;
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
        ad('foo');
        $credentials = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        $remember = Input::get('remember');

        try
        {
            $user = Sentry::authenticate($credentials, $remember);
            return Response::json(array('success' => true));
        }
        catch(\Exception $e)
        {
#            return Redirect::refresh()->withErrors(array('login' => $e->getMessage()));
            return Response::json(array('success' => false, 'error' => Lang::get('user.login_error')));
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
