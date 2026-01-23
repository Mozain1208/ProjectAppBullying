<?php

namespace Database\Seeders;

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
        // Admin Account
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@stopbullying.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'age' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Sample User Account
        DB::table('users')->updateOrInsert(
            ['email' => 'user@example.com'],
            [
                'username' => 'user_demo',
                'password' => Hash::make('password'),
                'role' => 'user',
                'age' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
