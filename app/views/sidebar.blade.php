@extends('layout')

@section('sidebar')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">

            <li class="nav-header">
                <div class="dropdown profile-element"> 
                  <span>
                    <img alt="image" class="img-circle img-responsive" src="img/logo.png" />
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
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">主页</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="index_1.html">主页示例一</a>
                    </li>
                    <li><a href="index_2.html">主页示例二</a>
                    </li>
                    <li><a href="index_3.html">主页示例三</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="index.html#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">图表</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="graph_echarts.html">百度ECharts</a>
                    </li>
                    <li><a href="graph_flot.html">Flot</a>
                    </li>
                    <li><a href="graph_morris.html">Morris.js</a>
                    </li>
                    <li><a href="graph_rickshaw.html">Rickshaw</a>
                    </li>
                    <li><a href="graph_peity.html">Peity</a>
                    </li>
                    <li><a href="graph_sparkline.html">Sparkline</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="mailbox.html">收件箱</a>
                    </li>
                    <li><a href="mail_detail.html">查看邮件</a>
                    </li>
                    <li><a href="mail_compose.html">写信</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</nav>

@yield('master')

@stop
