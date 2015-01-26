<?php
namespace App\Controllers;

use Material, Category;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;

class CategoryController extends BaseController {

    /**
     * 品类一览
     * GET /category
     *
     * @return View
     */
    public function getCategory()
    {
        try
        {
            $categories = Category::with('material')->get();
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('category.index')->with('categories', $categories);

    }

    /**
     * 添加品类
     * GET /category/create
     *
     * @return View
     */
    public function getCategoryCreate()
    {
    }

    /**
     * 添加分类
     * POST /category
     *
     * @return Response
     */
    public function postCategory()
    {
        if ( ! ($name = Input::get('name')) )
        {
            return Response::json(array('success' => false, 
                'error' => 'Missing category name' ));
        }

        try
        {
            $category = new Category;

            $category->name = $name;

            if ( ! $category->save() )
            {
                return Response::json(array('success' => false, 
                    'error' => 'Can not save!'));
            }

            return Response::json(array('success' => true));

        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

    }

    /**
     * Display the specified resource.
     * GET /category/{id}
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
     * GET /category/{id}/edit
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
     * PUT /category/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * 删除品类
     * DELETE /category/{id}
     *
     * @return Response
     */
    public function delCategory()
    {
        try
        {
            Category::destroy(Request::segment(2));

            return Response::json(array('success' => true));
        }

        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage() ));
        }
    }

}
