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
    {{ Form::number('btime', '6', array('placeholder' => '借出日期', 'type' => 'date',
        'class' => 'form-control layer-date', 'require' => '',
        'min' => 6, 'max' => 24, 'step' => 1)) }}
    {{ Form::number('rtime', '6', array('placeholder' => '归还日期', 'type' => 'date',
        'class' => 'form-control layer-date', 'require' => '',
        'min' => 6, 'max' => 24, 'step' => 1)) }}
    </div>
    </div>

    <div class="form-group">
    {{ Form::label('person', '申请人' ,array('class'=>'control-label')) }}
    {{ Form::text('person', '', array('class' => 'form-control',
        'placeholder' => '申请人', 'require' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('phone', '联系方式' ,array('class'=>'control-label')) }}
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
