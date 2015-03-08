@extends('master')

@section('materialManagement')
 class="active"
@stop

@section('content')

<div class="wrapper wrapper-content">
<div class="col-lg-12">
<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        <h2>物资审核</h2>
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

@if ($application->status != 'refuse' && $application->status != 'pass')
{{ Form::open(array('url' => 'application'.'/'.$application->id, 'name'=>'passorrefuse', 'id'=>'passorrefuse', 'method' => 'PUT'))}}
@endif
<div class="ibox float-e-margins">

    <div class="ibox-title">
        <h5>申请详情</h5>
    </div>

    <div class="ibox-content">
    <div>
        <span class="list-group-item">申请部门：{{ $application->user->nickname }}</span>
        <span class="list-group-item">申请理由：{{ $application->reason }}</span>
        <span class="list-group-item">申请时间：{{ $application->created_at }}</span>
        <span class="list-group-item">借出时间：{{ $application->borrow_time}} 到
        {{ $application->return_time }}</span>
        <br />
    </div>

    <table class="table table-striped table-bordered table-hover dataTables-example">
        <thead>
        <tr>
            <th>物资名称</th>
            <th>物资品类</th>
            <th>借用数量</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($app_mats as $app_mat)
        <tr class="gradeX">
            @if ($app_mat->material)
            <td>{{ $app_mat->material->name }}</td>
            <td>{{ $categories[$app_mat->material->category_id] or '品类已删除' }}</td>
            @if ($application->status != 'refuse' && $application->status != 'pass')
            <td>{{ Form::number("data[$app_mat->id]", $app_mat->number) }}</td>
            @else
            <td>{{ $app_mat->number }}</td>
            @endif
            @else
            <td>物品不存在</td>
            <td>物品不存在</td>
            <td>物品不存在</td>
            @endif
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>物资名称</th>
            <th>物资品类</th>
            <th>借用数量</th>
        </tr>
        </tfoot>
        </table>

    </div>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        @if ($application->status != 'refuse' && $application->status != 'pass')
        <h5>审核</h5>
        @else
        <h5>审核结果</h5>
        @endif
    </div>
    <div class="ibox-content">
        @if ($application->status != 'refuse' && $application->status != 'pass')
        <div>
            {{ Form::label('response', '审核原因' ,array('class'=>'control-label')) }}
            {{ Form::textarea('response', '', array('class' => 'form-control',
                'placeholder' => '审核原因', 'require' => '', 'rows' => 2)) }}
        </div>
        <div>
        {{ Form::hidden('status', 'pass')}}
        <input type="button" id="passbtn" onclick="passubmitFun()" value="通过">
        <input type="button" id="refusebtn" onclick="refusesubmitFun()" value="拒绝">
        </div>
        @else
        <div>
            {{ $application->response }}
        </div>
        @endif
        
    </div>
</div>
@if ($application->status != 'refuse' && $application->status != 'pass')
{{ Form::close() }}
@endif
</div>
</div>
</div>


@stop
