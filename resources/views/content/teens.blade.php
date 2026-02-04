@extends('layouts.app')

@section('title', 'Bantuan untuk Remaja (13-17 tahun) - StopBullying')

@section('styles')
<style>
    .hero-gradient {
        background: url('{{ asset('images/remaja_hero_bg.png') }}') !important;
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
    .btn-help {
        transition: all 0.3s ease;
    }
    .btn-help:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3);
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
                <!-- Teks disembunyikan karena sudah ada di gambar background -->
            </div>
        </div>
    </section>

    <!-- Content Cards Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                
                <!-- Card 1: Pelecehan Seksual -->
                <a href="{{ route('content.sexualHarassment') }}" class="block rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="bg-gradient-to-br from-red-500 to-red-600 p-12 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white text-8xl"></i>
                    </div>
                    <div class="bg-white p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Pelecehan Seksual</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            Kenali tanda-tanda pelecehan seksual baik offline maupun online. Pelajari cara melindungi diri dan batasan pribadi yang sehat.
                        </p>
                        <span class="text-red-600 font-semibold text-sm inline-flex items-center">Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i></span>
                    </div>
                </a>

                <!-- Card 2: Cyberbullying -->
                <a href="{{ route('content.cyberbullyingInfo') }}" class="block rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-12 flex items-center justify-center">
                        <i class="fas fa-laptop text-white text-8xl"></i>
                    </div>
                    <div class="bg-white p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Cyberbullying</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            Bullying online bisa sangat menyakitkan. Pelajari cara mengenali, menghadapi, dan melaporkan cyberbullying dengan aman.
                        </p>
                        <span class="text-purple-600 font-semibold text-sm inline-flex items-center">Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i></span>
                    </div>
                </a>

                <!-- Card 3: Jejak Digital -->
                <a href="{{ route('content.digitalFootprint') }}" class="block rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-12 flex items-center justify-center">
                        <i class="fas fa-fingerprint text-white text-8xl"></i>
                    </div>
                    <div class="bg-white p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Jejak Digital</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                            Apa yang kamu posting online akan tersimpan selamanya. Pelajari cara mengelola reputasi digital dan privasi online-mu.
                        </p>
                        <span class="text-teal-600 font-semibold text-sm inline-flex items-center">Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i></span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- Additional Resources Section -->
    <section class="bg-gradient-to-br from-blue-50 to-indigo-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Butuh Bantuan Lebih Lanjut?</h2>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                    Jika kamu mengalami bullying, pelecehan, atau masalah online lainnya, jangan ragu untuk melaporkan atau berkonsultasi dengan kami.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('report.create') }}" class="px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-300 font-semibold text-lg shadow-lg">Laporkan Bullying</a>
                    <a href="{{ route('consultation.index') }}" class="px-8 py-4 bg-white text-blue-600 border-2 border-blue-600 rounded-xl hover:bg-blue-50 transition duration-300 font-semibold text-lg shadow-lg">Ruang Konsultasi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Tips Keamanan Digital untuk Remaja</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-lock text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Gunakan Password yang Kuat</h3>
                            <p class="text-gray-600 text-sm">Buat password yang unik dan sulit ditebak untuk setiap akun. Aktifkan autentikasi dua faktor.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-user-secret text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Jaga Privasi</h3>
                            <p class="text-gray-600 text-sm">Pikirkan dua kali sebelum membagikan informasi pribadi atau lokasi di media sosial.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-ban text-red-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Block & Report</h3>
                            <p class="text-gray-600 text-sm">Jangan ragu untuk memblokir dan melaporkan akun yang mengganggu atau mencurigakan.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-comments text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Bicara dengan Orang Terpercaya</h3>
                            <p class="text-gray-600 text-sm">Ceritakan masalahmu kepada orang tua, guru, atau konselor yang kamu percaya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
