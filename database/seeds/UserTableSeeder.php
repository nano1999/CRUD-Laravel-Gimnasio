<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_profesor = Role::where('name', 'profesor')->first();
        

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->document = '1';
        $user->type = 0;
        $user->lastName = 'asd';
        $user->phone = 'asd';
        $user->visibility = 1;
        $user->save();
        $user->roles()->attach($role_user);


        $user = new User();
        $user->name = 'Ariel';
        $user->email = 'ariel@example.com';
        $user->password = bcrypt('secret');
        $user->document = '4';
        $user->lastName = 'asd';
        $user->type = 0;
        $user->phone = 'asd';
        $user->visibility = 1;
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Profesor';
        $user->email = 'profesor@example.com';
        $user->password = bcrypt('secret');
        $user->document = '2';
        $user->type = 1;
        $user->lastName = 'asd';
        $user->phone = 'asd';
        $user->visibility = 1;
        $user->save();
        $user->roles()->attach($role_profesor);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->document = '3';
        $user->type = 2;
        $user->lastName = 'asd';
        $user->phone = 'asd';
        $user->visibility = 1;
        $user->save();
        $user->roles()->attach($role_admin);



     }
}