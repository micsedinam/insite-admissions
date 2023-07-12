<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@admin.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@user.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Continuing Student',
               'email'=>'student@user.com',
                'is_admin'=>'2',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
