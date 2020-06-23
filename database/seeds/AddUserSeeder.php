<?php

use Illuminate\Database\Seeder;
use App\User;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'    => 'Abouakil Assia',
                'email'    => 'assia1@gmail.com',
                'password'   =>  Hash::make('password'),
                'remember_token' =>  str_random(10),
            ],
            [
                'name'    => 'Abdennour Assia',
                'email'    => 'assia2@gmail.com',
                'password'   =>  Hash::make('password'),
                'remember_token' =>  str_random(10),
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }

    }
}
