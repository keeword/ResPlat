<?php
namespace App\Controllers;

use User;
use BaseController, View, Input, Redirect, Response, Session, Lang;
use Sentry;

class HomeController extends BaseController 
{
    /*
     * 显示首页
     * GET /
     *
     * @return View
     */
    public function getIndex()
    {
        try
        {
            $user = Sentry::getUser();
            $username = $user->username;

            $group = $user->getGroups();
            $usergroup = $group->fetch('name')->toArray()[0];

            Session::put('username', $username);
            Session::put('usergroup', $usergroup);
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            Redirect::route('login');
        }

        return View::make('home', array('username' => $username, 
            'usergroup' => Lang::get('user.'.$usergroup))
        );
    }

}
