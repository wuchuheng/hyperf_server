<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use App\Model\{
    RoleRuleModel,
    UserModel,
    RoleModel,
    UserRoleModel
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
        $User->name = 'admin';
        $User->phone = 13427969604;
        $User->password = bcrypt('12345678');
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
    }
}
