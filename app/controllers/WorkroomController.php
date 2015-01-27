<?php
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
        return View::make('workroom.index');
    }

    public function getWorkroomList()
    {
        return Response::json(array(
        	array(
	            'id' => '1',
	            'title' => 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',
	            'start' => '2015-01-25 12:00',
	            'end' => '2015-01-25 14:00',
	            'allDay' => false,
	            'phone' =>'1234666666',),
        	array(
	            'id' => '1',
	            'title' => 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',
	            'start' => '2015-01-25 14:00',
	            'end' => '2015-01-25 15:00',
	            'allDay' => false,
	            'phone' =>'1234666666',),
        	array(
	            'id' => '2',
	            'title' => 'test',
	            'start' => '2015-01-26 12:00',
	            'end' => '2015-01-26 15:00',
	            'allDay' => false,),   
            array(
	            'id' => '2',
	            'title' => 'test',
	            'start' => '2015-02-26 12:00',
	            'end' => '2015-02-26 15:00',
	            'allDay' => false,),  
            array(
	            'id' => '2',
	            'title' => 'test',
	            'start' => '2015-02-26 12:00',
	            'end' => '2015-02-26 15:00',
	            'allDay' => false,),       	
            ));
    }

    /**
     * 申请工作室
     * GET /workroom/create
     *
     * @return View
     */
    public function getWorkroomCreate()
    {
        $date = Input::get('date');
        return View::make('workroom.create')->with('date', $date);
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
