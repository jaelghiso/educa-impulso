<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $role_regular_user = new Role;
        $role_regular_user->name = 'user';
        $role_regular_user->display_name = 'Alumno';
        $role_regular_user->description = 'Alumno';
        $role_regular_user->save();

        $role_admin_user = new Role;
        $role_admin_user->name = 'admin';
        $role_admin_user->display_name = 'Administrador';
        $role_admin_user->description = 'Administrador del sitio';
        $role_admin_user->save();

    }
}
