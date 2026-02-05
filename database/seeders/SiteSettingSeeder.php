<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'school_name',
                'value' => 'SMK Mandiri Bersemi Cianjur',
            ],
            [
                'key' => 'school_address',
                'value' => 'Jl. Raya Cianjur - Sukabumi, Cianjur, Jawa Barat',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@smkmandiribersemi.sch.id',
            ],
            [
                'key' => 'contact_phone',
                'value' => '(0263) 1234567',
            ],
            [
                'key' => 'welcome_message',
                'value' => 'Selamat datang di Platform Pengaduan Bullying SMK Mandiri Bersemi. Mari bersama kita wujudkan lingkungan sekolah yang aman dan nyaman.',
            ],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
