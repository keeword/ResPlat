@extends('layout') 

@section('sidebar') 

<div class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">

{{ Form::open(array('url' => 'user', 'class' => 'm-t text-left',  'id' => 'createuserform')) }}

    <div class="form-group">
    {{ Form::label('username', '用户名') }}
    {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => '用户名', 'required' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('nickname', '部门') }}
    {{ Form::text('nickname', Input::old('nickname'), array('class' => 'form-control', 'placeholder' => '部门', 'required' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('password', '密码') }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '密码', 'required' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('repasswd', '确认密码') }}
    {{ Form::password('repasswd', array('class' => 'form-control', 'placeholder' => '确认密码', 'required' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('group', '用户组') }}
    {{ Form::select('group', $groups, 'user', array('class' => 'chosen-select')) }}
    </div>

    {{ Form::submit('创建', array('class' => 'btn btn-info block full-width m-b')) }}
{{ Form::close() }}

</div>
</div>

@stop
