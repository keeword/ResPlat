@extends('master') 

@section('workroomManagement')
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
                <strong>工作室审核</strong>
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
        <h5>未审核申请</h5> 
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
            <th>借出时间</th>
            <th>归还时间</th>
            <th>审核状态</th> 
            <th>操作</th> 
        </tr> 
        </thead> 
        <tbody> 
        @foreach ($workrooms as $workroom)
        <tr>
            <td>{{ $workroom->created_at }}</td> 
            @if ($workroom->user)
            <td>{{ $workroom->user->nickname }}</td> 
            @else
            <td></td>
            @endif
            <td>{{ Lang::get('msg.'.$workroom->name) }}</td>
            <td>{{ $workroom->borrow_time }}</td> 
            <td>{{ $workroom->return_time }}</td> 
            <td><button  class="btn btn-rounded 
                @if ($workroom->status === 'wating') 
                    {{ 'btn-warning' }} 
                @elseif ($workroom->status === 'refuse')
                    {{ 'btn-danger' }} 
                @elseif ($workroom->status === 'pass')
                    {{ 'btn-primary' }} 
                @endif" 
                >{{ $workroom->status }}</button></td> 
            <td>
            <a href="#" class="btn btn-info btn-circle" type="button" onClick="passWorkroom({{ $workroom->id }})"><i class="fa fa-check"></i> </a> 
            <a href="#" class="btn btn-warning btn-circle" type="button" onClick="refuseWorkroom({{ $workroom->id }})"><i class="fa fa-times"></i> </a> 
            </td> 
        </tr> 
        @endforeach
        </tbody> 
        </table> 
    </div> 

</div> 

<div class="ibox float-e-margins"> 
    <div class="ibox-title"> 
        <h5>已审核申请</h5> 
        <div class="ibox-tools"> 
            <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
            <a class="close-link"> <i class="fa fa-times"></i> </a> 
        </div> 
    </div> 

    <div class="ibox-content"> 
        <table class="table table-striped table-bordered table-hover"> 
        <thead> 
        <tr> 
            <th>申请时间</th> 
            <th>申请部门</th> 
            <th>申请项目</th> 
            <th>借出时间</th>
            <th>归还时间</th>
            <th>审核状态</th> 
        </tr> 
        </thead> 
        <tbody> 
        @foreach ($works as $work)
        <tr>
            <td>{{ $work->created_at }}</td> 
            @if ($work->user)
            <td>{{ $work->user->nickname }}</td> 
            @else
            <td></td>
            @endif
            <td>{{ Lang::get('msg.'.$work->name) }}</td>
            <td>{{ $work->borrow_time }}</td> 
            <td>{{ $work->return_time }}</td> 
            <td><button  class="btn btn-rounded 
                @if ($work->status === 'wating') 
                    {{ 'btn-warning' }} 
                @elseif ($work->status === 'refuse')
                    {{ 'btn-danger' }} 
                @elseif ($work->status === 'pass')
                    {{ 'btn-primary' }} 
                @endif" 
                >{{ $work->status }}</button></td> 
        </tr> 
        @endforeach
        </tbody> 
        </table> 
        <div class="row">
            <div class="col-sm-12">
            <div class="dataTables_paginate paging_simple_numbers">
                {{ $works->links() }}
            </div>
            </div>
        </div>
    </div> 

</div> 
</div> 
</div> 
</div> 
</div> 

@stop 
