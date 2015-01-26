<?php
namespace App\Controllers;

use Material, Application, ApplicationMaterial, Category;
use BaseController, View, Input, Redirect, Response, Lang, Session, Request;

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

        return View::make('application.index')->with('materials', $materials);
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
            if ( ! $materials = Material::select('id',    'name')
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
                                               ->with('material',  $material);
    }

    /**
     * 处理申请
     * POST /application
     *
     * @return Response
     */
    public function postApplication()
    {
        if ( ($user_id     = Session::get('userid')) &&
             ($reason      = Input::get('reason'))   &&
             ($borrow_time = Input::get('btime'))    &&
             ($return_time = Input::get('rtime'))    &&
             ($person      = Input::get('person')) )
        {
            $phone = Input::get('phone');
        }
        else
        {
            return Response::json(array('success' => false,
                'error' => 'Missing input' ));
        }

        try
        {
            $application = new Application;

            $application->user_id     = $user_id;
            $application->reason      = $reason;
            $application->borrow_time = $borrow_time;
            $application->return_time = $return_time;
            $application->person      = $person;
            $application->phone       = $phone;

            if ( ! $application->save() )
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not save!'));
            }

            $materials = array();

            foreach(Input::all() as $id => $num)
            {
                if (is_numeric($id) && is_numeric($num) && $num != "0")
                {
                    $materials[] = array('application_id' => $application->id,
                                         'material_id'    => $id,
                                         'number'         => $num);
                }
            }

            if ( ! ApplicationMaterial::insert($materials) )
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not save!'));
            }

/*
            $mat = Material::lists('lent_number', 'id');
            foreach ($materials as $material)
            {
                Material::where('id', $material['material_id'])
                        ->update(array('lent_number' =>
                            $material['number']+$mat[$material['material_id']] ));
            }
*/
            return Response::json(array('success' => true));


// try to use one sql query to update the `lent_number` column of table `material`
/*
            $model    = new Material;
            $sql      = "UPDATE `".DB::getTablePrefix().$model->getTable().
                     '` SET `lent_number` = CASE `id` ';

            foreach ($materials as $material)
            {
                $sql .= "WHEN '".$material['material_id']
                     .  "' THEN '".$material['number']. "' ";
            }

            $sql     .= "END WHERE `id` IN (";

            foreach ($materials as $material)
            {
                $sql .= "'".$material['material_id']."',";
            }

            $sql      = rtrim($sql, ", ");
            $sql     .= ")";

            if ( ($result = DB::raw('select')) )
            {
                return Response::json(array('success' => $result));
            }

            else
            {
                return Response::json(array('success' => false,
                    'error' => $result.'unknown error'));
            }
*/

        }

        catch (\Exception $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }
    }

    /**
     * 物资详情
     * GET /application/{id}
     *
     * @return View
     */
    public function getApplicationDetail()
    {
        try
        {
            $id   = Request::segment(2);

            if ( ! ($application = Application::with('user')->find($id)) )
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not find application id!'));
            }

            $app_mats = ApplicationMaterial::with('material')
                                           ->where('application_id', $id)
                                           ->get();

            $categorys = Category::lists('name', 'id');
        }

        catch (\Exception $e)
        {
            return Response::make($e->getMessage(), 404);
        }

        return View::make('application.detail')
                   ->with('application', $application)
                   ->with('categorys', $categorys)
                   ->with('app_mats', $app_mats);
    }

    /**
     * 审核页面
     * GET /application/update
     *
     * @return View
     */
    public function getApplicationUpdate()
    {
        $applications = Application::with('user')
                                   ->where('status', 'wating')
                                   ->get();
        return View::make('application.update')->with('applications', $applications);
    }

    /**
     * 审核
     * PUT /application/{id}
     *
     * @return Response
     */
    public function postApplicationUpdate()
    {
        if ( ($id         = Request::segment(2))  &&
             ($app_mats   = Input::get('data'))   &&
             ($status     = Input::get('status')) &&
              $checker_id = Session::get('userid') )
        {
            $response     = Input::get('response');
        }

        else
        {
            return Response::json(array('success' => false,
                'error' => 'Missing input' ));
        }

        try
        {
            $application = Application::find($id);

            $application->status     = $status;
            $application->response   = $response;
            $application->checker_id = $checker_id;

            if ( ! $application->save())
            {
                return Response::json(array('success' => false,
                    'error' => 'Can not save!' ));
            }

            $mat = Material::lists('lent_number', 'id');
            foreach ($app_mats as $id => $number)
            {
                $material = ApplicationMaterial::find($id);
                $material->number = $number;
                $material->save();
                Material::where('id', $material['material_id'])
                        ->update(array('lent_number' =>
                            $number+$mat[$material['material_id']] ));
            }

            return Response::json(array('success' => true));

        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }
        catch (\Exception $e)
        {
            return Response::json(array('success' => false,
                'error' => $e->getMessage()));
        }
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
