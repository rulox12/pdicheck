<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        $role_enginer = Role::where('name', 'enginer')->first();
        $role_leader = Role::where('name', 'leader')->first();
        
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Gustavo Callejas';
        $user->email = 'gustavo.callejas@placetopay.com';
        $user->password = bcrypt('Place123');
        $user->save();
        $user->roles()->attach($role_enginer);
        $user = new User();
        $user->name = 'Daniel Betancur';
        $user->email = 'daniel.betancur@placetopay.com';
        $user->password = bcrypt('Place123');
        $user->save();
        $user->roles()->attach($role_enginer);
        $user->name = 'Cristina Vera';
        $user->email = 'cristina.vera@placetopay.com';
        $user->password = bcrypt('Place123');
        $user->save();
        $user->roles()->attach($role_leader);
    }
}
