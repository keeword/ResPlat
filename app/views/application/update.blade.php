@extends('master') 

@section('materialManagement')
 class="active"
@stop

@section('content') 

<div class="wrapper wrapper-content"> 
<div class="col-lg-12"> 
<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        <h2>主页</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                <strong>物资审核</strong>
            </li>
        </ol>
    </div>
</div>
</div>
</div>


<div class="col-lg-12"> 
<div class="wrapper wrapper-content"> 
<div class="row"> 
<div class="col-lg-12"> 
<div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>申请情况</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
      <thead> 
       <tr> 
        <th>申请时间</th> 
        <th>申请部门</th> 
        <th>申请项目</th> 
        <th>审核状态</th> 
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody> 
       @foreach ($applications as $application)
       <tr>
        <td>{{ $application->created_at }}</td> 
        <td>{{ $application->user->nickname }}</td> 
        <td><a href="{{ URL::route('application').'/'.$application->id }}">详情</a></td> 
        <td><a class="btn btn-rounded 
            @if ($application->status === 'wating') 
                {{ 'btn-warning' }} 
            @elseif ($application->status === 'refuse')
                {{ 'btn-danger' }} 
            @elseif ($application->status === 'pass')
                {{ 'btn-primary' }} 
            @endif" 
            href="">{{ $application->status }}</a></td> 
        <td><button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i> </button> <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button> </td> 
       </tr> 
       @endforeach
      </tbody> 
     </table> 
    </div> 

   </div> 


  </div> 
 </div> 
</div> 

</div> 


@stop 
