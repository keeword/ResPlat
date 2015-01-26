@extends('layout')

@section('master')

@include('sidebar')
@yield('sidebar')

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    @include('topbar')
    @yield('topbar')

    @yield('content')

    @include('footer')
    @yield('footer')
</div>
</div>

@stop
