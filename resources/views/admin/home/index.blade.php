@extends('admin.layout')
@section('Title', 'Dashboard')

@section('content')
<div class="layui-header">
    <div class="layui-logo">T-SHOP</div>
    {{--@include('admin.home._header_menu')--}}
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="https://namet-blog.oss-cn-shenzhen.aliyuncs.com/users/2/avatar.jpg" class="layui-nav-img">
                {{ auth('admin')->user()->username }}
            </a>
            <dl class="layui-nav-child" >
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
                <dd><a href="{{ route('admin.logout') }}">退出登陆</a></dd>
            </dl>
        </li>
    </ul>
</div>

<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        @include('admin.home._left_menu')
    </div>
</div>

<div class="layui-body">
    <div class="layui-tab" lay-allowClose="true" lay-filter="tab-switch">
        <ul class="layui-tab-title">
            <li class="layui-this" >首页</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="{{ route('admin.dashboard') }}" width="100%" style="min-height: 500px;" frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="layui-footer">
    © T-SHOP
</div>
@endsection
