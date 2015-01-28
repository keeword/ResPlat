@extends('layout') 

@section('master')

<div class="gray-bg">
<div class="row"> 
<div class="col-lg-12"> 
<div class="text-center fadeInDown" align="center">

    <div class="ibox float-e-margins"> 

    <div class="ibox-content"> 
    {{ Form::open(array('url' => 'user/'.$user->id, 'class' => 'm-t text-left',  'id' => 'updateuserform', 'method' => 'put')) }}
    
        <div class="form-group">
        {{ Form::label('username', '用户名',array('class'=>'control-label','id'=>'labelusername')) }}
        <p class="form-control-static">{{ $user->username }} </p>
        </div>
    
        <div class="form-group">
        {{ Form::label('nickname', '部门',array('class'=>'control-label','id'=>'labelusername')) }}
        <small>(选填)</small>
        {{ Form::text('nickname', $user->nickname, array('class' => 'form-control')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('password', '密码',array('class'=>'control-label','id'=>'labelusername')) }}
        <small>(选填)</small>
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '密码')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('repasswd', '确认密码',array('class'=>'control-label','id'=>'labelusername')) }}
        <small>(选填)</small>
        {{ Form::password('repasswd', array('class' => 'form-control', 'placeholder' => '确认密码')) }}
        </div>
    
        <div class="form-group">
        {{ Form::label('group', '用户组',array('class'=>'control-label','id'=>'labelusername')) }}
        {{ Form::select('group', $groups, $user->groups->first()->name, array('class' => 'chosen-select')) }}
        </div>
        
    
        {{ Form::submit('修改', array('class' => 'btn btn-info block full-width m-b')) }}

    {{ Form::close() }}
    </div>
    </div>
    

</div>
</div>
</div>
</div>

@stop
