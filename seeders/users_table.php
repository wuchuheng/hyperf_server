<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use App\Model\{
    RoleRuleModel,
    UserModel,
    RoleModel,
    UserRoleModel,
    PermissionModel
};

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成用户角色
        $User = new UserModel();
        $User->username = 'admin';
        $User->phone = 13427969604;
        $User->password = bcrypt('12345678');
        $User->nickname = '管理员';
        $User->avatar = 'avatar';
        $User->save();
        // 角色信息
        $Role = new RoleModel();
        $Role->name = '管理员';
        $Role->save();
        // 用户-角色信息
        $UserRole = new UserRoleModel();
        $UserRole->user_id = 1;
        $UserRole->role_id = 2;
        $UserRole->save();

        // 生成权限
        $permissiones = [
            [
                'name' => '授权管理',
                'slug' => 'auth',
                'http_methods' => '',
                'http_path' => '',
                'level_path' => 0,
                'pid' => 0,
                'note' => '后台授权管理'
            ],
            [
                'name' => '权限列表',
                'slug' => 'auth.list',
                'http_methods' => 'GET',
                'http_path' => '/api/admin/permissions',
                'level_path' => '0-1',
                'pid' => 1,
                'note' => ''
            ],
            [
                'name' => '权限目录树',
                'slug' => 'auth.tree',
                'http_methods' => 'GET',
                'http_path' => '/api/admin/permissions/trees',
                'level_path' => '0-1',
                'pid' => 1,
                'note' => '用于权限分组归类'
            ],
            [
                'name' => '用户角色表',
                'slug' => 'auth.roles',
                'http_methods' => 'GET',
                'http_path' => '/api/admin/roles',
                'level_path' => '0-1',
                'pid' => 1,
                'note' => '获取用户角色表'
            ]
        ];
        foreach ($permissiones as $permission) {
            $Permission = new PermissionModel();
            $Permission->name = $permission['name'];
            $Permission->name = $permission['name'];
            $Permission->name = $permission['name'];
            $Permission->slug = $permission['slug'];
            $Permission->http_methods = $permission['http_methods'];
            $Permission->http_path = $permission['http_path'];
            $Permission->level_path = $permission['level_path'];
            $Permission->pid = $permission['pid'];
            $Permission->note = $permission['note'];
            $Permission->save();
        }
    }
}
