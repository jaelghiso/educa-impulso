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
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_teacher = Role::where('name', 'teacher')->first();

        $user = new User;
        $user->name = 'Richard Lockhart';
        $user->email = 'rlockhart@liceoimpulso.edu.uy';
        $user->password = bcrypt('richard*1234');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User;
        $user->name = 'Jael Ghiso';
        $user->email = 'jael.ghiso@gmail.com';
        $user->password = bcrypt('Fiorella*05');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User;
        $user->name = 'Javier Castro';
        $user->email = 'jcastro@liceoimpulso.edu.uy';
        $user->password = bcrypt('javier*1234');
        $user->save();
        $user->roles()->attach($role_teacher);
    }
}
