@extends('layout') 

@section('master')

<div class="gray-bg">
<div class="row"> 
<div class="col-lg-12"> 
<div class="text-center fadeInDown" align="center">
<div class="ibox float-e-margins"> 
<div class="ibox-content"> 

{{ Form::open(array('url' => 'workroom', 'class' => 'm-t text-left',  
    'id' => 'createworkroomform')) }}

    {{ Form::hidden('name', 'workroom')}}

    <div class="form-group">
    {{ Form::label('reason', '申请原因' ,array('class'=>'control-label')) }}
    {{ Form::textarea('reason', '', array('class' => 'form-control',
        'placeholder' => '申请原因', 'require' => '', 'rows' => 2)) }}
    </div>

    <div class="form-group">
    {{ Form::label('time', '申请时间', array('class' => 'control-label')) }}
    <small>{{ $date }}</small>
    {{ Form::hidden('date', $date) }}
    <div>
    {{ Form::text('btime', '', array('placeholder' => '借出时间', 'type' => 'date', 'id'=>'btime',
        'class' => 'form-control', 'require' => '')) }}
    {{ Form::text('rtime', '', array('placeholder' => '归还时间', 'type' => 'date', 'id'=>'etime',
        'class' => 'form-control', 'require' => '')) }}
    </div>
    </div>

    <div class="form-group">
    {{ Form::label('person', '申请人' ,array('class'=>'control-label')) }}
    {{ Form::text('person', '', array('class' => 'form-control',
        'placeholder' => '申请人', 'require' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('phone', '联系方式' ,array('class'=>'control-label')) }}
    <small>(选填)</small>
    {{ Form::text('phone', '', array('class' => 'form-control',
        'placeholder' => '联系方式')) }}
    </div>

    {{ Form::submit('确定申请', array('class' => 'btn btn-info block full-width m-b')) }}

{{ Form::close() }}

</div>
</div>
</div>
</div>
</div>
</div>

@stop
