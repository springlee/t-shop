<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminMenu;

class MenuController extends Controller
{
    public function index()
    {
        $data = AdminMenu::orderBy('order', 'desc')->get()->toArray();
        $menus = [];
        foreach ($data as $menu) {
            if ($menu['parent_id']) {
                $menus[$menu['position']][$menu['parent_id']]['children'][] = $menu;
            } else {
                if (isset($menus[$menu['position']][$menu['id']])) {
                    $menus[$menu['position']][$menu['id']] = array_merge($menu, $menus[$menu['position']][$menu['id']]);
                } else {
                    $menus[$menu['position']][$menu['id']] = $menu;
                }
            }
        }
\Debugbar::info($menus);
        return view('admin.system.menus', compact('menus'));
    }
}
