@extends('layout')

@section('sidebar')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">

            <li class="nav-header">
                <div class="dropdown profile-element"> 
                  <span>
                    <img alt="image" class="img-circle img-responsive" src="img/logo.png" style="height:80px;width:80px;" />
                  </span>
                    <span class="clear">
                      <span class="block m-t-xs">
                        <strong class="font-bold">{{ $username }}</strong>
                      </span>
                      <span class="text-muted text-xs block">{{ $usergroup }}
                      </span>
                    </span>
                </div>
            </li>
            <div class="logo-element">
                😄
            </div>
            <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">物资管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="index_1.html">物资审核</a>
                    </li>
                    <li><a href="index_2.html">物资一览</a>
                    </li>
                    
                </ul>
            </li>

            <li>
                <a href="index.html#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">工作室管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="graph_echarts.html">工作室审核</a>
                    </li>
                    <li><a href="graph_flot.html">会议室审核</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">账号管理 </span><span class="label label-warning pull-right">16</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="mailbox.html">新增账号</a>
                    </li>
                    <li><a href="mail_detail.html">密码修改</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</nav>

@yield('master')

@stop
