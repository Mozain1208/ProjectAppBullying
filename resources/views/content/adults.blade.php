@extends('layouts.app')

@section('title', 'Bantuan untuk Dewasa/Orang Tua - StopBullying')

@section('styles')
<style>
    .hero-gradient {
        background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('{{ asset('images/dewasa_bg.jpg') }}') !important;
        background-color: #312e81 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
    }
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    /* Responsiveness for 14" laptops */
    @media (max-width: 1536px) {
        .container {
            max-width: 1280px;
        }
        h1 { font-size: 2.25rem !important; }
        h2 { font-size: 1.75rem !important; }
        p { font-size: 1rem !important; }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient py-24 md:py-36">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="text-white flex-1 text-center md:text-left">
                        <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight text-shadow">
                            Panduan untuk <span class="underline decoration-4 underline-offset-8">Orang Tua & Guru</span>
                        </h1>
                        <p class="text-lg md:text-xl text-white mt-6 max-w-2xl mx-auto md:mx-0 text-shadow font-medium">
                            Bekali diri Anda dengan pengetahuan untuk mendeteksi, mencegah, dan menangani bullying pada anak dan remaja.
                        </p>
                    </div>
                    <div class="w-32 h-32 md:w-48 md:h-48 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-user-shield text-white text-6xl md:text-8xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Cards Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                
                <!-- Card 1: Early Detection -->
                <a href="{{ route('content.earlyDetection') }}" class="block bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden card-hover">
                    <div class="h-56 bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                        <i class="fas fa-search text-white text-7xl opacity-90 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Deteksi Dini Bullying</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            Kenali perubahan perilaku pada anak yang mungkin menjadi tanda mereka mengalami atau melakukan bullying.
                        </p>
                        <span class="text-indigo-600 font-semibold text-sm inline-flex items-center">Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i></span>
                    </div>
                </a>

                <!-- Card 2: Myths and Facts -->
                <a href="{{ route('content.mythsAndFacts') }}" class="block bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden card-hover">
                    <div class="h-56 bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                        <i class="fas fa-lightbulb text-white text-7xl opacity-90 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Mitos & Fakta</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            Pahami kebenaran di balik anggapan umum tentang bullying untuk memberikan dukungan yang tepat bagi anak.
                        </p>
                        <span class="text-indigo-600 font-semibold text-sm inline-flex items-center">Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i></span>
                    </div>
                </a>

                <!-- Card 3: Legal Protection -->
                <a href="{{ route('content.legalProtection') }}" class="block bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden card-hover">
                    <div class="h-56 bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                        <i class="fas fa-gavel text-white text-7xl opacity-90 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Perlindungan Hukum</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            Pelajari aspek hukum dan aturan terkait bullying di Indonesia untuk melindungi hak-hak anak Anda.
                        </p>
                        <span class="text-indigo-600 font-semibold text-sm inline-flex items-center">Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-xs"></i></span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- Resources Section -->


    <!-- Tips Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Langkah Awal Bagi Orang Tua</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600">
                        <i class="fas fa-ear-listen"></i>
                    </div>
                    <h4 class="font-bold mb-2">Jadilah Pendengar</h4>
                    <p class="text-xs text-gray-500">Berikan dukungan tanpa menghakimi saat anak bercerita.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 text-green-600">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <h4 class="font-bold mb-2">Validasi Perasaan</h4>
                    <p class="text-xs text-gray-500">Akui bahwa apa yang mereka rasakan adalah hal yang nyata.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 text-purple-600">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="font-bold mb-2">Cari Solusi Bersama</h4>
                    <p class="text-xs text-gray-500">Libatkan anak dalam menentukan langkah selanjutnya.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 text-red-600">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h4 class="font-bold mb-2">Pantau Aktivitas</h4>
                    <p class="text-xs text-gray-500">Perhatikan interaksi digital anak Anda secara bijak.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
