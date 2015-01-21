<!DOCTYPE html>
<html lang=zh-cn>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>登录</title>
    <link href="css/bootstrap.min.css?v=1.6" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=1.6" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=1.6" rel="stylesheet">

</head>

<body>

    @yield('sidebar')

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js?v=1.6"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/hplus.js?v=1.6"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/jquery.pjax.js"></script>

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
<!-- layer javascript -->
    <script src="js/plugins/layer/layer.min.js"></script>
    <script>
        layer.use('extend/layer.ext.js'); //载入layer拓展模块
    </script>
<script src="js/demo/layer-demo.js"></script>

<script>


function test(){
    $.layer({
                    shade: [0],
                    area: ['auto','auto'],
                    dialog: {
                        msg: 'Are You Sure to Quit?',
                        btns: 2, 
                        type: 4,
                        btn: ['Yes','No'],
                        yes: function(){
                            $.post("{{URL::route('logout') }}",function(json){
                                if(json.success==true){
                                   window.location.href="{{ URL::route('login') }}";
                                }
                            })
                        }, 
                        no: function(){
                            //layer.msg('奇葩', 1, 13);
                        }
                    }
                });     
    }
       
    function test1(){
        var r = confirm("Are You Sure to Quit?");
        if(r==true){
           window.location.href="{{ URL::route('login') }}";
        }
    }

    $("#logoutlayer").live('click',function(){ 
    $.post("login.php?action=logout",function(msg){ 
        if(msg==1){ 
            window.location.href="{{URL::route('logout')}}";
        } 
    }); 
}); 
</script>

</body>

</html>
