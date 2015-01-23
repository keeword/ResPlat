<?php
namespace App\Controllers;

use Material;
use BaseController, View, Input, Redirect, Response, Lang, Session;

class ApplicationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /application
	 *
	 * @return Response
	 */
	public function getApplication()
	{
        try
        {
            $materials = Material::with('category')->get();
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('application')->with('materials', $materials);
	}

	/**
	 * 申请物资页面
	 * GET /Application/create
	 *
	 * @return View
	 */
	public function getApplicationCreate()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /application
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /application/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /application/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /application/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /application/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
