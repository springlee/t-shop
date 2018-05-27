<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 添加菜单
        $this->_addMenus();
        // 添加角色和管理员
        $this->_addAdminUser();
    }

    private function _addAdminUser()
    {
        $role_id = DB::table('admin_roles')->insertGetId([
            'name' => '超级管理员',
            'permission_ids' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('admin_users')->insert([
            'username' => 'admin',
            'avatar' => 'http://namet-blog.oss-cn-shenzhen.aliyuncs.com/users/2/avatar.jpg',
            'email' => str_random(10) . '@example.com',
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
            'role_ids' => "{$role_id},2",
            'is_super' => 1,
            'tel' => mt_rand(134, 181) . mt_rand(10000000, 99999999),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function _addMenus()
    {
        $menus = [
            [
                'parent_id' => 0,
                'name' => '系统设置',
                'icon' => '',
                'route' => '',
                'order' => 0,
                'position' => 'left',

                'children' => [
                    [
                        'name' => '菜单管理',
                        'icon' => '',
                        'route' => 'admin_menus',
                        'order' => 0,
                    ],
                    [
                        'name' => '管理员管理',
                        'icon' => '',
                        'route' => 'admin_users',
                        'order' => 1,
                    ],
                    [
                        'name' => '角色管理',
                        'icon' => '',
                        'route' => 'admin_roles',
                        'order' => 2,
                    ],
                    [
                        'name' => '权限管理',
                        'icon' => '',
                        'route' => 'admin_permissions',
                        'order' => 3,
                    ],
                    [
                        'name' => '操作日志',
                        'icon' => '',
                        'route' => 'admin_logs',
                        'order' => 0,
                    ],
                ]
            ],
            [
                'parent_id' => 0,
                'name' => '用户管理',
                'icon' => '',
                'route' => '',
                'order' => 1,

                'children' => [
                    [
                        'name' => '用户列表',
                        'icon' => '',
                        'route' => 'users',
                        'order' => 2,
                    ],
                    [
                        'name' => '用户操作日志',
                        'icon' => '',
                        'route' => 'user_logs',
                        'order' => 1,
                    ],
                ]
            ],
        ];

        foreach ($menus as $menu) {
            $m = array_only($menu, ['name', 'icon', 'route']);
            $m['parent_id'] = 0;
            $m = array_merge($m, ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),]);
            $parent_id = DB::table('admin_menus')->insertGetId($m);
            $position = $menu['position'];
            foreach ($menu['children'] ?? [] as $child) {
                $child['parent_id'] = $parent_id;
                $child['position'] = $position;
                $child = array_merge(
                    $child,
                    ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),]
                );
                DB::table('admin_menus')->insert($child);
            }
        }
    }
}
