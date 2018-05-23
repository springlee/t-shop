@extends('admin.layout')
@section('Title', 'Dashboard')

@section('content')
<div class="layui-header">
    <div class="layui-logo">T-SHOP</div>
    @include('admin.home._header_menu')
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                贤心
            </a>
            <dl class="layui-nav-child">
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="">退了</a></li>
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
            <li class="layui-this" >后台首页</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">

                <blockquote class="layui-elem-quote layui-text">
                    服务器环境
                </blockquote>

                @foreach($envs as $env)
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{$env['name']}}</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" required  lay-verify="required"  class="layui-input" value="{{$env['value']}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="layui-footer">
    © T-SHOP
</div>
@endsection
