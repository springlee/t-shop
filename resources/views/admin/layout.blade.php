<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title','Admin') - TShop</title>
    <link rel="stylesheet" href="{{ asset('plugins/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    @yield('css', '')
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    @yield('content')
</div>
<script src="{{ asset('plugins/layui/layui.all.js') }}"></script>
<script src="{{ mix('js/admin.js')  }}"></script>
@yield('footer_js', '')
</body>
</html>
