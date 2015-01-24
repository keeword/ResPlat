<?php
namespace App\Controllers;

use User, Application, ApplicationMaterial, Material, Category;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;

class MaterialController extends BaseController {

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
            $today            = date("Y-m-d H:i:s");
            if ($applications = Application::where('borrow_time', '<', $today)
                                           ->where('return_time', '>', $today)
                                           ->lists('user_id', 'id'))
            {
                $app_mets     = ApplicationMaterial::whereIn('application_id',
                                                        array_keys($applications))
                                                   ->get();
            }
            else
            {
                $app_mets     = ApplicationMaterial::where('id', 0)->get();
            }
            $materials        = Material::with('category')->get();
            $users            = User::lists('nickname', 'id');
        }

        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('material')
                   ->with('materials', $materials)
                   ->with('isAdmin', (Session::get('group') ? true : false))
                   ->with('users', $users)
                   ->with('app_mats', $app_mets)
                   ->with('applications', $applications);
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
            $category = Category::lists('name', 'id');

            return View::make('material.create')->with('category', $category);
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }
    }

    /**
     * 添加物资
     * POST /material
     *
     * @return Response
     */
    public function postMaterial()
    {
        if ( ($name        = Input::get('name'))    &&
             ($number      = Input::get('number'))  &&
             ($category_id = Input::get('category')) )
        {
            $comment       = Input::get('comment');
        }

        else
        {
            return Response::json(array('success' => false, 
                'error' => 'Missing input' ));
        }

        try
        {
            $material = new Material;

            $material->name         = $name;
            $material->total_number = $number;
            $material->lent_number  = 0;
            $material->category_id  = $category_id;
            $material->comment      = $comment;

            if ( ! $material->save() )
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
