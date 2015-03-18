<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <title>物资管理平台 | {{ $title }}</title>

    @yield('css')

</head>

    @yield('master')

    @yield('js')
    
    @yield('script')

</body>
</html>
