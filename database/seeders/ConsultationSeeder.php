<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->where('role', 'user')->get();
        $admin = DB::table('users')->where('role', 'admin')->first();
        
        if ($users->isEmpty() || !$admin) return;

        // Create consultations
        $consultations = [
            [
                'user_id' => $users[0]->id ?? null,
                'topic' => 'Cara Menghadapi Bullying Verbal',
                'status' => 'open',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subHours(1),
            ],
            [
                'user_id' => $users[1]->id ?? null,
                'topic' => 'Bantuan Psikologis untuk Korban Bullying',
                'status' => 'open',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subHours(3),
            ],
            [
                'user_id' => $users[2]->id ?? null,
                'topic' => 'Pertanyaan tentang Pelaporan Anonim',
                'status' => 'closed',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(4),
            ],
        ];

        foreach ($consultations as $consultation) {
            $consultationId = DB::table('consultations')->insertGetId($consultation);

            // Add replies for each consultation
            if ($consultationId) {
                $replies = [];
                
                if ($consultation['topic'] == 'Cara Menghadapi Bullying Verbal') {
                    $replies = [
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $consultation['user_id'],
                            'message' => 'Saya sering mendapat ejekan dari teman-teman. Bagaimana cara menghadapinya?',
                            'is_admin' => false,
                            'created_at' => now()->subDays(2),
                            'updated_at' => now()->subDays(2),
                        ],
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $admin->id,
                            'message' => 'Terima kasih telah menghubungi kami. Bullying verbal memang menyakitkan. Beberapa cara yang bisa dilakukan: 1) Jangan menanggapi dengan emosi, 2) Laporkan kepada guru atau orang tua, 3) Catat setiap kejadian, 4) Cari dukungan dari teman yang dipercaya.',
                            'is_admin' => true,
                            'created_at' => now()->subDays(2)->addHours(2),
                            'updated_at' => now()->subDays(2)->addHours(2),
                        ],
                    ];
                } elseif ($consultation['topic'] == 'Bantuan Psikologis untuk Korban Bullying') {
                    $replies = [
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $consultation['user_id'],
                            'message' => 'Saya merasa tertekan dan cemas setelah mengalami bullying. Apakah ada bantuan psikologis yang tersedia?',
                            'is_admin' => false,
                            'created_at' => now()->subDays(1),
                            'updated_at' => now()->subDays(1),
                        ],
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $admin->id,
                            'message' => 'Kami memahami perasaan Anda. Sekolah menyediakan konselor yang bisa membantu. Anda juga bisa menghubungi hotline psikologi: 119 ext 8. Jangan ragu untuk berbicara dengan orang yang Anda percaya.',
                            'is_admin' => true,
                            'created_at' => now()->subHours(3),
                            'updated_at' => now()->subHours(3),
                        ],
                    ];
                } else {
                    $replies = [
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $consultation['user_id'],
                            'message' => 'Apakah laporan saya akan benar-benar anonim? Saya takut identitas saya diketahui.',
                            'is_admin' => false,
                            'created_at' => now()->subDays(5),
                            'updated_at' => now()->subDays(5),
                        ],
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $admin->id,
                            'message' => 'Ya, sistem kami menjamin kerahasiaan identitas Anda jika Anda memilih opsi anonim. Data pribadi Anda hanya dapat diakses oleh admin untuk keperluan investigasi dan tidak akan dibagikan kepada pihak lain.',
                            'is_admin' => true,
                            'created_at' => now()->subDays(5)->addHours(1),
                            'updated_at' => now()->subDays(5)->addHours(1),
                        ],
                        [
                            'consultation_id' => $consultationId,
                            'user_id' => $consultation['user_id'],
                            'message' => 'Terima kasih atas penjelasannya. Saya merasa lebih tenang sekarang.',
                            'is_admin' => false,
                            'created_at' => now()->subDays(4),
                            'updated_at' => now()->subDays(4),
                        ],
                    ];
                }

                foreach ($replies as $reply) {
                    DB::table('consultation_replies')->insert($reply);
                }
            }
        }
    }
}
