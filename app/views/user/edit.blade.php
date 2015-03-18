@extends('admin.main', array('title' => '修改用户'))

@section('master')

<div class="gray-bg">
<div class="row">
<div class="col-lg-12">
<div class="text-center fadeInDown" align="center">

<div class="ibox float-e-margins">

<div class="ibox-content">

{{ Former::setOption('default_form_type', null) }}
{{ Former::withRules(array(
    'username'              => 'required|alpha_num|max:64|unique:users',
    'nickname'              => 'required|max:64',
    'password'              => 'alpha_num|min:6|confirmed',
    'password_confirmation' => 'alpha_num|min:6',
    'group_id'              => 'required|numeric|exists:groups,id'))
}}
{{ Former::open()
         ->action(URL::route('user.update', [$user->id]))
         ->class('m-t text-left')
         ->id('userForm')
         ->method('put')
}}
{{ Former::token() }}

<div class="form-group">
{{ Former::text('username')
         ->value($user->username)
         ->class('form-control')
         ->placeholder('用户名')
         ->label('用户名')
         ->readonly()
}}

<div class="form-group">
{{ Former::text('nickname')
         ->value($user->nickname)
         ->class('form-control')
         ->placeholder('部门')
         ->label('部门')
}}
</div>

<div class="form-group">
{{ Former::password('password')
         ->class('form-control')
         ->placeholder('密码')
         ->label('密码(选填)')
}}
</div>

<div class="form-group">
{{ Former::password('password_confirmation')
         ->class('form-control')
         ->placeholder('确认密码')
         ->label('确认密码(选填)')
}}
</div>

<div class="form-group">
{{ Former::select('group_id')
         ->select($user->group->first()->id)
         ->options($groups)
         ->class('form-control')
         ->label('用户组')
}}
</div>

<div class="form-group">
{{ Former::submit('修改')
         ->class('btn btn-info block full-width m-b')
}}
{{ Former::reset('重置')
         ->class('btn btn-info block full-width m-b')
}}
</div>

{{ Former::close() }}
</div>
</div>


</div>
</div>
</div>
</div>

@stop

@section('script')
@parent
<script>
    function ajaxSubmit(frm, fn) {
        $.ajax({
            url: frm.action,
            type: 'post',
            data: $('form#userForm').serialize(),
            success: fn,
            beforeSend: function () {
                if ($('input[name=nickname]').val().length == 0) {
                    layer.msg('请输入部门名称', 1, 2);
                    return false;
                }
                if ($('input[name=password_confirmation]').val() != $('input[name=password]').val()) {
                    layer.msg('密码不一致', 1, 2);
                    return false;
                } else {
                    return true;
                }
            },
        });
        return false;
    }

    (function() {
        $('#userForm').bind('submit', function() {
            ajaxSubmit(this, function(json) {
                if (json.success == true) {
                    layer.msg(json.msg, 2, 1);
                    setTimeout(
                        function() {
                            parent.location.reload();
                        }, 1500);
                } else {
                    layer.msg(json.error, 2, 2);
                }
            });
            return false;
        });
    })();
</script>
@stop
