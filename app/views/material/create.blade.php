@extends('layout') 

@section('sidebar')

<div class="gray-bg">
 <div class="row"> 
  <div class="col-lg-12"> 
<div class="text-center fadeInDown" align="center">

{{ Form::open(array('url' => 'materail', 'class' => 'm-t text-left', 'id' => 'creatematerialform')) }}

   <div class="ibox float-e-margins"> 

  <div class="col-lg-10"> 
    <div class="form-group">
    {{ Form::label('name', '物资名称', array('class'=>'control-label')) }}
    {{ Form::text('name', '', array('class' => 'form-control',
        'placeholder' => '物资名称', 'require' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('number', '总数量' ,array('class'=>'control-label')) }}
    {{ Form::text('number', '', array('class' => 'form-control',
        'placeholder' => '总数量', 'require' => '', 'type' => 'number')) }}
    </div>

    <div class="form-group">
    {{ Form::label('comment', '备注' ,array('class'=>'control-label')) }}
    {{ Form::textarea('comment', '', array('class' => 'form-control',
        'placeholder' => '备注', 'rows' => 2)) }}
    </div>

    <div class="form-group">
    {{ Form::label('category', '物资分类',array('class'=>'control-label')) }}
    {{ Form::select('category', $category, '', array('class' => 'chosen-select')) }}
    </div>

    {{ Form::submit('确定申请', array('class' => 'btn btn-info block full-width m-b')) }}
{{ Form::close() }}

</div>
</div>

@stop
