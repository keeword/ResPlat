<?php
namespace App\Controllers;

use BaseController, View, Input, Redirect, Response;
use Sentry;

class UserController extends BaseController {

	/**
	 * 添加账户页面
	 * GET /user/create
	 *
	 * @return View
	 */
	public function getUserCreate()
	{

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
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
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
