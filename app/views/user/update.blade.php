<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>


<div class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown" align="center">

{{ Form::open(array('url' => 'user/'.$user->id, 'class' => 'm-t text-left',  'id' => 'updateuserform', 'method' => 'put')) }}

    <div class="form-group">
    {{ Form::label('username', '用户名') }}
    {{ Form::text('username', $user->username, array('class' => 'form-control-static-control')) }}
    </div>

    <div class="form-group">
    {{ Form::label('nickname', '部门') }}
    {{ Form::text('nickname', $user->nickname, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
    {{ Form::label('password', '密码') }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '密码')) }}
    </div>

    <div class="form-group">
    {{ Form::label('repasswd', '确认密码') }}
    {{ Form::password('repasswd', array('class' => 'form-control', 'placeholder' => '确认密码')) }}
    </div>

    <div class="form-group">
    {{ Form::label('group', '用户组') }}
    {{ Form::select('group', $groups, $user->groups->first()->name, array('class' => 'chosen-select')) }}
    </div>

    {{ Form::submit('修改', array('class' => 'btn btn-info block full-width m-b')) }}
{{ Form::close() }}

</div>
</div>

    <!-- Mainly scripts -->
    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/bootstrap.min.js?v=1.6"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="/js/plugins/jeditable/jquery.jeditable.js"></script>
    <!-- jQuery Validation plugin javascript-->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <script src="js/plugins/validate/messages_zh.min.js"></script>
    <!-- Data Tables -->
    <script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
    //将form转为AJAX提交
    function ajaxSubmit(frm, fn) {
        $.ajax({
            url: frm.action,
            type: frm.method,
            data: $('form#createuserform').serialize(),
            success: fn,
            beforeSend:function(){
                if($('input[id=password]').val()!= $('input[id=repasswd]').val()){
                    alert('unmatch!');
                    return false;
                }
                else if(($('input[id=username]').val().length&&$('input[id=password]').val().length)==0) {
                    //alert('bunengweikong');
                    return false;
                }else {
                    //alert('buweikong');
                    return true;
                }
            }
        });
    }

    $(document).ready(function(){
        $('#teuserform').bind('submit', function(){

            ajaxSubmit(this, function(json){

                if(json.success==true){
                        layer.load('loading...', 3);
                        window.location.href="{{ URL::route('home') }}";
                }else{
                    layer.load('帐号密码不匹配', 1);
                }
            });
            return false;
        });
    });
    </script>
    </script>
</body>
</html>