@extends('master')

@section('content')

<div class="wrapper wrapper-content col-lg-12">
<div class="col-lg-12">
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-lg-10">
        <h2>主页</h2>
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
            <h4>用户信息</h4>
        </div>

        <div class="ibox float-e-margins">
            <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>用户帐号</th>
                <th>部门</th>
                <th>用户角色</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Session::get('username') }}</td>
                <td>{{ Session::get('nickname') }}</td>
                <td>{{ Session::get('usergroup') }}</td>
            </tr>
            </tbody>
            </table>
         </div>

    </div>
<!--
    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>消息公告</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>公告时间</th>
                <th>内容</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-nowrap">
                2015.1.18 14:00
                </td>
                <td>blablablablabla</td>
            </tr>
            </tbody>
            </table>
        </div>

    </div>
-->

    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>我的物资申请</h5>
            <div class="ibox-tools">
                <a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
                <a class="close-link"><i class="fa fa-times"></i> </a>
            </div>
        </div>

        <div class="ibox-content">
        <table class="table table-striped table-bordered table-hover dataTables-example">
        <thead>
        <tr>
            <th>申请时间</th>
            <th>申请项目</th>
            <th>审核状态</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($applications as $application)
        <tr>
            <td>{{ $application->created_at }}</td>
            <td>
            @foreach ($application->material as $material)
                {{ $material->name.',' }}
            @endforeach
            </td>
            <td><button  class="btn btn-rounded 
                @if ($application->status === 'wating') 
                    {{ 'btn-warning' }} 
                @elseif ($application->status === 'refuse')
                    {{ 'btn-danger' }} 
                @elseif ($application->status === 'pass')
                    {{ 'btn-primary' }} 
                @endif" 
                >{{ $application->status }}</button></td> 
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>

    </div>

    <div class="ibox float-e-margins">

        <div class="ibox-title">
            <h5>我的工作室申请</h5>
            <div class="ibox-tools">
                <a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
                <a class="close-link"><i class="fa fa-times"></i> </a>
            </div>
        </div>

        <div class="ibox-content">
        <table class="table table-striped table-bordered table-hover dataTables-example">
        <thead>
        <tr>
            <th>申请时间</th>
            <th>申请项目</th>
            <th>审核状态</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($workrooms as $workroom)
        <tr>
            <td>{{ $workroom->created_at }}</td>
            <td>{{ $workroom->name }}</td>
            <td><button  class="btn btn-rounded 
                @if ($workroom->status === 'wating') 
                    {{ 'btn-warning' }} 
                @elseif ($workroom->status === 'refuse')
                    {{ 'btn-danger' }} 
                @elseif ($workroom->status === 'pass')
                    {{ 'btn-primary' }} 
                @endif" 
                >{{ $workroom->status }}</button></td> 
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
