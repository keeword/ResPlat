@section('topbar')

<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
    </div>

    <ul class="nav navbar-top-links navbar-right">

        <li>
            <span class="m-r-sm text-muted welcome-message"><a href="{{ URL::route('home') }}" title="返回首页"><i class="fa fa-home"></i></a>物资管理系统</span>
        </li>
<!--
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
                <i class="fa fa-bell"></i><span class="label label-primary">8</span>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="profile.html">
                        <div>
                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                            <span class="pull-right text-muted small">12分钟钱</span>
                        </div>
                    </a>
                </li>
            </ul>
        </li>
-->
        <li >
            <a id="logoutlayer"  onClick="logout()">
                <i class="fa fa-sign-out" ></i>退出
            </a>
        </li>

    </ul>

</nav>

@stop
