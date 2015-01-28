<?php
namespace App\Controllers;

use Material, Application, Workroom;
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
            $applications = Application::with('material')
                                       ->where('user_id', Session::get('userid'))
                                       ->orderBy('id', 'desc')
                                       ->get();
            $workrooms    = Workroom::where('user_id', Session::get('userid'))
                                    ->orderBy('id', 'desc')
                                    ->get();
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('home')
                   ->with('workrooms', $workrooms)
                   ->with('applications', $applications);
    }

}
