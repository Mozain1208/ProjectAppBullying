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
        $users = DB::table('users')->where('role', 'user')->get();
        
        if ($users->isEmpty()) return;

        $reports = [
            [
                'user_id' => $users[0]->id ?? 1,
                'reporter_name' => 'Budi Santoso',
                'reporter_age' => 16,
                'reporter_role' => 'korban',
                'victim_name' => 'Budi Santoso',
                'perpetrator_name' => 'Kelompok Siswa Kelas 10A',
                'bullying_type' => 'verbal',
                'incident_time' => now()->subDays(3)->setTime(10, 30),
                'incident_date' => now()->subDays(3),
                'location' => 'Kantin Sekolah',
                'incident_location' => 'Kantin Sekolah',
                'description' => 'Mendapatkan kata-kata kasar dan hinaan dari sekelompok siswa saat istirahat. Mereka mengejek penampilan fisik saya dan mengatakan hal-hal yang menyakitkan.',
                'status' => 'pending',
                'anonymous' => false,
                'is_anonymous' => false,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'user_id' => $users[1]->id ?? 2,
                'reporter_name' => 'Siti Aminah',
                'reporter_age' => 17,
                'reporter_role' => 'korban',
                'victim_name' => 'Siti Aminah',
                'perpetrator_name' => 'Beberapa Teman Sekelas',
                'bullying_type' => 'sosial',
                'incident_time' => now()->subDays(1)->setTime(14, 0),
                'incident_date' => now()->subDays(1),
                'location' => 'Grup WhatsApp Kelas',
                'incident_location' => 'Grup WhatsApp Kelas',
                'description' => 'Dikucilkan dan difitnah di grup media sosial kelas. Teman-teman menyebarkan rumor yang tidak benar tentang saya dan mengabaikan pesan saya.',
                'status' => 'process',
                'admin_notes' => 'Sedang dalam investigasi. Telah menghubungi pihak terkait.',
                'anonymous' => false,
                'is_anonymous' => false,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subHours(2),
            ],
            [
                'user_id' => $users[2]->id ?? 3,
                'reporter_name' => null,
                'reporter_age' => 15,
                'reporter_role' => 'korban',
                'victim_name' => 'Siswa Anonim',
                'perpetrator_name' => 'Senior Kelas 12',
                'bullying_type' => 'fisik',
                'incident_time' => now()->subDays(5)->setTime(15, 30),
                'incident_date' => now()->subDays(5),
                'location' => 'Belakang Gedung Olahraga',
                'incident_location' => 'Belakang Gedung Olahraga',
                'description' => 'Dipukul dan didorong oleh senior saat pulang sekolah. Mereka meminta uang jajan dan ketika saya menolak, mereka melakukan kekerasan fisik.',
                'status' => 'investigating',
                'admin_notes' => 'Kasus serius. Sedang mengumpulkan bukti CCTV dan saksi mata.',
                'anonymous' => true,
                'is_anonymous' => true,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(4),
            ],
            [
                'user_id' => $users[3]->id ?? 4,
                'reporter_name' => 'Dewi Lestari',
                'reporter_age' => 14,
                'reporter_role' => 'saksi',
                'victim_name' => 'Rina Putri',
                'perpetrator_name' => 'Akun Anonim di Instagram',
                'bullying_type' => 'cyber',
                'incident_time' => now()->subDays(2)->setTime(20, 0),
                'incident_date' => now()->subDays(2),
                'location' => 'Instagram',
                'incident_location' => 'Instagram',
                'description' => 'Saya melihat teman saya mendapat komentar negatif dan ancaman di media sosial. Akun anonim terus mengirim pesan yang mengintimidasi dan menyebarkan foto-foto yang memalukan.',
                'status' => 'pending',
                'anonymous' => false,
                'is_anonymous' => false,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'user_id' => $users[0]->id ?? 1,
                'reporter_name' => 'Ahmad Rizki',
                'reporter_age' => 15,
                'reporter_role' => 'korban',
                'victim_name' => 'Ahmad Rizki',
                'perpetrator_name' => 'Teman Sebangku',
                'bullying_type' => 'verbal',
                'incident_time' => now()->subDays(7)->setTime(9, 0),
                'incident_date' => now()->subDays(7),
                'location' => 'Ruang Kelas 9B',
                'incident_location' => 'Ruang Kelas 9B',
                'description' => 'Terus-menerus diejek dan dihina karena nilai ujian yang rendah. Teman sebangku sering mengolok-olok di depan teman-teman lain.',
                'status' => 'resolved',
                'admin_notes' => 'Kasus telah diselesaikan. Pelaku telah meminta maaf dan berjanji tidak mengulangi. Kedua pihak telah berdamai.',
                'anonymous' => false,
                'is_anonymous' => false,
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(6),
            ],
            [
                'user_id' => $users[1]->id ?? 2,
                'reporter_name' => null,
                'reporter_age' => 16,
                'reporter_role' => 'korban',
                'victim_name' => 'Korban Anonim',
                'perpetrator_name' => 'Tidak Diketahui',
                'bullying_type' => 'sosial',
                'incident_time' => now()->subDays(10)->setTime(12, 0),
                'incident_date' => now()->subDays(10),
                'location' => 'Kantin dan Kelas',
                'incident_location' => 'Kantin dan Kelas',
                'description' => 'Dijauhi oleh teman-teman tanpa alasan yang jelas. Tidak ada yang mau duduk bersama atau mengajak bicara.',
                'status' => 'dismissed',
                'admin_notes' => 'Setelah investigasi, tidak ditemukan bukti bullying yang disengaja. Situasi telah dijelaskan kepada pelapor.',
                'anonymous' => true,
                'is_anonymous' => true,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(8),
            ],
        ];

        foreach ($reports as $report) {
            DB::table('reports')->insert($report);
        }
    }
}
