<?php
namespace App\Controllers;

use Material, Category;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;

class MaterialController extends \BaseController {

    /**
     * 物资一览
     * GET /material
     *
     * @return View
     */
    public function getMaterial()
    {
        try
        {
            $materials = Material::with('category')->get();
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('material')->with('materials', $materials)
            ->with('isAdmin', (Session::get('group') ? true : false));
    }

    /**
     * 添加物资
     * GET /material/create
     *
     * @return View
     */
    public function getMaterialCreate()
    {
        try
        {   
            $category = Category::lists('category', 'id');

            return View::make('material.create')->with('category', $category);
        }
        catch (\Exception $e)
        {
            return Response::make('Not Found', 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     * POST /material
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /material/{id}
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
     * GET /material/{id}/edit
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
     * PUT /material/{id}
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
     * DELETE /material/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
