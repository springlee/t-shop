@extends('admin.layout')
@section('title', '登陆')
@section('content')
    <div class="user-login">
        <div class="user-login-main">
            <div class="user-login-box user-login-header">
                <h2>{{ env('APP_NAME') }}</h2>
            </div>
            <div class="user-login-box user-login-body layui-form">
                <form class="" action="{{ route('admin.doLogin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                        <label class="user-login-icon layui-icon layui-icon-username" for="username"></label>
                        <input type="text" name="username" id="username" lay-verify="required" value="{{ old('username') }}" placeholder="用户名" class="layui-input">
                    </div>
                    <div class="layui-form-item">
                        <label class="user-login-icon layui-icon layui-icon-password" for="password"></label>
                        <input type="password" name="password" id="password" lay-verify="required" value="{{ old('password') }}" placeholder="密码" class="layui-input">
                    </div>
                    <div class="layui-form-item" style="margin-bottom: 20px;">
                        <input type="checkbox" name="remember" lay-skin="primary" title="记住密码" checked>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>记住密码</span><i class="layui-icon"></i></div>
                    </div>
                    <div class="layui-form-item">
                        <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="submit">登 陆</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="layui-trans user-login-footer">
            <p>© 2018 {{ env('APP_NAME') }}</p>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        layui.form.on('submit(submit)', function (ele) {
            layer.msg('登陆中...', {icon: 16, shade: 0.02, time: 999999999});
        });
        @if ($errors->has('username'))
        layer.alert('{{ $errors->first('username') }}', {icon: 5, title: '登陆失败'});
        @endif
    </script>
@endsection
