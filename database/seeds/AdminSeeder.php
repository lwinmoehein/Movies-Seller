<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\RolesType;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin user
        $user = User::create(['name'=>'Admin','email'=>'admin@gmail.com','password'=>Hash::make('contextmobile@admin')]);
        //create two roles
        $adminRole = Role::create(['name'=>RolesType::ADMIN]);
        $userRole = Role::create(['name'=>RolesType::USER]);

        $user->roles()->attach($adminRole->id);
    }
}
