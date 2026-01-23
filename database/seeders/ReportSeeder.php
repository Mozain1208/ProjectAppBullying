<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->where('role', 'user')->first()->id ?? null;

        if (!$userId) return;

        $reports = [
            [
                'user_id' => $userId,
                'reporter_name' => 'Budi Santoso',
                'reporter_age' => 16,
                'reporter_role' => 'korban',
                'bullying_type' => 'verbal',
                'incident_time' => '2026-01-20 10:30:00',
                'location' => 'Kantin Sekolah',
                'description' => 'Mendapatkan kata-kata kasar dan hinaan dari sekelompok siswa saat istirahat.',
                'status' => 'pending',
                'anonymous' => false,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => $userId,
                'reporter_name' => 'Siti Aminah',
                'reporter_age' => 17,
                'reporter_role' => 'korban',
                'bullying_type' => 'sosial',
                'incident_time' => '2026-01-22 14:00:00',
                'location' => 'Grup WhatsApp Kelas',
                'description' => 'Dikucilkan dan difitnah di grup media sosial kelas.',
                'status' => 'process',
                'anonymous' => false,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
        ];

        foreach ($reports as $report) {
            DB::table('reports')->insert($report);
        }
    }
}
