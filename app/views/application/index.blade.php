@extends('master')

@section('materialManagement')
 class="active"
@stop

@section('content')

<div class="wrapper wrapper-content">
<div class="col-lg-12">
<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        <h2>物资申请</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                <strong>物资申请</strong>
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
            <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
            <a class="close-link"> <i class="fa fa-times"></i> </a>
        </div>
    </div>

    <div class="ibox-content">
        <table class="table table-striped table-bordered table-hover dataTables-example">
        <thead>
        <tr>
            <th>物资名称</th>
            <th>物资品类</th>
            <th>剩余数量</th>
            <th>借出情况</th>
            <th>需求数量</th>
       </tr>
        </thead>
        <tbody>
        @foreach ($materials as $material)
        <tr class="gradeX">
            <td>@if ($material->name) {{ $material->name }} @else {{ '物资不存在'}} @endif </td>
            <td>@if ($material->category){{ $material->category->name }}@else {{ '物资没有品类' }} @endif </td>
            <td>{{ $material->total_number - $material->lent_number }}</td>
            <td><button type="button" class="btn btn-default"
                data-toggle="tooltip" data-placement="top" title="@foreach($app_mats as $app_mat)@if($app_mat->material_id === $material->id){{ $users[$applications[$app_mat->application_id]].'借出'.$app_mat->number }}@endif @endforeach">借出详情
            </button></td>
            <td><span>
                {{ Form::hidden('id', $material->id) }}
                <a href="javascript:;" class="J_minus" onclick="forminputminus({{ $material->id }})" style="width:4px;padding:2px 7px;background-color:#e9e9e9;border:1px solid #ccc;text-decoration:none;color:#585858;line-height:20px">-</a>
                {{ Form::text($material->id, '0', array('class' => 'J_input', 'onblur'=>"forminput($material->id,$material->total_number - $material->lent_number)", 'id' => "applicationForm".$material->id, 'style' => 'width:40px;height:28px;margin:0 8px;padding:2px;border:1px solid #ccc;text-align:center;line-height:16px')) }}
                <a href="javascript:;" class="J_add" onclick="forminputadd({{ $material->id }}, {{ $material->total_number - $material->lent_number }})" style="padding:2px 5px;background-color:#e9e9e9;border:1px solid #ccc;text-decoration:none;color:#585858;line-height:20px">+</a>
            </span></td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>物资名称</th>
            <th>物资品类</th>
            <th>剩余数量</th>
            <th>借出情况</th>
            <th>需求数量</th>
        </tr>
        </tfoot>
        </table>
        <input type="button" onclick = "submitapplication()" value="提交">
    </div>

</div>
</div>
</div>
</div>
</div>


@stop
