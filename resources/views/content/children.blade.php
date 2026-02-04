@extends('layouts.app')

@section('title', 'Bantuan untuk Anak (5-12 tahun) - StopBullying')

@section('styles')
<style>
    .hero-gradient {
        background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('{{ asset('images/anak_bg.jpg') }}') !important;
        background-color: #065f46 !important;
        background-size: cover !important;
        background-position: center bottom !important;
        background-repeat: no-repeat !important;
    }
    .info-card {
        transition: all 0.3s ease;
    }
    .info-card:hover {
        transform: translateY(-5px);
    }
    .quiz-container {
        display: none;
    }
    .quiz-container.active {
        display: block;
    }
    /* Responsiveness for 14" laptops (approx 1366px - 1536px) */
    @media (max-width: 1536px) {
        .container {
            max-width: 1280px;
        }
        h1 { font-size: 2.5rem !important; }
        h2 { font-size: 1.875rem !important; }
        p { font-size: 1rem !important; }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient py-24 md:py-36">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 text-shadow">
                Bantuan & Panduan untuk <span class="underline decoration-4 underline-offset-8">Anak Usia 5-12 tahun</span>
            </h1>
            <p class="text-lg md:text-xl text-white mt-6 max-w-3xl mx-auto text-shadow font-medium">
                Halo teman-teman! Yuk, kita belajar bersama tentang apa itu bullying, bagaimana cara menghindarinya, dan bagaimana kita bisa saling menyayangi.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="#apa-itu-bullying" class="bg-white text-green-700 px-6 py-3 rounded-full font-bold shadow-lg hover:bg-green-50 transition">Apa itu Bullying?</a>
                <a href="#kuis-deteksi" class="bg-yellow-400 text-yellow-900 px-6 py-3 rounded-full font-bold shadow-lg hover:bg-yellow-300 transition">Kuis: Apakah Aku Di-bully?</a>
                <a href="#kuis-refleksi" class="bg-blue-600 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:bg-blue-700 transition">Kuis: Apakah Aku Membully?</a>
            </div>
        </div>
    </section>

    <!-- Section 1: Apa Itu Bullying (KIRI: Teks, KANAN: Visual) -->
    <section id="apa-itu-bullying" class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <!-- KIRI: Konten Teks -->
                <div class="md:w-1/2 space-y-6">
                    <div class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full font-bold text-sm uppercase tracking-wider">
                        Pengertian
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Apa Itu <span class="text-green-600">Bullying?</span>
                    </h2>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        <span class="font-bold text-green-600">Bullying</span> (perundungan) adalah ketika seseorang menyakiti orang lain dengan <span class="bg-yellow-100 px-2 py-1 rounded font-semibold">sengaja</span> dan <span class="bg-yellow-100 px-2 py-1 rounded font-semibold">berulang kali</span>.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Ini bukan sekadar bercanda, karena orang yang di-bully merasa <strong class="text-red-600">sedih, takut, dan tidak berdaya</strong>.
                    </p>
                    <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-md border-l-4 border-green-500">
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-heart-broken text-green-600 text-2xl"></i>
                        </div>
                        <p class="font-semibold text-gray-800">Membuat korban merasa sedih & takut</p>
                    </div>
                </div>

                <!-- KANAN: Visual/Ilustrasi -->
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-green-200 rounded-full blur-3xl opacity-30"></div>
                        <div class="relative bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-8 shadow-2xl border-4 border-green-200">
                            <div class="text-center space-y-6">
                                <i class="fas fa-hand-paper text-9xl text-green-500 drop-shadow-lg"></i>
                                <div class="bg-white px-6 py-3 rounded-full shadow-lg">
                                    <span class="text-green-700 font-bold text-lg">Stop Bullying!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Jenis Bullying (KIRI: Teks, KANAN: Visual) -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <!-- KIRI: Konten Teks -->
                <div class="md:w-1/2 space-y-6">
                    <div class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full font-bold text-sm uppercase tracking-wider">
                        Kategori
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Jenis-jenis <span class="text-blue-600">Bullying</span>
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Bullying bisa terjadi dalam berbagai bentuk. Yuk kenali supaya kita bisa menghindarinya!
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-4 bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl hover:shadow-lg transition-all duration-300 hover:translate-x-1">
                            <div class="bg-green-500 p-3 rounded-lg flex-shrink-0">
                                <i class="fas fa-comment text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Verbal (Kata-kata)</h4>
                                <p class="text-sm text-gray-600">Mengejek, menghina, memanggil nama buruk, atau mengancam.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl hover:shadow-lg transition-all duration-300 hover:translate-x-1">
                            <div class="bg-blue-500 p-3 rounded-lg flex-shrink-0">
                                <i class="fas fa-hand-rock text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Fisik</h4>
                                <p class="text-sm text-gray-600">Memukul, mendorong, menendang, atau merusak barang.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl hover:shadow-lg transition-all duration-300 hover:translate-x-1">
                            <div class="bg-purple-500 p-3 rounded-lg flex-shrink-0">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Sosial</h4>
                                <p class="text-sm text-gray-600">Menghasut teman untuk menjauhi seseorang atau menyebar rahasia.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-gradient-to-r from-red-50 to-red-100 p-4 rounded-xl hover:shadow-lg transition-all duration-300 hover:translate-x-1">
                            <div class="bg-red-500 p-3 rounded-lg flex-shrink-0">
                                <i class="fas fa-mobile-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Cyberbullying</h4>
                                <p class="text-sm text-gray-600">Bullying lewat HP, tablet, atau komputer (Chat/Game).</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KANAN: Visual -->
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-blue-200 rounded-full blur-3xl opacity-30"></div>
                        <div class="relative grid grid-cols-2 gap-4">
                            <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-blue-500 hover:scale-105 transition">
                                <i class="fas fa-comment-dots text-4xl text-blue-500 mb-2"></i>
                                <div class="h-2 bg-blue-100 rounded mb-1 w-3/4"></div>
                                <div class="h-2 bg-blue-100 rounded w-1/2"></div>
                            </div>
                            <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-red-500 mt-8 hover:scale-105 transition">
                                <i class="fas fa-hand-rock text-4xl text-red-500 mb-2"></i>
                                <div class="h-2 bg-red-100 rounded mb-1 w-3/4"></div>
                                <div class="h-2 bg-red-100 rounded w-1/2"></div>
                            </div>
                            <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-purple-500 hover:scale-105 transition">
                                <i class="fas fa-user-friends text-4xl text-purple-500 mb-2"></i>
                                <div class="h-2 bg-purple-100 rounded mb-1 w-3/4"></div>
                                <div class="h-2 bg-purple-100 rounded w-1/2"></div>
                            </div>
                            <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-indigo-500 mt-8 hover:scale-105 transition">
                                <i class="fas fa-wifi text-4xl text-indigo-500 mb-2"></i>
                                <div class="h-2 bg-indigo-100 rounded mb-1 w-3/4"></div>
                                <div class="h-2 bg-indigo-100 rounded w-1/2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section 3: Dimana Terjadi (KIRI: Teks, KANAN: Visual) -->
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <!-- KIRI: Konten Teks -->
                <div class="md:w-1/2 space-y-6">
                    <div class="inline-block px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full font-bold text-sm uppercase tracking-wider">
                        Lokasi
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Di Mana Saja <span class="text-yellow-600">Bisa Terjadi?</span>
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Bullying tidak memandang tempat. Kita harus selalu waspada di mana pun kita berada.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-4 bg-white p-5 rounded-xl shadow-md border border-yellow-100 hover:shadow-lg hover:scale-105 transition-all duration-300">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-school text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Di Sekolah</h4>
                                <p class="text-sm text-gray-600">Kelas, koridor, kantin, lapangan, toilet.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-white p-5 rounded-xl shadow-md border border-yellow-100 hover:shadow-lg hover:scale-105 transition-all duration-300">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bus text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Di Perjalanan</h4>
                                <p class="text-sm text-gray-600">Jalan pulang/pergi sekolah, tempat nongkrong.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-white p-5 rounded-xl shadow-md border border-yellow-100 hover:shadow-lg hover:scale-105 transition-all duration-300">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-wifi text-yellow-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Di Dunia Maya</h4>
                                <p class="text-sm text-gray-600">Game online, media sosial, aplikasi chat.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KANAN: Visual -->
                <div class="md:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-yellow-300 rounded-full blur-3xl opacity-20"></div>
                        <div class="relative text-center space-y-6">
                            <i class="fas fa-map-marked-alt text-9xl text-yellow-500 drop-shadow-2xl"></i>
                            <div class="bg-white px-8 py-4 rounded-full shadow-xl inline-block border-2 border-yellow-200">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                                    <span class="text-gray-800 font-bold text-lg">Selalu Waspada!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Kuis Deteksi (KIRI: Visual, KANAN: Teks) -->
    <section id="kuis-deteksi" class="py-16 bg-orange-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <!-- Intro -->
                <div id="deteksi-intro" class="p-8 md:p-12 quiz-container active">
                    <div class="flex flex-col md:flex-row-reverse items-center gap-10">
                        <!-- KANAN: Teks -->
                        <div class="md:w-1/2 space-y-6">
                            <div class="inline-block px-4 py-2 bg-orange-100 text-orange-700 rounded-full font-bold text-sm uppercase tracking-wider">
                                Kuis Deteksi
                            </div>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                                Apakah Aku <span class="text-orange-600">Di-bully?</span>
                            </h2>
                            <p class="text-lg text-gray-600 leading-relaxed">
                                Kadang kita bingung, apakah teman kita cuma sedang <span class="font-bold text-orange-600">bersikap jahat</span> sesaat, atau dia benar-benar melakukan <span class="font-bold text-red-600">bullying</span>. Ayo cari tahu lewat kuis ini!
                            </p>
                            <button onclick="startQuizDeteksi()" class="bg-orange-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-orange-700 transition shadow-lg transform hover:scale-105">
                                <i class="fas fa-play-circle mr-2"></i> Mulai Kuis
                            </button>
                        </div>
                        <!-- KIRI: Visual -->
                        <div class="md:w-1/2 flex justify-center">
                            <div class="relative">
                                <div class="absolute inset-0 bg-orange-200 rounded-full blur-3xl opacity-30"></div>
                                <div class="relative w-64 h-64 bg-gradient-to-br from-orange-50 to-orange-100 rounded-full flex items-center justify-center shadow-2xl border-4 border-orange-200">
                                    <i class="fas fa-question text-9xl text-orange-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quiz Area -->
                <div id="deteksi-quiz" class="p-8 md:p-12 quiz-container">
                    <div class="mb-4 flex justify-between items-center text-sm font-bold text-orange-600">
                        <span id="deteksi-number">Pertanyaan 1 dari 10</span>
                        <span id="deteksi-progress-text">10%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-12">
                        <div id="deteksi-progress-bar" class="bg-orange-500 h-2 rounded-full transition-all duration-300" style="width: 10%"></div>
                    </div>

                    <div class="min-h-[150px] flex items-center justify-center text-center">
                        <h3 id="deteksi-text" class="text-2xl font-bold text-gray-800 leading-tight"></h3>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-12">
                        <button onclick="handleDeteksiAnswer(true)" class="bg-red-500 text-white py-6 rounded-2xl font-bold text-xl hover:bg-red-600 transition shadow-md">YA</button>
                        <button onclick="handleDeteksiAnswer(false)" class="bg-green-500 text-white py-6 rounded-2xl font-bold text-xl hover:bg-green-600 transition shadow-md">TIDAK</button>
                    </div>
                </div>

                <!-- Result Area -->
                <div id="deteksi-result" class="p-8 md:p-12 text-center quiz-container">
                    <div id="deteksi-icon" class="mb-6"></div>
                    <h2 id="deteksi-title" class="text-3xl font-bold mb-4"></h2>
                    <div id="deteksi-description" class="text-gray-600 text-lg mb-8 leading-relaxed"></div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('report.create') }}" id="btn-laporkan-deteksi" class="bg-orange-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-orange-700 transition shadow-lg hidden">Laporkan Sekarang</a>
                        <button onclick="resetDeteksi()" class="bg-gray-100 text-gray-700 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-200 transition">Ulangi Kuis</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Kuis Refleksi (KIRI: Teks, KANAN: Visual) -->
    <section id="kuis-refleksi" class="py-16 bg-indigo-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-4 border-indigo-500">
                <!-- Intro -->
                <div id="refleksi-intro" class="p-8 md:p-12 quiz-container active">
                    <div class="flex flex-col md:flex-row items-center gap-10">
                        <!-- KIRI: Teks -->
                        <div class="md:w-1/2 space-y-6">
                            <div class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full font-bold text-sm uppercase tracking-wider">
                                Refleksi Diri
                            </div>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                                Apakah Aku <span class="text-indigo-600">Membully?</span>
                            </h2>
                            <p class="text-lg text-gray-600 leading-relaxed">
                                Kadang kita tidak sadar kalau candaan kita ternyata menyakiti hati teman lain. Mengakui kesalahan adalah langkah pertama untuk menjadi orang yang lebih baik. Yuk introspeksi diri sejenak.
                            </p>
                            <button onclick="startQuizRefleksi()" class="bg-indigo-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-indigo-700 transition shadow-lg transform hover:scale-105">
                                <i class="fas fa-search mr-2"></i> Mulai Refleksi
                            </button>
                        </div>
                        <!-- KANAN: Visual -->
                        <div class="md:w-1/2 flex justify-center">
                            <div class="relative">
                                <div class="absolute inset-0 bg-indigo-200 rounded-full blur-3xl opacity-30"></div>
                                <div class="relative w-64 h-64 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-full flex items-center justify-center shadow-2xl border-4 border-indigo-200">
                                    <i class="fas fa-user-secret text-9xl text-indigo-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quiz Area -->
                <div id="refleksi-quiz" class="p-8 md:p-12 quiz-container">
                    <div class="mb-4 flex justify-between items-center text-sm font-bold text-indigo-600">
                        <span id="refleksi-number">Pertanyaan 1 dari 10</span>
                        <span id="refleksi-progress-text">10%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-12">
                        <div id="refleksi-progress-bar" class="bg-indigo-500 h-2 rounded-full transition-all duration-300" style="width: 10%"></div>
                    </div>

                    <div class="min-h-[150px] flex items-center justify-center text-center">
                        <h3 id="refleksi-text" class="text-2xl font-bold text-gray-800 leading-tight"></h3>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-12">
                        <button onclick="handleRefleksiAnswer(true)" class="bg-red-500 text-white py-6 rounded-2xl font-bold text-xl hover:bg-red-600 transition shadow-md">YA</button>
                        <button onclick="handleRefleksiAnswer(false)" class="bg-green-500 text-white py-6 rounded-2xl font-bold text-xl hover:bg-green-600 transition shadow-md">TIDAK</button>
                    </div>
                </div>

                <!-- Result Area -->
                <div id="refleksi-result" class="p-8 md:p-12 text-center quiz-container">
                    <div id="refleksi-icon" class="mb-6"></div>
                    <h2 id="refleksi-title" class="text-3xl font-bold mb-4"></h2>
                    <div id="refleksi-description" class="text-gray-600 text-lg mb-8 leading-relaxed"></div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a id="btn-lanjut-refleksi" href="{{ route('content.bullyReflection') }}" class="bg-red-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg hidden">Lanjut ke Pojok Refleksi</a>
                        <button onclick="resetRefleksi()" class="bg-gray-100 text-gray-700 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-200 transition">Ulangi Kuis</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Tips Keamanan Online untuk Kamu</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-comments text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Bicara dengan Orang Dewasa</h3>
                            <p class="text-gray-600">Selalu ceritakan kepada orang tua atau guru jika ada yang membuatmu tidak nyaman saat online.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-lock text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Jaga Privasi</h3>
                            <p class="text-gray-600">Jangan berbagi alamat rumah, nomor telepon, atau nama sekolah kepada orang yang tidak dikenal.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-brain text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Berpikir Sebelum Posting</h3>
                            <p class="text-gray-600">Pikirkan baik-baik sebelum membagikan foto atau menulis sesuatu di internet.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Laporkan Konten Buruk</h3>
                            <p class="text-gray-600">Gunakan tombol lapor jika kamu melihat sesuatu yang tidak pantas atau membuatmu takut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // --- KUIS DETEKSI (APAKAH AKU DI-BULLY) ---
    const deteksiQuestions = [
        "Apakah orang tersebut menyakitimu lebih dari satu kali?",
        "Apakah kamu merasa orang itu lebih kuat atau punya kekuasaan lebih darimu?",
        "Apakah orang tersebut sengaja ingin membuatmu sedih atau marah?",
        "Apakah kamu merasa takut untuk bertemu orang tersebut?",
        "Apakah orang itu mengajak teman-teman lain untuk menjauhimu?",
        "Apakah orang itu tetap melakukannya meskipun kamu sudah memintanya berhenti?",
        "Apakah kamu merasa tidak berdaya untuk melawan atau menghentikannya?",
        "Apakah orang itu mengejek fisikmu atau namamu berkali-kali?",
        "Apakah orang itu merusak atau mengambil barang-barangmu dengan sengaja?",
        "Apakah hal ini membuatmu jadi tidak ingin pergi ke sekolah atau bermain?"
    ];

    let deteksiCurrent = 0;
    let deteksiScore = 0;

    function startQuizDeteksi() {
        document.getElementById('deteksi-intro').classList.remove('active');
        document.getElementById('deteksi-quiz').classList.add('active');
        showDeteksiQuestion();
    }

    function showDeteksiQuestion() {
        document.getElementById('deteksi-text').innerText = deteksiQuestions[deteksiCurrent];
        document.getElementById('deteksi-number').innerText = `Pertanyaan ${deteksiCurrent + 1} dari ${deteksiQuestions.length}`;
        const prog = ((deteksiCurrent + 1) / deteksiQuestions.length) * 100;
        document.getElementById('deteksi-progress-bar').style.width = `${prog}%`;
        document.getElementById('deteksi-progress-text').innerText = `${prog}%`;
    }

    function handleDeteksiAnswer(ans) {
        if(ans) deteksiScore++;
        deteksiCurrent++;
        if(deteksiCurrent < deteksiQuestions.length) {
            showDeteksiQuestion();
        } else {
            showDeteksiResult();
        }
    }

    function showDeteksiResult() {
        document.getElementById('deteksi-quiz').classList.remove('active');
        document.getElementById('deteksi-result').classList.add('active');
        const icon = document.getElementById('deteksi-icon');
        const title = document.getElementById('deteksi-title');
        const desc = document.getElementById('deteksi-description');
        const btn = document.getElementById('btn-laporkan-deteksi');

        if(deteksiScore >= 7) {
            icon.innerHTML = '<div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto text-red-600"><i class="fas fa-exclamation-circle text-5xl"></i></div>';
            title.innerText = "Terindikasi Bullying";
            title.className = "text-3xl font-bold mb-4 text-red-600";
            desc.innerHTML = `Kamu menjawab <strong>${deteksiScore} dari 10</strong> pertanyaan dengan "YA". <br><br> Ini menunjukkan bahwa apa yang kamu alami kemungkinan besar adalah bullying. Jangan takut, kamu tidak sendirian. Sebaiknya kamu segera melapor atau bercerita ke orang dewasa yang kamu percaya.`;
            btn.classList.remove('hidden');
        } else {
            icon.innerHTML = '<div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto text-green-600"><i class="fas fa-check-circle text-5xl"></i></div>';
            title.innerText = "Bukan Bullying (Mungkin Hanya Bersikap Buruk)";
            title.className = "text-3xl font-bold mb-4 text-green-600";
            desc.innerHTML = `Kamu menjawab <strong>${deteksiScore} dari 10</strong> pertanyaan dengan "YA". <br><br> Sepertinya orang tersebut hanya sedang bersikap tidak baik atau jahat padamu saat ini (tidak terus-menerus). Cobalah untuk membicarakannya baik-baik atau tetap bercerita ke orang tua atau guru ya!`;
            btn.classList.add('hidden');
        }
    }

    function resetDeteksi() {
        deteksiCurrent = 0;
        deteksiScore = 0;
        document.getElementById('deteksi-result').classList.remove('active');
        document.getElementById('deteksi-intro').classList.add('active');
    }

    // --- KUIS REFLEKSI (APAKAH AKU MEMBULLY) ---
    const refleksiQuestions = [
        "Apakah kamu sengaja mengejek teman agar teman-teman lain tertawa?",
        "Apakah kamu sering memanggil teman dengan nama yang dia tidak sukai?",
        "Apakah kamu pernah menyebarkan cerita bohong tentang temanmu?",
        "Apakah kamu pernah melarang teman lain untuk berteman dengan seseorang?",
        "Apakah kamu merasa senang ketika melihat temanmu merasa takut atau sedih?",
        "Apakah kamu pernah mengambil atau menyembunyikan barang teman tanpa ijin agar dia bingung?",
        "Apakah kamu pernah mengancam akan menyakiti teman jika dia tidak menuruti maumu?",
        "Apakah kamu sengaja meninggalkan atau mengeluarkan teman dari grup bermain/obrolan?",
        "Apakah kamu merasa lebih hebat ketika berhasil membuat seseorang menangis?",
        "Apakah kamu tetap melakukan hal yang mengganggu teman meskipun dia sudah minta berhenti?"
    ];

    let refleksiCurrent = 0;
    let refleksiScore = 0;

    function startQuizRefleksi() {
        document.getElementById('refleksi-intro').classList.remove('active');
        document.getElementById('refleksi-quiz').classList.add('active');
        showRefleksiQuestion();
    }

    function showRefleksiQuestion() {
        document.getElementById('refleksi-text').innerText = refleksiQuestions[refleksiCurrent];
        document.getElementById('refleksi-number').innerText = `Pertanyaan ${refleksiCurrent + 1} dari ${refleksiQuestions.length}`;
        const prog = ((refleksiCurrent + 1) / refleksiQuestions.length) * 100;
        document.getElementById('refleksi-progress-bar').style.width = `${prog}%`;
        document.getElementById('refleksi-progress-text').innerText = `${prog}%`;
    }

    function handleRefleksiAnswer(ans) {
        if(ans) refleksiScore++;
        refleksiCurrent++;
        if(refleksiCurrent < refleksiQuestions.length) {
            showRefleksiQuestion();
        } else {
            showRefleksiResult();
        }
    }

    function showRefleksiResult() {
        document.getElementById('refleksi-quiz').classList.remove('active');
        document.getElementById('refleksi-result').classList.add('active');
        const icon = document.getElementById('refleksi-icon');
        const title = document.getElementById('refleksi-title');
        const desc = document.getElementById('refleksi-description');
        const btn = document.getElementById('btn-lanjut-refleksi');

        if(refleksiScore >= 8) {
            icon.innerHTML = '<div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto text-red-600"><i class="fas fa-heart-broken text-5xl"></i></div>';
            title.innerText = "Hati-hati, Kamu Membully";
            title.className = "text-3xl font-bold mb-4 text-red-600";
            desc.innerHTML = `Kamu menjawab <strong>${refleksiScore} dari 10</strong> pertanyaan dengan "YA". <br><br> Ini menunjukkan bahwa perbuatanmu sudah termasuk tindakan bullying. Yuk berhenti sekarang sebelum temanmu semakin terluka. Mengakui kesalahan adalah awal kebaikan.`;
            btn.classList.remove('hidden');
        } else {
            icon.innerHTML = '<div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto text-green-600"><i class="fas fa-heart text-5xl"></i></div>';
            title.innerText = "Teruslah Bersikap Baik!";
            title.className = "text-3xl font-bold mb-4 text-green-600";
            desc.innerHTML = `Kamu menjawab <strong>${refleksiScore} dari 10</strong> pertanyaan dengan "YA". <br><br> Sepertinya kamu bukan pembully. Tetaplah menjadi teman yang baik, saling menolong, dan sayangi sesama ya!`;
            btn.classList.add('hidden');
        }
    }

    function resetRefleksi() {
        refleksiCurrent = 0;
        refleksiScore = 0;
        document.getElementById('refleksi-result').classList.remove('active');
        document.getElementById('refleksi-intro').classList.add('active');
    }
</script>
@endsection
