<?php
namespace App\Controllers;

use BaseController, View, Input, Redirect, Response;
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
        if ( ! Sentry::check())
        {
            return Redirect::route('login');
        }
        else
        {
            return View::make('home');
        }
    }

}
