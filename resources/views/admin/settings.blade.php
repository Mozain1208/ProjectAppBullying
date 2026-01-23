@extends('layouts.admin')

@section('title', 'Sistem Pengaturan - Admin Panel')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Pengaturan Sistem</h1>
    <p class="text-gray-500 dark:text-gray-400">Kelola konfigurasi dan pengendalian sistem secara menyeluruh.</p>
</div>

@if(session('success'))
    <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg">
        <p class="text-green-700 dark:text-green-400 font-medium">{{ session('success') }}</p>
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" id="settingsForm">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar Menu Settings -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden sticky top-8">
                <nav class="flex flex-col p-2" id="settings-tabs">
                    <button type="button" onclick="showTab('profil')" data-tab="profil" class="tab-btn flex items-center space-x-3 px-4 py-3 rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 font-medium transition-all">
                        <i class="fas fa-university w-5"></i>
                        <span>Profil Institusi</span>
                    </button>
                    <button type="button" onclick="showTab('keamanan')" data-tab="keamanan" class="tab-btn flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all">
                        <i class="fas fa-shield-alt w-5"></i>
                        <span>Keamanan & Akses</span>
                    </button>
                    <button type="button" onclick="showTab('laporan')" data-tab="laporan" class="tab-btn flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all">
                        <i class="fas fa-file-signature w-5"></i>
                        <span>Fitur Laporan</span>
                    </button>
                    <button type="button" onclick="showTab('konsultasi')" data-tab="konsultasi" class="tab-btn flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all">
                        <i class="fas fa-comments w-5"></i>
                        <span>Fitur Konsultasi</span>
                    </button>
                    <button type="button" onclick="showTab('notifikasi')" data-tab="notifikasi" class="tab-btn flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all">
                        <i class="fas fa-bell w-5"></i>
                        <span>Notifikasi</span>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Settings Content Sections -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- 1. Institutional Settings -->
            <div id="tab-profil" class="settings-section bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-university text-blue-600 mr-2"></i> Profil Institusi
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Sekolah / Institusi</label>
                        <input type="text" name="school_name" value="{{ $settings['school_name'] ?? 'Sekolah Anti Bullying' }}" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                </div>
            </div>

            <!-- 2. Security Settings -->
            <div id="tab-keamanan" class="settings-section hidden bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-shield-alt text-blue-600 mr-2"></i> Keamanan & Akses
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kebijakan Password</label>
                        <select name="password_policy" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="standard" {{ ($settings['password_policy'] ?? '') == 'standard' ? 'selected' : '' }}>Standar</option>
                            <option value="strong" {{ ($settings['password_policy'] ?? '') == 'strong' ? 'selected' : '' }}>Kuat (Huruf & Angka)</option>
                            <option value="very_strong" {{ ($settings['password_policy'] ?? '') == 'very_strong' ? 'selected' : '' }}>Sangat Kuat (Kombinasi Simbol)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Minimal Karakter</label>
                        <input type="number" name="min_password_length" value="{{ $settings['min_password_length'] ?? 8 }}" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Batas Percobaan Login</label>
                        <select name="login_attempts_limit" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="3" {{ ($settings['login_attempts_limit'] ?? 5) == 3 ? 'selected' : '' }}>3 Kali</option>
                            <option value="5" {{ ($settings['login_attempts_limit'] ?? 5) == 5 ? 'selected' : '' }}>5 Kali</option>
                            <option value="10" {{ ($settings['login_attempts_limit'] ?? 5) == 10 ? 'selected' : '' }}>10 Kali</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Logout Otomatis (Menit)</label>
                        <input type="number" name="auto_logout_time" value="{{ $settings['auto_logout_time'] ?? 30 }}" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 dark:border-gray-700">
                    <h4 class="font-bold text-gray-800 dark:text-white mb-4">Pengaturan Hak Akses Berdasarkan Peran</h4>
                    <div class="space-y-4">
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-bold text-blue-600 uppercase">Administrator</span>
                                <span class="text-[10px] bg-blue-100 text-blue-600 px-2 py-1 rounded">Akses Penuh</span>
                            </div>
                            <textarea name="access_role_admin" rows="2" class="w-full text-xs bg-transparent border-none focus:ring-0 text-gray-600 dark:text-gray-400 italic" placeholder="Contoh: Mengelola seluruh sistem, menghapus data, mengonfigurasi keamanan...">{{ $settings['access_role_admin'] ?? 'Mengelola seluruh aspek sistem termasuk pengaturan keamanan, audit log, dan data master.' }}</textarea>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-bold text-indigo-600 uppercase">Pelapor (User)</span>
                                <span class="text-[10px] bg-indigo-100 text-indigo-600 px-2 py-1 rounded">Akses Publik</span>
                            </div>
                            <textarea name="access_role_pelapor" rows="2" class="w-full text-xs bg-transparent border-none focus:ring-0 text-gray-600 dark:text-gray-400 italic" placeholder="Deskripsi akses pelapor...">{{ $settings['access_role_pelapor'] ?? 'Mengirim laporan bullying, berdiskusi di ruang konsultasi, dan mengakses materi edukasi.' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Report Settings -->
            <div id="tab-laporan" class="settings-section hidden bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-file-signature text-blue-600 mr-2"></i> Konfigurasi Fitur Laporan
                </h3>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Kategori Jenis Bullying</label>
                        <textarea name="bullying_categories" rows="3" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Pisahkan dengan koma (,)">{{ $settings['bullying_categories'] ?? 'Fisik, Verbal, Sosial/Relasional, Cyberbullying, Pelecehan Seksual' }}</textarea>
                        <p class="text-[10px] text-gray-500 mt-1">Gunakan koma sebagai pemisah antar kategori.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Status Default Laporan</label>
                            <div class="px-4 py-2 bg-gray-100 dark:bg-gray-900 text-gray-500 rounded-lg border border-dashed border-gray-300 dark:border-gray-700 flex items-center">
                                <i class="fas fa-clock mr-2"></i> Pending (Menunggu Verifikasi)
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Batas Waktu Penanganan (Hari)</label>
                            <input type="number" name="report_handling_deadline" value="{{ $settings['report_handling_deadline'] ?? 7 }}" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>


                    <div class="flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/10 rounded-xl border border-blue-100 dark:border-blue-900/30">
                        <div>
                            <h4 class="font-bold text-blue-800 dark:text-blue-300">Wajib Verifikasi Admin</h4>
                            <p class="text-xs text-blue-600 dark:text-blue-400">Jika diaktifkan, laporan tidak akan masuk ke tahap penanganan sebelum disetujui admin.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="report_verification_required" value="on" class="sr-only peer" {{ ($settings['report_verification_required'] ?? 'on') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- 4. Consultation Settings -->
            <div id="tab-konsultasi" class="settings-section hidden bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-comments text-blue-600 mr-2"></i> Pengaturan Layanan Konsultasi
                </h3>
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-gray-700 dark:text-gray-300">Aktifkan Fitur Konsultasi</h4>
                            <p class="text-xs text-gray-500">Menampilkan menu konsultasi di halaman pengguna.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="consultation_enabled" value="on" class="sr-only peer" {{ ($settings['consultation_enabled'] ?? 'on') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-gray-700 dark:text-gray-300">Konsultasi Anonim</h4>
                            <p class="text-xs text-gray-500">Izinkan pelapor menyembunyikan identitas aslinya dari konselor.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="consultation_anonymous" value="on" class="sr-only peer" {{ ($settings['consultation_anonymous'] ?? 'off') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Jam Layanan Mulai</label>
                            <input type="time" name="counselor_hours_start" value="{{ $settings['counselor_hours_start'] ?? '08:00' }}" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Jam Layanan Selesai</label>
                            <input type="time" name="counselor_hours_end" value="{{ $settings['counselor_hours_end'] ?? '16:00' }}" class="w-full px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Notifikasi Konsultasi Baru (Legacy)</h4>
                                <p class="text-xs text-gray-500">Kirim notifikasi real-time kepada konselor saat ada permintaan bantuan baru.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="consultation_notifications" value="on" class="sr-only peer" {{ ($settings['consultation_notifications'] ?? 'on') == 'on' ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Notification Settings -->
            <div id="tab-notifikasi" class="settings-section hidden bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                    <i class="fas fa-bell text-blue-600 mr-2"></i> Pengaturan Notifikasi Sistem
                </h3>
                <div class="space-y-6">
                    <!-- New Report Notification -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                                <i class="fas fa-file-alt text-red-600 dark:text-red-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Laporan Baru Masuk</h4>
                                <p class="text-xs text-gray-500">Kirim notifikasi ke Admin saat pengguna mengirimkan laporan bullying baru.</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="notify_new_report" value="on" class="sr-only peer" {{ ($settings['notify_new_report'] ?? 'on') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <!-- New Consultation Notification -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                <i class="fas fa-comments text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Konsultasi Baru</h4>
                                <p class="text-xs text-gray-500">Kirim notifikasi ke Konselor/Admin saat ada permintaan konsultasi baru.</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="notify_new_consultation" value="on" class="sr-only peer" {{ ($settings['notify_new_consultation'] ?? 'on') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <!-- New Report Message Notification -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center">
                                <i class="fas fa-reply text-orange-600 dark:text-orange-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Balasan Pesan Laporan</h4>
                                <p class="text-xs text-gray-500">Kirim notifikasi saat ada pesan/update baru dalam penanganan laporan.</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="notify_report_message" value="on" class="sr-only peer" {{ ($settings['notify_report_message'] ?? 'on') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <!-- New Consultation Message Notification -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                <i class="fas fa-comment-dots text-green-600 dark:text-green-400"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Balasan Pesan Konsultasi</h4>
                                <p class="text-xs text-gray-500">Kirim notifikasi saat ada balasan pesan baru di ruang konsultasi.</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="notify_consultation_message" value="on" class="sr-only peer" {{ ($settings['notify_consultation_message'] ?? 'on') == 'on' ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons Desktop -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                <button type="reset" class="px-6 py-2 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 rounded-lg font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition">Reset</button>
                <button type="submit" class="px-8 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 shadow-md shadow-blue-500/20 transition">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>

<script>
    function showTab(tabId) {
        // Hide all sections
        document.querySelectorAll('.settings-section').forEach(section => {
            section.classList.add('hidden');
        });
        
        // Show target section
        document.getElementById('tab-' + tabId).classList.remove('hidden');
        
        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-blue-50', 'text-blue-600', 'dark:bg-blue-900/30', 'dark:text-blue-400', 'font-medium');
            btn.classList.add('text-gray-600', 'dark:text-gray-400');
        });
        
        event.currentTarget.classList.add('bg-blue-50', 'text-blue-600', 'dark:bg-blue-900/30', 'dark:text-blue-400', 'font-medium');
        event.currentTarget.classList.remove('text-gray-600', 'dark:text-gray-400');
    }
</script>
@endsection
