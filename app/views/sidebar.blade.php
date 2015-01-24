@extends('layout')

@section('sidebar')

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">

            <li class="nav-header">
                <div class="dropdown profile-element"> 
                  <span>
                    <img alt="image" class="img-circle img-responsive" src="/img/logo.png" style="height:80px;width:80px;" />
                  </span>
                    <span class="clear">
                      <span class="block m-t-xs">
                        <strong class="font-bold">{{ Session::get('nickname') }}</strong>
                      </span>
                      <span class="text-muted text-xs block">{{ Session::get('usergroup') }}
                      </span>
                    </span>
                </div>
            </li>
            <div class="logo-element">
                😄
            </div>
            <li class="active">
                <a href="#"><i class="fa fa-th-large"></i>
                <span class="nav-label">物资管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @if (Session::get('group') === 'admin')
                    <li><a href="{{ URL::route('material') }}">物资管理</a></li>
                    <li><a href="{{ URL::route('category') }}">品类管理</a></li>
                    @else
                    <li><a href="{{ URL::route('material') }}">物资一览</a></li>
                    @endif
                    <li><a href="{{ URL::route('application') }}">物资申请</a></li>
                    <li><a href="index_1.html">物资审核</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-building-o"></i> 
                <span class="nav-label">工作室管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{URL::route('workroom')}}">工作室审核</a>
                    </li>
                    <li><a href="graph_flot.html">会议室审核</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ URL::route('user') }}"><i class="fa fa-cog"></i>
                <span class="nav-label">账号管理</span>
            </li>

        </ul>

    </div>
</nav>

@yield('master')

@stop
