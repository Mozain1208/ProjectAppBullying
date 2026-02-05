<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            ConsultationSeeder::class,
            AuditLogSeeder::class,
        ]);

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('');
        $this->command->info('📋 Login Credentials:');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->command->info('👤 Admin:');
        $this->command->info('   Email: admin@stopbullying.com');
        $this->command->info('   Password: admin123');
        $this->command->info('');
        $this->command->info('👥 Sample Users:');
        $this->command->info('   Email: budi@example.com | Password: password');
        $this->command->info('   Email: siti@example.com | Password: password');
        $this->command->info('   Email: ahmad@example.com | Password: password');
        $this->command->info('   Email: dewi@example.com | Password: password');
        $this->command->info('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
    }
}
