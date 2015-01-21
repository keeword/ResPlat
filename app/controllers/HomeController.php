<?php
namespace App\Controllers;

use User, Material;
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
            $nickname = $user->nickname;

            $group = $user->getGroups();
            $usergroup = $group->fetch('name');

            Session::put('username', $username);
            Session::put('usergroup', $usergroup);
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            Redirect::route('login');
        }

        $material = Material::all();

        return View::make('home', array('username' => $nickname, 
            'usergroup' => Lang::get('user.'.$usergroup),
            'material_list' => $material,)
        );
    }

}
