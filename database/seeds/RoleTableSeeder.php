<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();
    
        $role = new Role();
        $role->name = 'profesor';
        $role->description = 'Profesor';
        $role->save();
        
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();

            



    }
}