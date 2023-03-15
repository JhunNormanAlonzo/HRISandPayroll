<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'userctrl' => '_12F0VPTFA',
            'grp' => 'SYS ADMIN',
            'username' => 'ADMIN',
            'passkey' => 'ADMIN',
            'active' => '-1',
            'email' => 'sample@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'userctrl' => '_12F0W6CGE',
            'grp' => 'SYS ADMIN',
            'username' => 'VONQ',
            'passkey' => 'TABS',
            'active' => '-1',
            'email' => 'sample@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'userctrl' => '_6FD0MP34X',
            'grp' => 'STAFF',
            'username' => 'DCTECH',
            'passkey' => '',
            'active' => '',
            'email' => 'sample@gmail.com',
            'password' => bcrypt('password'),
        ]);


        User::create([
            'userctrl' => '_6FV0K30X6',
            'grp' => 'STAFF',
            'username' => 'JEAN',
            'passkey' => '',
            'active' => '',
            'email' => 'sample@gmail.com',
            'password' => bcrypt('password'),
        ]);


    }
}
