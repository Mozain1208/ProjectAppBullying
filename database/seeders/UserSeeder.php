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
                'age' => 30,
                'account_status' => 'active',
                'warning_count' => 0,
                'trust_score' => 100,
                'risk_level' => 'low',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Sample User Accounts
        $users = [
            [
                'username' => 'budi_santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'age' => 16,
                'account_status' => 'active',
                'warning_count' => 0,
                'trust_score' => 100,
                'risk_level' => 'low',
            ],
            [
                'username' => 'siti_aminah',
                'email' => 'siti@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'age' => 17,
                'account_status' => 'active',
                'warning_count' => 0,
                'trust_score' => 95,
                'risk_level' => 'low',
            ],
            [
                'username' => 'ahmad_rizki',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'age' => 15,
                'account_status' => 'active',
                'warning_count' => 1,
                'trust_score' => 85,
                'risk_level' => 'medium',
            ],
            [
                'username' => 'dewi_lestari',
                'email' => 'dewi@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'age' => 14,
                'account_status' => 'active',
                'warning_count' => 0,
                'trust_score' => 100,
                'risk_level' => 'low',
            ],
            [
                'username' => 'user_demo',
                'email' => 'user_demo@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'age' => 18,
                'account_status' => 'active',
                'warning_count' => 0,
                'trust_score' => 100,
                'risk_level' => 'low',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                array_merge($user, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
