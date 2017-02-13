<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permission;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_1 = new User;
        $user_1->name = 'User1';
        $user_1->email = 'user1@gmail.com';
        $user_1->password = bcrypt('user1');
        $user_1->save();

        $user_2 = new User;
        $user_2->name = 'User2';
        $user_2->email = 'user2@gmail.com';
        $user_2->password = bcrypt('user2');
        $user_2->save();

        $role_1 = new Role;
        $role_1->name = 'Role1';
        $role_1->display_name = 'Role One';
        $role_1->description = 'Role Only Lives Everlasting';
        $role_1->save();

        $role_2 = new Role;
        $role_2->name = 'Role2';
        $role_2->display_name = 'Role Two';
        $role_2->description = 'Role Cannot Die Alone';
        $role_2->save();

        $user_1->attachRole($role_1);
        $user_2->attachRole($role_2);

        $permission_1 = new Permission;
        $permission_1->name = 'Permission1';
        $permission_1->display_name = 'Permission One';
        $permission_1->description = 'Per Miss Ion';
        $permission_1->save();

        $permission_2 = new Permission;
        $permission_2->name = 'Permission2';
        $permission_2->display_name = 'Permission Two';
        $permission_2->description = 'Per Mr Ion';
        $permission_2->save();

        $role_1->attachPermission($permission_1);
        $role_1->attachPermission($permission_2);
        $role_2->attachPermission($permission_1);
    }
}
