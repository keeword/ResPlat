<?php
namespace App\Controllers;

use User, Application, ApplicationMaterial, Material, Category, Workroom;
use BaseController, View, Input, Redirect, Response, Request, Session, Lang;

class WorkroomController extends \BaseController {

    /**
     * 工作室列表
     * GET /workroom
     *
     * @return View
     */
    public function getWorkroom()
    {
        return View::make('workroom.index');
    }

    /**
     * 会议室列表
     * GET /meetingroom
     *
     * @return View
     */
    public function getMeetingroom()
    {
        return View::make('workroom.meetingroom');
    }

    /** 工作室列表
     * GET /workroom/list
     *
     * @return Response
     */
    public function getWorkroomList()
    {
        try 
        {
            $start     = date('Y-m-d H:i:s', Input::get('start'));
            $end       = date('Y-m-d H:i:s', Input::get('end'));
            $workrooms = Workroom::with('user')
                                 ->where('status', 'pass')
                                 ->where('name', 'workroom')
                                 ->whereBetween('borrow_time', array($start, $end))
                                 ->get();

            $result = array();
            $i = 1;
            foreach ($workrooms as $workroom)
            {

                $result[] = array('id'     => $i,
                                  'start'  => $workroom->borrow_time,
                                  'end'    => $workroom->return_time,
                                  'user'   => $workroom->user->nickname,
                                  'person' => $workroom->person,
                                  'phone'  => $workroom->phone,
                                  'allDay' => false,
                            );

                $i = $i+1;
            }
        }

        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }

        return Response::json($result);
    }

    /** 会议室列表
     * GET /meetingroom/list
     *
     * @return Response
     */
    public function getMeetingroomList()
    {
        try 
        {
            $start     = date('Y-m-d H:i:s', Input::get('start'));
            $end       = date('Y-m-d H:i:s', Input::get('end'));
            $workrooms = Workroom::with('user')
                                 ->where('status', 'pass')
                                 ->where('name', 'meetingroom')
                                 ->whereBetween('borrow_time', array($start, $end))
                                 ->get();

            $result = array();
            $i = 1;
            foreach ($workrooms as $workroom)
            {

                $result[] = array('id'     => $i,
                                  'start'  => $workroom->borrow_time,
                                  'end'    => $workroom->return_time,
                                  'user'   => $workroom->user->nickname,
                                  'person' => $workroom->person,
                                  'phone'  => $workroom->phone,
                                  'allDay' => false,
                            );

                $i = $i+1;
            }
        }

        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }

        return Response::json($result);
    }

    /**
     * 申请工作室页面
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
     * 申请会议室页面
     * GET /meetingroom/create
     *
     * @return View
     */
    public function getMeetingroomCreate()
    {
        $date = Input::get('date');
        return View::make('workroom.meetingroomcreate')->with('date', $date);
    }

    /**
     * 申请工作室
     * POST /workroom
     *
     * @return Response
     */
    public function postWorkroom()
    {
        if ( ($user_id = Session::get('userid')) &&
             ($name    = Input::get('name'))     &&
             ($reason  = Input::get('reason'))   &&
             ($date    = Input::get('date'))     &&
             ($btime   = Input::get('btime'))    &&
             ($rtime   = Input::get('rtime'))    &&
             ($person  = Input::get('person')) )
        {
            $phone     = Input::get('phone');
        }

        else
        {
            return Response::json(array('success' => false,
                'error' => 'Missing input' ));
        }

        try
        {
            $workroom = new Workroom;

            $workroom->name        = $name;
            $workroom->user_id     = $user_id;
            $workroom->reason      = $reason;
            $workroom->person      = $person;
            $workroom->phone       = $phone;
            $workroom->email       = 'test@test.com';
            $workroom->borrow_time = $date.' '.(($btime>9)?$btime:('0'.$btime)).':00:00';
            $workroom->return_time = $date.' '.(($rtime>9)?$rtime:('0'.$rtime)).':00:00';

            if ( ! $workroom->save() )
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not save!'));
            }

            return Response::json(array('success' => true));
        }

        catch (\Exception $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }
    }

    /**
     * 审核页面
     * GET /workroom/update
     *
     * @return View
     */
    public function getWorkroomUpdate()
    {
        $workrooms = Workroom::with('user')
                             ->where('status', 'wating')
                             ->get();
        $works = Workroom::orderBy('id', 'desc')
                         ->whereIn('status', array('pass','refuse'))
                         ->paginate(15);
        return View::make('workroom.update')
                   ->with('works', $works)
                   ->with('workrooms', $workrooms);
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
     * 审核申请
     * PUT /workroom/{id}
     *
     * @return Response
     */
    public function putWorkroomUpdate()
    {
        if ( ($id      = Request::segment(2))  &&
             ($status  = Input::get('status')) &&
             ($checker = Session::get('userid'))
        )
        {
            $response  = Input::get('response');
        }
        else
        {
            return Response::json(array('success' => false,
                'error' => 'Missing input' ));
        }

        try
        {
            $workroom = Workroom::find($id);

            $workroom->status     = $status;
            $workroom->checker_id = $checker;
            $workroom->response   = $response;

            if ( ! $workroom->save())
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not save!' ));
            }

            return Response::json(array('success' => true));
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }
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
