<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('user/users', 'UserController');
    $router->resource('user/logs', 'UserLogController');

    $router->resource('goods/goods', 'GoodsController');
    $router->resource('goods/categories', 'GoodsCatController');
    $router->resource('goods/attributes', 'GoodsAttrController');

    $router->resource('order/orders', 'OrderController');
    $router->resource('order/logs', 'OrderLogController');
});
