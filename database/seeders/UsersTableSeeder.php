<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'locale'         => 'en',
                'br_id'          => 1,
                'status'         => 1,
            ],
        ];

        $branch = [
            'id'       => 1,
            'name'     => 'The main branch',
            'address'  => 'The main address',
            'email'    => 'admin@admin.com',
            'phone'    => '0236598744',
            'status'   => 1,
        ];
        Branch::insert($branch);
        User::insert($users);
    }
}
