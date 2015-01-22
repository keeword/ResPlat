<?php
namespace App\Controllers;

use User, Group;
use BaseController, View, Input, Redirect, Response, Session, Lang;
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

            if ($isAdmin)
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
                $allgroup = Group::select('name')->get()->toArray();
                $groups = array();
                foreach ($allgroup as $group)
                {
                    $groups[$group['name']] = Lang::get('user.'.$group['name']);
                }
                return View::make('user.create')->with('groups', $groups);
            }
            else
            {
                return Response::make('Not Found', 404);
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
        try
        {   
            $user = Sentry::getUser();
            $admin = Sentry::findGroupByName('admin');
            $isAdmin = $user->inGroup($admin);

            $password = (Input::get('password') === Input::get('repasswd')) 
                        ? Input::get('password') : '';

            $group = Sentry::findGroupByName(Input::get('group'));
        }
        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        try
        {
            if ($isAdmin)
            {
                $user = Sentry::createUser(array(
                    'username'  => Input::get('username'),
                    'nickname'  => Input::get('nickname'),
                    'password'  => $password,
                    'activated' => true,
                ));
    
                $user->addGroup($group);
                
                return Response::json(array('success' => true));
            }
            else
            {
                return Response::json(array('success' => false, 
                    'error' => Lang::get('user.'.'permission_denied')));
            }
        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'username_required')));
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'password_required')));
        }
        catch (\Cartalyst\Sentry\Users\UserExistsException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'user_exists' )));
        }
        catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'group_not_found')));
        }

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
