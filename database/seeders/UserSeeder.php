<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name'          => 'Admin',
                'email'         => 'admin@email.com',
                'password'      => bcrypt('qweasd123'),
                'account_type'  => '1',
                'account_role'  => 'admin'
            ],
            [
                'name'          => 'Staff',
                'email'         => 'staff@email.com',
                'password'      => bcrypt('qweasd123'),
                'account_type'  => '2',
                'account_role'  => 'staff'
            ]
        ];

        User::insert($users);
    }
}
