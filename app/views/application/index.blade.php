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

    <form id="applicationForm" action="">
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
            <td>{{ $material->name }}</td>
            <td>{{ $material->category->name }}</td>
            <td>{{ $material->total_number - $material->lent_number }}</td>
            <td><a href="#">详情</a></td>
            <td><span>
                <a href="javascript:;" class="J_minus" style="width:4px;padding:2px 7px;background-color:#e9e9e9;border:1px solid #ccc;text-decoration:none;color:#585858;line-height:20px">-</a>
                {{ Form::text($material->id, '0', array('class' => 'J_input', 'style' => 'width:40px;height:28px;margin:0 8px;padding:2px;border:1px solid #ccc;text-align:center;line-height:16px')) }}
                <a href="javascript:;" class="J_add" style="padding:2px 5px;background-color:#e9e9e9;border:1px solid #ccc;text-decoration:none;color:#585858;line-height:20px">+</a>
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
        <input type="button" value="添加" onclick="forminputadd()">
        <input type="submit" value="提交">
    </div>
    </form>

</div>
</div>
</div>
</div>
</div>


@stop
