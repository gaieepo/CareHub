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
        $user = new User;
        $user->name = 'User1';
        $user->email = 'user1@gmail.com';
        $user->password = Hash::make('user1');
        $user->save();

        $role = new Role;
        $role->name = 'Role1';
        $role->display_name = 'Role One';
        $role->description = 'Role Only Lives Everlasting';
        $role->save();

        $user->attachRole($role);

        $permission = new Permission;
        $permission->name = 'Permission1';
        $permission->display_name = 'Permission One';
        $permission->description = 'Per Miss Ion';
        $permission->save();

        $role->attachPermission($permission);
    }
}
