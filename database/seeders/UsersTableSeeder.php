<?php
namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;
use Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@gmail.com',
                'password'       => Hash::make(123456),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Agent 1',
                'email'          => 'agent1@agent1.com',
                'password'       => Hash::make(123456),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Agent 2',
                'email'          => 'agent2@agent2.com',
                'password'       => Hash::make(123456),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Agent 3',
                'email'          => 'agent3@agent3.com',
                'password'       => Hash::make(123456),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
