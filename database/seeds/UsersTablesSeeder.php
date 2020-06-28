<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
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
                'name'    => 'Abouakil Imane',
                'email'    => 'admin@gmail.com',
                'password'   =>  Hash::make('password'),
                'remember_token' =>  str_random(10),
                'is_admin' => 1,
            ],
            [
                'name'    => 'Abdennour Imane',
                'email'    => 'imane.abdennour0@gmail.com',
                'password'   =>  Hash::make('password'),
                'remember_token' =>  str_random(10),
            ],
            [
                'name'    => 'Jnaini zineb',
                'email'    => 'jnainizineb@gmail.com',
                'password'   =>  Hash::make('password'),
                'remember_token' =>  str_random(10),
            ],
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
            [
                'name'    => 'Zidani Mohamed',
                'email'    => 'mohamed.zidani@gmail.com',
                'password'   =>  Hash::make('password'),
                'remember_token' =>  str_random(10),
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }

    }
}
