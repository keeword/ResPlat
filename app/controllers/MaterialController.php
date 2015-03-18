<?php
namespace App\Controllers;

use User, Application, ApplicationMaterial, Material, Category;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;
use Excel;

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

        return View::make('material.index')
                   ->with('materials', $materials)
                   ->with('isAdmin', (Session::get('group')==='admin' ? true : false))
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
     * 批量添加物资
     * POST /material
     *
     * @return Response
     */
    public function postMaterialBatch()
    {
        $result = Excel::selectSheetsByIndex(0)->load(Input::file('qqfile'), function($reader) {
            $reader->each(function($sheet) {
                $sheet->each(function($row) {
                    try
                    {
                        $material = new Material;

                        $material->name = $row->name;
                        $material->total_number = $row->sum;
                        $material->lent_number  = $row->lent;
                        $material->category_id  = 3;
                        $material->comment      = $row->comment;

                        if (! $material->save())
                        {
                            return false;
                        }
                    }
                    catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
                    {
                        return Response::make('Not Found', 404);
                    }

                });
            });
            return true;
        });
        return Response::json($result);
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
     * 更改物资
     * PUT /material/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function putMaterialUpdate()
    {
        if ( ($id    = Input::get('mid')) &&
             ($value = Input::get('value')) &&
             ($col   = Input::get('col'))
        )
        {
            $type = array('name', 'category_id', 'lent_number', 'total_number');
        }
        else
        {
            return Response::json(array('success' => false,
                'error' => 'Missing input' ));
        }

        try
        {
            $material = Material::find($id);

            switch ($col)
            {
            case '1':
                $material->name = $value;
                break;
            case '2':
                $material->category_id = $value;
                $value = Category::find($value)->name;
                break;
            case '3':
                $material->lent_number = $value;
                break;
            case '5':
                $material->total_number = $value;
            }

            if ( ! $material->save())
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not save!'));
            }

            return Response::json(array('success' => true,
                'value' => $value));
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage() ));
        }
        catch (\Exception $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage() ));
        }
    }

    /**
     * 删除物资
     * DELETE /material/{id}
     *
     * @return Response
     */
    public function delMaterial()
    {
        try
        {
            Material::destroy(Request::segment(2));

            return Response::json(array('success' => true));
        }

        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage() ));
        }
    }

}
