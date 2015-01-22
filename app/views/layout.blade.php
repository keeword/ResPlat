<!DOCTYPE html>
<html lang=zh-cn>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>物资管理系统</title>
    <link href="css/bootstrap.min.css?v=1.6" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=1.6" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

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

    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

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
                //layer.msg('奇葩', 1, 13);
            }
        }
    });     
}
</script>

<script>
$(document).ready(function () {
    $('.dataTables-example').dataTable();

    /* Init DataTables */
    var oTable = $('#editable').dataTable();

    /* Apply the jEditable handlers to the table */
    oTable.$('td').editable('../example_ajax.php', {
        "callback": function (sValue, y) {
            var aPos = oTable.fnGetPosition(this);
            oTable.fnUpdate(sValue, aPos[0], aPos[1]);
        },
        "submitdata": function (value, settings) {
            return {
                "row_id": this.parentNode.getAttribute('id'),
                "column": oTable.fnGetPosition(this)[2]
            };
        },
        "width": "90%",
        "height": "100%"
    });
});

function fnClickAddRow() {
    $('#editable').dataTable().fnAddData([
        "Custom row",
        "New row",
        "New row",
        "New row",
        "New row"]);
}
</script>

</body>
</html>
