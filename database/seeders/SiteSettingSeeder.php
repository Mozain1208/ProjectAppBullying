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
                'setting_key' => 'school_name',
                'setting_value' => 'SMK Mandiri Bersemi Cianjur',
            ],
            [
                'setting_key' => 'school_address',
                'setting_value' => 'Jl. Raya Cianjur - Sukabumi, Cianjur, Jawa Barat',
            ],
            [
                'setting_key' => 'contact_email',
                'setting_value' => 'info@smkmandiribersemi.sch.id',
            ],
            [
                'setting_key' => 'contact_phone',
                'setting_value' => '(0263) 1234567',
            ],
            [
                'setting_key' => 'welcome_message',
                'setting_value' => 'Selamat datang di Platform Pengaduan Bullying SMK Mandiri Bersemi. Mari bersama kita wujudkan lingkungan sekolah yang aman dan nyaman.',
            ],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->updateOrInsert(
                ['setting_key' => $setting['setting_key']],
                [
                    'setting_value' => $setting['setting_value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
