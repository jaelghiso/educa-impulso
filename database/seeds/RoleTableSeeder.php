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
        $role = new Role;
        $role->name = 'user';
        $role->display_name = 'Alumno';
        $role->description = 'Alumno';
        $role->save();

        $role = new Role;
        $role->name = 'admin';
        $role->display_name = 'Administrador';
        $role->description = 'Administrador del sitio';
        $role->save();

        $role = new Role;
        $role->name = 'teacher';
        $role->display_name = 'Profesor';
        $role->description = 'Profesor';
        $role->save();
    }
}
