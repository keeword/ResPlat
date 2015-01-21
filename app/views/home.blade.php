@extends('master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><a href="{{ URL::route('home') }}">主页</a></h2>
    </div>
</div>



<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">


            <div class="ibox-title">
                <h5>物资一览</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>


            <div class="ibox-content">

                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>物资名称</th>
                            <th>物资品类</th>
                            <th>在借数量</th>
                            <th>剩余数量</th>
                            <th>总数量</th>
                            <th>借出情况</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($materials as $material)

                        <tr class="gradeX">
                            <td>{{ $material->name }}</td>
                            <td>{{ $material->category->category }}</td>
                            <td>{{ $material->lent_number }}</td>
                            <td>{{ $material->total_number - $material->lent_number }}</td>
                            <td>{{ $material->total_number }}</td>
                            <td>这里有十个字符。。。</td>
                        </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>物资名称</th>
                            <th>物资品类</th>
                            <th>在借数量</th>
                            <th>剩余数量</th>
                            <th>总数量</th>
                            <th>借出情况</th>
                        </tr>
                    </tfoot>
                </table>

            </div>


        </div>
    </div>
</div>
</div>

@stop
