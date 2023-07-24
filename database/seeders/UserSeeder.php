<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [];

        for ($i = 1; $i <= 10; $i++) {
            $name = 'user ' . $i;
            $email = 'user' . $i . '@gmail.com';
            $password = Hash::make('password' . $i);

            $usersData[] = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ];
        }

        DB::table('users')->insert($usersData);
    }
}
