<?php

use App\User;
use App\UserRole;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'User Test ',
                'email' => 'user@test.com',
                'lastname' => 'Last Name Test',
                'phone' => '123456',
                'company' => 'Company test',
                'picture' => 'Picture test',
                'picture' => 'Picture test',
                'password' => bcrypt(123456),
                'role_id' => 1,
            ],
            [ 
                'name' => 'User Test 1',
                'email' => 'dev@test.com',
                'lastname' => 'Last Name Test',
                'phone' => '123456',
                'company' => 'Company test 1',
                'picture' => 'Picture test 1',
                'picture' => 'Picture test 1',
                'password' => bcrypt(123456),
                'role_id' => 2,
            ],
            [ 
                'name' => 'User Test 2',
                'email' => 'qa@test.com',
                'lastname' => 'Last Name Test',
                'phone' => '123456',
                'company' => 'Company test 2',
                'picture' => 'Picture test 2',
                'picture' => 'Picture test 2',
                'password' => bcrypt(123456),
                'role_id' => 3,
            ],
        ];
        foreach ($users as $user) {
           $createUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'lastname' => $user['lastname'],
                'phone' => $user['phone'],
                'company' => $user['company'],
                'picture' => $user['picture'],
                'password' => $user['password'],
                'role_id' => $user['role_id'],
            ]);
        }
    }
}
