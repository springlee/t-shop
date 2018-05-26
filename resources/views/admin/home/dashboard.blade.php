@extends('admin.layout')
@section('Title', 'Dashboard')

@section('content')
    <blockquote class="layui-elem-quote layui-text">
        这是首页 还没有做内容
    </blockquote>

    @foreach($envs as $env)
        <div class="layui-form-item">
            <label class="layui-form-label">{{$env['name']}}</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required"  class="layui-input" value="{{$env['value']}}">
            </div>
        </div>
    @endforeach
@endsection
