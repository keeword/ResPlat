@extends('layout') 

@section('master')

<div class="gray-bg">
<div class="row"> 
<div class="col-lg-12"> 
<div class="text-center fadeInDown" align="center">

    <div class="ibox float-e-margins"> 

    <div class="ibox-content"> 
    {{ Form::open(array('url' => 'user', 'class' => 'm-t text-left',  'id' => 'createuserform')) }}
    	
        <div class="form-group">
        {{ Form::label('username', '用户名' ,array('class'=>'control-label','id'=>'labelusername'))}}
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control','id'=>'username', 'placeholder' => '用户名')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('nickname', '部门' ,array('class'=>'control-label','id'=>'labelusername')) }}
        {{ Form::text('nickname', Input::old('nickname'), array('class' => 'form-control', 'id'=>'nickname', 'placeholder' => '部门')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('password', '密码' ,array('class'=>'control-label','id'=>'labelusername')) }}
        {{ Form::password('password', array('class' => 'form-control','id'=>'password', 'placeholder' => '密码')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('repasswd', '确认密码' ,array('class'=>'control-label','id'=>'labelusername')) }}
        {{ Form::password('repasswd', array('class' => 'form-control', 'id'=>'repasswd', 'placeholder' => '确认密码')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('group', '用户组',array('class'=>'control-label')) }}
        {{ Form::select('group', $groups, 'user', array('class' => 'chosen-select')) }}
        </div>
        
        {{ Form::submit('创建', array('class' => 'btn btn-info block full-width m-b ')) }}

    {{ Form::close() }}
    </div>
    </div>
    

</div>
</div>
</div>
</div>

@stop
