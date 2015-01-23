<?php
namespace App\Controllers;

use Material;
use BaseController, View, Input, Redirect, Response, Lang, Session;

class ApplicationController extends BaseController {

    /**
     * 物资一览表
     * GET /application
     *
     * @return View
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
        $material = array();
        foreach(Input::all() as $id => $num)
        {
            if (is_numeric($id) && is_numeric($num) && $num != "0")
            {
                $material[$id] = $num;
            }
        }

        try
        {
            if ( ! $materials = Material::select('id','name')
                                          ->whereIn('id', array_keys($material))
                                          ->get())
            {
                throw new \Exception('User infomation was not updated.');
            }
        }
        catch (\Exception $e)
        {
            return Response::make('Not Found', 404);
        }

        return View::make('application.create')->with('materials', $materials)
                                               ->with('material', $material);
    }

    /**
     * 储存申请
     * POST /application
     *
     * @return Response
     */
    public function postApplication()
    {
        $material = array();
        foreach(Input::all() as $id => $num)
        {
            if (is_numeric($id) && is_numeric($num) && $num != "0")
            {
                $material[$id] = $num;
            }
        }
        if ( ($user_id      = Session::get('userid')) &&
             ($reason       = Input::get('reason')) &&
             ($borrow_time  = Input::get('btime')) &&
             ($return_time = Input::get('rtime')) &&
             ($person = Input::get('person')) )
        {
            $phone = Input::get('phone');
        }
        else
        {
            return Response::json(array('success' => false, 'error' => Lang::get('user.login_error')));
        }

            echo var_dump($material) . '<br/>';
            echo var_dump($user_id) . '<br/>';
            echo var_dump($reason) . '<br/>';
            echo var_dump($borrow_time) . '<br/>';
            echo var_dump($return_time) . '<br/>';
            echo var_dump($person) . '<br/>';

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
