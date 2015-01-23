<?php
namespace App\Controllers;

use User, Group;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;
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
            $isAdmin = (Session::get('group') === 'admin') ?
                true : false;

            if ($isAdmin)
            {
                $users = User::with('groups')->get();
            }
            else
            {
                $users = User::with('groups')->where('id', Session::get('userid'))->get();
            }

            return View::make('user')->with('users', $users)->with('isAdmin', $isAdmin);
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
     * 添加账户页面
     * GET /user/create
     *
     * @return View
     */
    public function getUserCreate()
    {
        try
        {   
            $allgroup = Group::select('name')->get()->toArray();
            $groups   = array();
            foreach ($allgroup as $group)
            {
                $groups[$group['name']] = Lang::get('user.'.$group['name']);
            }
            return View::make('user.create')->with('groups', $groups);
        }
//        catch  (Cartalyst\Sentry\Users\UserNotFoundException $e)
//        {
//            return Response::make('Not Found', 404);
//        }
//        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
//        {
//            return Response::make('Not Found', 404);
//        }
        catch (\Exception $e)
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
            $password        = (Input::get('password') === Input::get('repasswd')) ?
                               Input::get('password') : '';

            $group           = Sentry::findGroupByName(Input::get('group'));

            $user            = Sentry::createUser(array(
                'username'  => Input::get('username'),
                'nickname'  => Input::get('nickname'),
                'password'  => $password,
                'activated' => true,
            ));

            $user->addGroup($group);
            
            return Response::json(array('success' => true));
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
        try
        {
            $id = Request::segment(2);

            if ( ! $user = User::with('groups')->find($id) )
            {
                throw new \Exception('User was not found.');
            }
            $allgroup = Group::select('name')->get()->toArray();
            $groups   = array();
            foreach ($allgroup as $group)
            {
                $groups[$group['name']] = Lang::get('user.'.$group['name']);
            }
            return View::make('user.update')->with('groups', $groups)->with('user', $user);
        }
        catch (\Exception $e)
        {
            return Response::make('Not Found', 404);
        }
    }

    /**
     * 更新用户信息
     * PUT /user/{id}
     *
     * @return Response
     */
    public function putUserUpdate()
    {
        try
        {
            $id   = Request::segment(2);
            $user = Sentry::findUserById($id);

            if ( $nickname = Input::get('nickname') )
            {
                $user->nickname = $nickname;
            }

            if ( $password = (Input::get('password') === Input::get('repasswd')) 
                 ? Input::get('password') : '')
            {
                $user->password = $password;
            }

            if ( $groupname = Input::get('group'))
            {
                if ( ! $user->addGroup(Sentry::findGroupByName($groupname)) )
                {
                    throw new \Exception('Group was not assigned.');
                }
            }

            if ( ! $user->save() )
            {
                throw new \Exception('User infomation was not updated.');
            }

            return Response::json(array('success' => true));
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'user_not_found' )));
        }
        catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'group_not_found' )));
        }
        catch (\Exception $e)
        {
            return Response::make('Not Found', 404);
        }
    }

    /**
     * 删除账户
     * DELETE /user/{id}
     *
     * @return Response
     */
    public function delUser()
    {
        try
        {
            $id       = Request::segment(2);
            $user     = Sentry::findUserById($id);

            $admin    = Sentry::getUser();
            $password = Input::get('password');

            if ( $admin->checkPassword($password) )
            {
                $user->delete();
                return Response::json(array('success' => true));
            }
            else
            {
                return Response::json(array('success' => false, 
                    'error' => Lang::get('user.'.'password_not_match' )));
            }
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => Lang::get('user.'.'user_not_found' )));
        }
    }

}
