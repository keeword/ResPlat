<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta content="width=device-width, initial-scale=1.0">
</head>
<body>



<div class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown" align="center">

{{ Form::open(array('url' => 'user', 'class' => 'm-t text-left',  'id' => 'createuserform')) }}

    <div class="form-group">
    {{ Form::label('username', '用户名') }}
    {{ Form::text('username', Input::old('username'), array('class' => 'form-control','id'=>'username', 'placeholder' => '用户名')) }}
    </div>

    <div class="form-group">
    {{ Form::label('nickname', '部门') }}
    {{ Form::text('nickname', Input::old('nickname'), array('class' => 'form-control', 'id'=>'nickname', 'placeholder' => '部门')) }}
    </div>

    <div class="form-group">
    {{ Form::label('password', '密码') }}
    {{ Form::password('password', array('class' => 'form-control', 'id'=>'password', 'placeholder' => '密码')) }}
    </div>

    <div class="form-group">
    {{ Form::label('repasswd', '确认密码') }}
    {{ Form::password('repasswd', array('class' => 'form-control', 'id'=>'repasswd', 'placeholder' => '确认密码')) }}
    </div>

    <div class="form-group">
    {{ Form::label('group', '用户组') }}
    {{ Form::select('group', $groups, 'user', array('class' => 'chosen-select')) }}
    </div>

    {{ Form::submit('创建', array('class' => 'btn btn-info block full-width m-b')) }}
{{ Form::close() }}

    </div>
    </div>
    <!-- Mainly scripts 
     <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
     -->
    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- jQuery Validation plugin javascript-->
    <script src="/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/js/plugins/validate/messages_zh.min.js"></script>
    
    <!-- layer javascript -->
    <script src="/js/plugins/layer/layer.min.js"></script>
    
    
    <script>
    //将form转为AJAX提交
    function ajaxSubmit(frm, fn) {
        $.ajax({
            url: frm.action,
            type: frm.method,
            data: $('form#createuserform').serialize(),
            dataType:'json',
            success: fn,
            beforeSend:function(){
                if(!(($('input[id=username]').val()).match(/^[a-zA-Z0-9_]{4,16}$/))){
                    layer.load('请输入4-16位英文字符、数字或下划线的用户名',1);
                    return false;
                }else if($('input[id=nickname]').val().length==0){
                    layer.load('部门名称不能为空',1);
                    return false;
                }else if(!$('input[id=password]').val().match(/^.{6,32}$/)){
                    layer.load('请输入6-32位长度的密码',1);
                    return false;
                }else if($('input[id=repasswd]').val().length==0){
                    layer.load('请确认密码',1);
                    return false;
                }else if($('input[id=password]').val()!= $('input[id=repasswd]').val()){
                    layer.load('两次输入的密码不一致!', 2);
                    return false;
                }
                else if(($('input[id=username]').val().length&&$('input[id=password]').val().length)==0) {
                    return false;
                }else {
                    return true;
                }
            }
        });
    }

    $(document).ready(function(){
        $('#createuserform').bind('submit', function(){

            ajaxSubmit(this, function(json){

                if(json.success==true){
                        layer.load('帐号创建成功!!', 1);
                        //window.location.href="{{ URL::route('home') }}";
                }else{
                        layer.load(json.error, 1);

                    //layer.load('帐号密码不匹配', 1);
                }
            });
            return false;
        });
    });
    </script>
    </script>
</body>
</html>