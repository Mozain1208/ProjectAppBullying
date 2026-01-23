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
        $this->call([
            UserSeeder::class,
            SiteSettingSeeder::class,
            ReportSeeder::class,
        ]);

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin - email: admin@stopbullying.com, password: admin123');
        $this->command->info('User - email: user@example.com, password: password');
    }
}
