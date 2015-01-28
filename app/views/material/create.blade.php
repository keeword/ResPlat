@extends('layout') 

@section('master')

<link href="css/create1.css" rel="stylesheet">


<style type="text/css">
	/*.ibox-content{background-image:url(/img/createbg.jpg); 
		width:100%;
		height:100%;}*/

   /*.iboxinner{opacity: 0.;
               background-color: gray;
               height: 440px;
               width: 383px;
               }*/




</style>

<div class="gray-bg">
<div class="row"> 
<div class="col-lg-12"> 
<div class="text-center fadeInDown" align="center">

    <div class="ibox float-e-margins"> 

    <div class="ibox-content"> <div class="iboxinner">
    {{ Form::open(array('url' => 'material', 'class' => 'm-t text-left', 'id' => 'creatematerialform')) }}

        <div class="form-group">
        {{ Form::label('name', '物资名称', array('class'=>'control-label')) }}
        {{ Form::text('name', '', array('class' => 'form-control',
            'placeholder' => '物资名称', 'require' => '')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('number', '总数量' ,array('class'=>'control-label')) }}
        {{ Form::text('number', '', array('class' => 'form-control','onkeyup' => 'value=value.replace(/[^\d]/g,"")', 
            'onbeforepaste' => 'clipboardData.setData("text",clipboardData.getData("text").replace(/[^\d]/g,""))',
            'placeholder' => '总数量', 'require' => '', 'type' => 'number')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('description', '备注' ,array('class'=>'control-label')) }}
        {{ Form::textarea('description', '', array('class' => 'form-control',
            'placeholder' => '备注', 'rows' => 2)) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('category', '物资分类',array('class'=>'control-label')) }}
        {{ Form::select('category', $category, '', array('class' => 'chosen-select', 
            'require' =>'')) }}
        </div>
    
        {{ Form::submit('添加', array('class' => 'btn btn-info block full-width m-b')) }}

    {{ Form::close() }}</div>
    </div>
    </div>

</div>
</div>
</div>
</div>

@stop
