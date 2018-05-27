<?php
namespace App\Traits;

use App\AdminMenu;
use Illuminate\Http\Request;

trait AuthTrait
{
    /**
     * 退出登陆
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->forget($this->guard()->getName());
        $request->session()->regenerate();

        return redirect()->route(strpos($this->guard()->getName(), 'admin') ? 'admin.login' : 'login');
    }

    /**
     * 根据用户权限获取用户菜单
     */
    public function getUserMenus()
    {
        $menus = AdminMenu::where(['is_valid' => 1])->orderBy('order', 'desc')->get()->toArray();
        $data = [];
        foreach ($menus as $menu) {
            $menu['route'] = "{$menu['route']}.index";
            if ($menu['parent_id']) {
                $data[$menu['position']][$menu['parent_id']]['children'][] = $menu;
            } else {
                if (isset($data[$menu['position']][$menu['id']])) {
                    $data[$menu['position']][$menu['id']] = array_merge($menu, $data[$menu['position']][$menu['id']]);
                } else {
                    $data[$menu['position']][$menu['id']] = $menu;
                }
            }
        }

        return $data;
    }
}
