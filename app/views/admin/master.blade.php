@extends('layout.layout', array('title' => $title))

@section('css')
<!-- Bootstrap -->
<link href="/css/bootstrap.min.css?v=1.6" rel="stylesheet">
<link href="/font-awesome/css/font-awesome.css?v=1.6" rel="stylesheet">

<!-- Data Tables -->
<link href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- Theme style -->
<link href="/css/style.css?v=1.6" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
@stop

@section('master')

@include('admin.sidebar')
@yield('sidebar')

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    @include('admin.topbar')
    @yield('topbar')

    @yield('content')

    @include('admin.footer')
    @yield('footer')
</div>
</div>

@stop

@section('js')
<!-- Mainly scripts -->
<script src="/js/jquery-2.1.3.min.js"></script>
<script src="/js/bootstrap.min.js?v=1.6"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Data Tables -->
<script src="/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Theme scripts -->
<script src="/js/hplus.js?v=1.6"></script>

<!-- layer javascript -->
<script src="/js/plugins/layer/layer.min.js"></script>
<script>
    layer.use('extend/layer.ext.js'); //载入layer拓展模块
</script>
@stop
