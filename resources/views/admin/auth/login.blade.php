@extends('admin.layout')
@section('title', '登陆')
@section('content')
    <div class="user-login">
        <div class="user-login-main">
            <div class="user-login-box user-login-header">
                <h2>T-SHOP</h2>
            </div>
            <div class="user-login-box user-login-body layui-form">
                <div class="layui-form-item">
                    <label class="user-login-icon layui-icon layui-icon-username" for="username"></label>
                    <input type="text" name="username" id="username" lay-verify="required" placeholder="用户名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="user-login-icon layui-icon layui-icon-password" for="password"></label>
                    <input type="password" name="password" id="password" lay-verify="required" placeholder="密码" class="layui-input">
                </div>
                <div class="layui-form-item" style="margin-bottom: 20px;">
                    <input type="checkbox" name="remember" lay-skin="primary" title="记住密码" checked>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>记住密码</span><i class="layui-icon"></i></div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="submit">登 入</button>
                </div>
            </div>
        </div>

        <div class="layui-trans user-login-footer">
            <p>© 2018 T-SHOP</p>
        </div>
    </div>
@endsection
