<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        DB::table('users')->insert([
            'username' => 'admin',
            'nis' => '000000',
            'email' => 'admin@stopbullying.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'age_category' => 'adult',
            'status' => 'active',
            'trust_score' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create sample user
        DB::table('users')->insert([
            'username' => 'user_demo',
            'nis' => '123456',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'age_category' => 'teen',
            'status' => 'active',
            'trust_score' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('Default users created successfully!');
        $this->command->info('Admin - username: admin, password: admin123');
        $this->command->info('User - username: user_demo, password: password');
    }
}
