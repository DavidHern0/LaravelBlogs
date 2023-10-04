<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Bot 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password1'),
        ]);

        User::create([
            'name' => 'Bot 2',
            'email' => 'user2@example.com',
            'password' => bcrypt('password2'),
        ]);
    }
}
