<?php
namespace App\Controllers;

namespace App\Controllers;

use User, Application, ApplicationMaterial, Material, Category;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;

class WorkroomController extends \BaseController {

    /**
     * 工作室列表
     * GET /workroom
     *
     * @return view
     */
    public function getWorkroom()
    {
        return View::make('workroom');
    }

    public function postWorkroomList()
    {
        Response::json(array('data' => array(array(
            'id' => '1',
            'title' => 'test',
            'start' => '2015-01-25 00:00:00',
            'end' => '2015-01-26 00:00:00',
            ))));
    }

    /**
     * Show the form for creating a new resource.
     * GET /workroom/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     *
     * POST /workroom
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /workroom/{id}
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
     * GET /workroom/{id}/edit
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
     * PUT /workroom/{id}
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
     * DELETE /workroom/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
