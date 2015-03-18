<?php
namespace App\Controllers\User;

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
    public function getIndex()
    {
        try
        {   
            $isAdmin = (Sentry::getUser()->getGroups()->first()->name === 'admin') ? 
                true : false;

            if ($isAdmin)
            {
                $users = User::with('group')->get();
            }
            else
            {
                $users = User::with('group')->where('id', Session::get('userid'))->get();
            }

            return View::make('user.index')->with('users', $users)->with('isAdmin', $isAdmin);
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
    public function getCreate()
    {
        try
        {
            $groups = Group::lists('zhname', 'id');
        }
        catch (\Exception $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('user.create')->with('groups', $groups);
    }

    /**
     * 添加账户
     * POST /user
     *
     * @return Response
     */
    public function postStore()
    {
        try
        {
            $password        = (Input::get('password') == Input::get('password_confirmation')) ?
                                    Input::get('password') : '';

            $group           = Sentry::findGroupById(Input::get('group_id'));

            $user            = Sentry::createUser(array(
                'username'  => Input::get('username'),
                'nickname'  => Input::get('nickname'),
                'password'  => $password,
                'activated' => true,
            ));

            $user->addGroup($group);
            
            return Response::json(array('success' => true,
                'msg' => '创建用户成功!'
            ));
        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'username_required')
            ));
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'password_required')
            ));
        }
        catch (\Cartalyst\Sentry\Users\UserExistsException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'user_exists' )
            ));
        }
        catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'group_not_found')
            ));
        }

    }

    /**
     * 更新用户信息
     * GET /user/{id}
     * @param  integer
     *
     * @return View
     */
    public function getEdit($id)
    {
        try
        {
            $user   = User::with('group')->find($id);
            $groups = Group::lists('zhname', 'id');

            return View::make('user.edit')->with('groups', $groups)->with('user', $user);
        }
        catch (\Exception $e)
        {
            return Response::make($e->getMessage(), 404);
        }
    }

    /**
     * 更新用户信息
     * PUT /user/{id}
     * @param  integer
     *
     * @return Response
     */
    public function putUpdate($id)
    {
        try
        {
            $user = Sentry::findUserById($id);

            $user->nickname = Input::get('nickname');

            if ( $password = (Input::get('password') === Input::get('password_confirmation')) 
                    ? Input::get('password') : '')
            {
                $user->password = $password;
            }

            $user->removeGroup($user->getGroups()->first());

            $user->addGroup(Sentry::findGroupById(Input::get('group_id')));

            if ( ! $user->save() )
            {
                throw new \Exception('修改用户信息失败!');
            }

            return Response::json(array('success' => true,
                'msg' => '修改用户信息成功!'
            ));
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'user_not_found' )
            ));
        }
        catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'group_not_found' )
            ));
        }
        catch (\Exception $e)
        {
            return Response::json(array('success' => false, 
                'error' => $e->getMessage()
            ));
        }
    }

    /**
     * 删除账户
     * DELETE /user/{id}
     * @param  integer
     *
     * @return Response
     */
    public function deleteUser($id)
    {
        try
        {
            $user     = Sentry::findUserById($id);

            $admin    = Sentry::getUser();
            $password = Input::get('password');

            if ( $admin->checkPassword($password) )
            {
                $user->delete();
                return Response::json(array('success' => true,
                    'msg' => '删除用户成功!'
                ));
            }
            else
            {
                return Response::json(array('success' => false, 
                    'error' => trans('user.'.'password_not_match' )
                ));
            }
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Response::json(array('success' => false, 
                'error' => trans('user.'.'user_not_found' )
            ));
        }
    }

}
