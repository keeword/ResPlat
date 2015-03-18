@extends('master')

@section('materialManagement')
 class="active"
@stop

@section('content')

<div class="wrapper wrapper-content">
<div class="col-lg-12">
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-lg-10">
        @if ($isAdmin)
        <h2>物资管理</h2>
        @else
        <h2>物资一览</h2>
        @endif
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                @if ($isAdmin)
                <strong>物资管理</strong>
                @else
                <strong>物资一览</strong>
                @endif
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
            <h5>物资一览</h5>
            <div class="ibox-tools">
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                <a class="close-link"><i class="fa fa-times"></i></a>
            </div>
        </div>

        <div class="ibox-content">
            @if ($isAdmin)
            <table id="materialTab" class="table table-striped table-bordered table-hover edit-table">
                <span id="batchCreate">
                <a href="javascript:;" class="btn btn-outline btn-primary" onclick="patchCreate()">批量添加</a>
                </span>
                <span>
                <a href="javascript:;" class="btn btn-outline btn-primary" onClick="addMaterial()">单个添加</a>
                </span>
                <span>
                <a href="javascript:;" class="btn btn-outline btn-primary">批量删除</a>
                </span>
            @else
            <table id="materialTab" class="table table-striped table-bordered table-hover dataTables-example">
            @endif
            <thead>
            <tr>
                @if ($isAdmin)
                <th></th>
                @endif
                <th>物资名称</th>
                <th>物资品类</th>
                <th>借出数量</th>
                <th>剩余数量</th>
                <th>总数</th>
                <th>借出情况</th>
                @if ($isAdmin)
                <th>删除</th>
                @endif
            </tr>
            </thead>
            <tbody id="tbodyid">
            @foreach ($materials as $material)
            <tr class="gradeX">
                @if ($isAdmin) 
                <td> {{ Form::checkbox('material', $material->id) }}</td>
                @endif
                <td @if($isAdmin) class="edit-td" @endif>@if ($material->name){{ $material->name }}@else {{ '物资不存在' }} @endif </td>      
                <td @if($isAdmin) class="edit-se" @endif>@if ($material->category){{ $material->category->name }}@else {{ '物资没有品类' }} @endif </td>
                <td @if($isAdmin) class="edit-td" @endif>{{ $material->lent_number }}</td>
                <td>{{ $material->total_number - $material->lent_number }}</td>
                <td @if($isAdmin) class="edit-td" @endif>{{ $material->total_number }}</td>
                <td><button type="button" class="btn btn-default"
                    data-toggle="tooltip" data-placement="top" title="@foreach($app_mats as $app_mat)@if($app_mat->material_id === $material->id){{ $users[$applications[$app_mat->application_id]].'借出'.$app_mat->number }}@endif @endforeach">借出详情
                </button></td>
                @if ($isAdmin)
                <td><a href="#" class="btn btn-warning btn-circle" type="button" onClick="delMaterial({{ $material->id }})"><i class="fa fa-times"></i></a></td>
                @endif
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                @if ($isAdmin)
                <th></th>
                @endif
                <th>物资名称</th>
                <th>物资品类</th>
                <th>借出数量</th>
                <th>剩余数量</th>
                <th>总数</th>
                <th>借出情况</th>
                @if ($isAdmin)
                <th>删除</th>
                @endif
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
