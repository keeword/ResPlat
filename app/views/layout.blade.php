<!DOCTYPE html>
<html lang=zh-cn>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>物资管理系统</title>
    <link href="/css/bootstrap.min.css?v=1.6" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css?v=1.6" rel="stylesheet">

    <!-- Morris -->
    <link href="/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="/css/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css?v=1.6" rel="stylesheet">
</head>

<body>

    @yield('sidebar')

    <!-- Mainly scripts -->
    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/bootstrap.min.js?v=1.6"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom and plugin javascript
        <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>

     -->
     <!-- jQuery Validation plugin javascript-->
    <script src="/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/js/plugins/validate/messages_zh.min.js"></script>
    
    <script src="/js/hplus.js?v=1.6"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>
    <script src="/js/jquery.pjax.js"></script>

    
    <!-- layer javascript -->
    <script src="/js/plugins/layer/layer.min.js"></script>
    <script>
        layer.use('extend/layer.ext.js'); //载入layer拓展模块
    </script>
    <script src="/js/demo/layer-demo.js"></script>
    <!-- layerDate plugin javascript -->
    <script src="/js/plugins/layer/laydate/laydate.js"></script>

     <!-- iCheck -->
    <script src="/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Full Calendar -->
    <script src="/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script>                                    //工作室管理,日历事件等
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            /* initialize the external events
             -----------------------------------------------------------------*/

            $('#external-events div.external-event').each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                aspectRatio:2.1,
                handleWindowResize:true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);



                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }

                },
                dayClick: function(date, allDay, jsEvent, view) {
                        var dateft = $.fullCalendar.formatDate(date, "yyyy-MM-dd");
                        
                        
                        $.ajax({ 
                            url:'{{ URL::route("user") }}' + '/' + dateft, 
                            type:'GET', 
                            success: '',  
                         });
                       workroomapply(dateft);
                },

               /* eventMouseover:function(calEvent, jsEvent, view){
                    alert();
                },
            */
                
                events: [

                    
                ],
            });

        
            
            

        });
      
    </script>

<script>                                        //退出功能
function logout(){
    $.layer({
        shade: [0],
        title: ' ',
        offset: ['200px', ''],
        area: ['auto','auto'],
        shade: [0.5, '#000'],
        shadeClose: true,
        closeBtn: [1, false],
        time: 3,
        dialog: {
            msg: 'Are You Sure to Quit?',
            btns: 2, 
            type: 4,
            btn: ['Yes','No'],
            yes: function(){
                $.post("{{ URL::route('logout') }}", 
                {
                    _method: 'delete'
                },
                function(json){
                    if(json.success==true){
                        window.location.href="{{ URL::route('login') }}";
                    }
                })
            }, 
            no: function(){
            }
        }
    });     
}
</script>

<script>
$(document).ready(function () {
    $('.dataTables-example').dataTable();

    /* Init DataTables */
    var oTable = $('.edit-table').dataTable();
    /* Apply the jEditable handlers to the table */
    oTable.$('.edit-td').editable('{{ URL::route("material") }}', {
        "callback":   function (value, setings) {
            var aPos = oTable.fnGetPosition(this);
            oTable.fnUpdate(sValue, aPos[0], aPos[1]);
        },
        "submitdata": function (value, settings) {
            return {
                "row_id": this.parentNode.getAttribute('id'),
                "column": oTable.fnGetPosition(this)[2],
                "_method": 'put'
            };
        },
        "width": "80%",
        "height": "80%"
    });
});

/*function fnClickAddRow() {
    $('#editable').dataTable().fnAddData([
        "Custom row",
        "New row",
        "New row",
        "New row",
        "New row"]);
}*/
</script>
<script>                            //iframe's javascript 

function workroomapply(dateft){     //workroom.blade.php 点击日历提交工作室申请
    iframeset('{{ URL::route("user") }}' + '/' + dateft);
}

function addUser(){                 //user.blade.php 新增帐号
    iframeset('{{ URL::route("user.create") }}');
}

function alterbtn(id){              //user.blade.php 修改按钮
    iframeset("{{ URL::route('user') }}" + '/' + id);
}


function delUser(id){
    layer.prompt({
        top: 'auto',
        type : 1,
        title: '输入密码以确认删除!!'
    }, function(val){
        $.post(
            "{{ URL::route('user') }}" + '/' + id,
            {
                _method : 'delete', 
                password : val
            },
            function (json){
                if(json.success == true){
                    layer.msg('删除成功!',2,function(){
                        location.reload();
                    });
                }else{
                    layer.msg(json.error,2,2);
                }
        });
    });
}

function iframeset(srcurl){
    var pageii = $.layer({
        type: 2,
        offset:['100px',''],
        //shade: [0],
        closeBtn: [0, true],
        shadeClose: true,
        area: ['450px', '400px'],
        title: false,
        border: [0],
        iframe: {
            src: srcurl,
            scrolling: 'auto'
            }
        });
        //layer.load(1);
}
</script>

<script>
/*******************************
 * @author Mr.Think
 * @author blog http://mrthink.net/
 * @2011.12.09
 * @可自由转载及使用,但请注明版权归属
 *******************************/
$.fn.iVaryVal=function(iSet,CallBack){
    /*
     * Minus:点击元素--减小
     * Add:点击元素--增加
     * Input:表单元素
     * Min:表单的最小值，非负整数
     * Max:表单的最大值，正整数
     */
    iSet=$.extend({Minus:$('.J_minus'),Add:$('.J_add'),Input:$('.J_input'),Min:0,Max:20},iSet);
    var C=null,O=null;
    //插件返回值
    var $CB={};
    //增加
    iSet.Add.each(function(i){
        $(this).click(function(){
            O=parseInt(iSet.Input.eq(i).val());
            (O+1<=iSet.Max) || (iSet.Max==null) ? iSet.Input.eq(i).val(O+1) : iSet.Input.eq(i).val(iSet.Max);
            //输出当前改变后的值
            $CB.val=iSet.Input.eq(i).val();
            $CB.index=i;
            //回调函数
            if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
        });
    });
    //减少
    iSet.Minus.each(function(i){
        $(this).click(function(){
            O=parseInt(iSet.Input.eq(i).val());
            O-1<iSet.Min ? iSet.Input.eq(i).val(iSet.Min) : iSet.Input.eq(i).val(O-1);
            $CB.val=iSet.Input.eq(i).val();
            $CB.index=i;
            //回调函数
            if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
        });
    });
    //手动
    iSet.Input.bind({
        'click':function(){
            O=parseInt($(this).val());
            $(this).select();
        },
        'keyup':function(e){
            if($(this).val()!=''){
                C=parseInt($(this).val());
                //非负整数判断
                if(/^[1-9]\d*|0$/.test(C)){
                    $(this).val(C);
                    O=C;
                }else{
                    $(this).val(O);
                }
            }
            //键盘控制：上右--加，下左--减
            if(e.keyCode==38 || e.keyCode==39){
                iSet.Add.eq(iSet.Input.index(this)).click();
            }
            if(e.keyCode==37 || e.keyCode==40){
                iSet.Minus.eq(iSet.Input.index(this)).click();
            }
            //输出当前改变后的值
            $CB.val=$(this).val();
            $CB.index=iSet.Input.index(this);
            //回调函数
            if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
        },
        'blur':function(){
            $(this).trigger('keyup');
            if($(this).val()==''){
                $(this).val(O);
            }
            //判断输入值是否超出最大最小值
            if(iSet.Max){
                if(O>iSet.Max){
                    $(this).val(iSet.Max);
                }
            }
            if(O<iSet.Min){
                $(this).val(iSet.Min);
            }
            //输出当前改变后的值
            $CB.val=$(this).val();
            $CB.index=iSet.Input.index(this);
            //回调函数
            if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
        }
    });
}
//调用
$( function() {
    $('.i_box').iVaryVal({},function(value,index){
    });
    
});
</script>

<script>
    //外部js调用
    // laydate({
    // elem: '#hello', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，
                    //因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
    // event: 'focus' //响应事件。如果没有传入event，则按照默认的click
    // });

     //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2100-01-01 00:00:00',
        istime: true,
        istoday: false,
        choose: function (datas) {
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#end',
        format: 'YYYY-MM-DD',
        min: laydate.now(),
        max: '2100-01-01 00:00:00',
        istime: true,
        istoday: false,
        choose: function (datas) {
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
</script>

</body>
</html>
