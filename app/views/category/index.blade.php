@extends('master')

@section('materialManagement')
 class="active"
@stop

@section('content')

<div class="wrapper wrapper-content">
<div class="col-lg-12">
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-lg-10">
        <h2>品类管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                <strong>品类管理</strong>
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
        <h5>品类一览</h5>
        <div class="ibox-tools">
            <a class="collapse-link"><i class="fa fa-chevron-up"></i> </a>
            <a class="close-link"><i class="fa fa-times"></i> </a>
        </div>
    </div>

    <div class="ibox-content">
        <table class="table table-striped table-bordered table-hover edit-table">
        <a class="btn btn-outline btn-primary" id="btn-addcategory" href="javascript:;" onClick="addCategory()">添加分类</a>
        <thead>
        <tr>
            <th>品类名称</th>
            <th>物资</th>
            <th>删除品类</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr class="gradeX">
            <td class="edit-td">{{ $category->name }}</td>
            <td>
            @foreach ($category->material as $mat)
                {{ $mat->name . ',' }}
            @endforeach
            </td>
            <td><a href="#" class="btn btn-warning btn-circle" type="button" onClick="delCategory({{ $category->id }})"><i class="fa fa-times"></i></a></td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>品类名称</th>
            <th>物资</th>
            <th>删除品类</th>
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
