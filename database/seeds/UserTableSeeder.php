<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_regular_user = Role::where('name', 'user')->first();
        $role_admin_user = Role::where('name', 'admin')->first();

        $user = new User;
        $user->name = 'Richard Lockhart';
        $user->email = 'rlockhart@liceoimpulso.edu.uy';
        $user->password = bcrypt('richard*1234');
        $user->save();
        $user->roles()->attach($role_regular_user);

        $admin = new User;
        $admin->name = 'Jael Ghiso';
        $admin->email = 'jael.ghiso@gmail.com';
        $admin->password = bcrypt('FioDa*0516');
        $admin->save();
        $admin->roles()->attach($role_admin_user);
    }
}
