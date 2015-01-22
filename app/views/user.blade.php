@extends('master') 

@section('content') 

<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        <h2>新增账号</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                <strong>帐号管理</strong>
            </li>
        </ol>
    </div>
</div>

<div class="col-lg-12"> 

<div class="wrapper wrapper-content"> 
 <div class="row"> 
  <div class="col-lg-12"> 

   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>用户列表</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
       <a href="javascript:;" class="btn btn-outline btn-primary">新增账号</a>
       <button type="button" class="btn btn-outline btn-danger">批量删除</button>
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
      <thead> 
       <tr> 
        <th>用户帐号</th> 
        <th>用户名</th> 
        <th>用户角色</th> 
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody>
       @foreach ($users as $user) 
       <tr class="gradeX"> 
        <td>{{ $user->username }}</td> 
        <td>{{ $user->nickname }}</td> 
        <td>{{ Lang::get('user.'.$user->groups->first()->name) }}</td> 
        <td>
            <a class="btn btn-info btn-rounded" href="#"><i class="fa fa-paste"></i>修改</a>
            <a class="btn btn-warning btn-rounded" href="#"><i class="fa fa-warning"></i>删除</a>
        </td>
       </tr> 
       @endforeach 
      </tbody> 
      <tfoot> 
       <tr> 
        <th>用户帐号</th> 
        <th>用户名</th> 
        <th>用户角色</th> 
        <th>操作</th> 
       </tr> 
      </tfoot> 
     </table> 
    </div> 

   </div> 


  </div> 
 </div> 
</div> 

</div> 


@stop 
