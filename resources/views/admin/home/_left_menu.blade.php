<ul class="layui-nav layui-nav-tree layout-menus"  lay-filter="left-menu">
    @foreach ($menus['left'] as $k1 => $menu)
    <li class="layui-nav-item">
        <a href="javascript:;" id="{{md5($menu['route'])}}" @if(!$menu['children']) data-url="{{route($menu['route'])}}" @endif>{{ $menu['name'] }}</a>
        @if ($menu['children'])
        <dl class="layui-nav-child">
            @foreach ($menu['children'] as $k2 => $child)
            <dd id="{{md5($child['route'])}}" data-url="{{route($child['route'])}}">
                <a href="javascrit:;">{{$child['name']}}</a>
            </dd>
            @endforeach
        </dl>
        @endif
    </li>
    @endforeach
</ul>
