@extends('master') 

@section('content') 

<div class="wrapper wrapper-content"> 
    <div class="col-lg-12"> 
    <div class="row  border-bottom white-bg dashboard-header">
         <div class="col-lg-10">
            <h2>工作室审核</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ URL::route('home') }}">主页</a>
                </li>
                <li>
                    工作室管理
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
            <div class="ibox-content">
                <div id="calendar"></div>
            </div>        
        </div>
    </div>
</div>
@stop 

