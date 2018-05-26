<?php
namespace App\Traits;

use App\AdminMenu;
use Illuminate\Http\Request;

trait AuthTrait
{
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget($this->guard()->getName());
        $request->session()->regenerate();

        return redirect()->route(strpos($this->guard()->getName(), 'admin') ? 'admin.login' : 'login');
    }


    public function getMenus()
    {
        $menus = AdminMenu::orderBy('order', 'desc')->get()->toArray();
        $data = [];
        foreach ($menus as $menu) {
            if ($menu['parent_id']) {
                $data[$menu['position']][$menu['parent_id']]['children'][] = $menu;
            } else {
                $data[$menu['position']][$menu['id']] = $menu;
            }
        }

        dd($menus, $data);exit;
//        $role_ids = auth('admin')->user()->role_ids;
    }
}
