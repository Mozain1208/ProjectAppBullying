<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuditLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->get();
        $admin = DB::table('users')->where('role', 'admin')->first();
        
        if ($users->isEmpty()) return;

        $logs = [
            [
                'user_id' => $admin->id ?? null,
                'performer_id' => $admin->id ?? null,
                'activity' => 'Login',
                'details' => 'Admin berhasil login ke sistem',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id' => $users->where('role', 'user')->first()->id ?? null,
                'performer_id' => null,
                'activity' => 'Register',
                'details' => 'User baru mendaftar ke sistem',
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
            [
                'user_id' => $users->where('role', 'user')->first()->id ?? null,
                'performer_id' => null,
                'activity' => 'Create Report',
                'details' => 'User membuat laporan bullying baru',
                'ip_address' => '192.168.1.100',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => $admin->id ?? null,
                'performer_id' => $admin->id ?? null,
                'activity' => 'Update Report Status',
                'details' => 'Admin mengubah status laporan menjadi "process"',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'user_id' => $users->where('role', 'user')->skip(1)->first()->id ?? null,
                'performer_id' => null,
                'activity' => 'Create Consultation',
                'details' => 'User membuat konsultasi baru',
                'ip_address' => '192.168.1.101',
                'user_agent' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'user_id' => $admin->id ?? null,
                'performer_id' => $admin->id ?? null,
                'activity' => 'Reply Consultation',
                'details' => 'Admin membalas konsultasi user',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subHours(5),
                'updated_at' => now()->subHours(5),
            ],
            [
                'user_id' => $users->where('role', 'user')->skip(2)->first()->id ?? null,
                'performer_id' => $admin->id ?? null,
                'activity' => 'Account Warning',
                'details' => 'Admin memberikan peringatan kepada user karena pelanggaran',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'user_id' => $admin->id ?? null,
                'performer_id' => $admin->id ?? null,
                'activity' => 'Update Settings',
                'details' => 'Admin mengubah pengaturan sistem',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
        ];

        foreach ($logs as $log) {
            DB::table('audit_logs')->insert($log);
        }
    }
}
