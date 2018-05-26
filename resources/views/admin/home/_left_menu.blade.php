<ul class="layui-nav layui-nav-tree layout-menus"  lay-filter="left-menu">
    @foreach ($menus['left'] as $menu)
    <li class="layui-nav-item">
        @if ($menu['child'])
        <dl class="layui-nav-child">
            @foreach ($menu['child'] as $child)

            @endforeach
        </dl>
        @else
        <a href="javascript:;" data-url="{{ $menu['url'] }}">所有商品</a>
        @endif
    </li>
    @endforeach
    <li class="layui-nav-item">

        <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="javascript:;">列表三</a></dd>
            <dd><a href="">超链接</a></dd>
        </dl>
    </li>
    <li class="layui-nav-item">
        <a href="javascript:;">解决方案</a>
        <dl class="layui-nav-child">
            <dd id="left_menu-2" data-url="https://namet.xyz"><a href="javascript:void(0);">列表一</a></dd>
            <dd id="left_menu-3" data-url="https://namet.xyz"><a href="javascript:void(0);">列表二</a></dd>
            <dd><a href="https://namet.xyz">超链接</a></dd>
        </dl>
    </li>
</ul>
