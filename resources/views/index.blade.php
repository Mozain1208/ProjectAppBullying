@extends('layouts.app')

@section('title', 'Selamat Datang di StopBullying - SMK Mandiri Bersemi')

@section('content')
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Hentikan <span class="text-blue-600">Bullying</span>,<br>Mulai Menyayangi.
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Selamat datang di platform StopBullying SMK Mandiri Bersemi. Kami menyediakan wadah yang aman untuk belajar, berkonsultasi, dan melaporkan tindakan perundungan demi masa depan yang lebih baik.
                </p>
                <div class="flex flex-wrap gap-4">
                    @auth
                        <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="inline-block px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-300 font-bold shadow-lg shadow-blue-200">
                            {{ Auth::user()->role == 'admin' ? 'Kelola Laporan' : 'Laporkan Sekarang' }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-300 font-bold shadow-lg shadow-blue-200">
                            Laporkan Sekarang
                        </a>
                    @endauth
                    <a href="#info-section" class="inline-block px-8 py-4 bg-white text-blue-600 border-2 border-blue-600 rounded-xl hover:bg-blue-50 transition duration-300 font-bold">
                        Pelajari Dulu
                    </a>
                </div>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-2xl skew-y-1 transform hover:skew-y-0 transition duration-500 aspect-[4/3]">
                <img src="{{ asset('images/learning_susi.jpg') }}" alt="Learning" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <!-- Information Section -->
    <section id="info-section" class="container mx-auto px-4 py-16">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mari Belajar Bersama</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kami menyediakan berbagai informasi edukatif untuk anak, remaja, maupun orang tua agar lebih paham tentang bahaya dan pencegahan bullying.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-500 border border-gray-100 p-2">
                <div class="h-48 rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/apa-itu-bullying.jpg') }}" alt="Apa itu Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Definisi Bullying</h3>
                    <p class="text-gray-600 text-sm mb-6">Pahami apa yang dimaksud dengan bullying dan mengapa hal ini tidak boleh dibiarkan begitu saja.</p>
                    <a href="{{ route('content.whatIsBullying') }}" class="block text-center py-3 bg-gray-50 text-gray-800 rounded-lg hover:bg-blue-600 hover:text-white transition font-bold">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-500 border border-gray-100 p-2">
                <div class="h-48 rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/jenis-bullying.jpg') }}" alt="Jenis Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Kenali Jenisnya</h3>
                    <p class="text-gray-600 text-sm mb-6">Bullying bukan cuma soal fisik. Ada verbal, sosial, hingga cyberbullying yang sering terjadi di dunia maya.</p>
                    <a href="{{ route('content.typesOfBullying') }}" class="block text-center py-3 bg-gray-50 text-gray-800 rounded-lg hover:bg-blue-600 hover:text-white transition font-bold">Baca Selengkapnya</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-500 border border-gray-100 p-2">
                <div class="h-48 rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/dampak-bullying.jpg') }}" alt="Dampak Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Dampak Bahaya</h3>
                    <p class="text-gray-600 text-sm mb-6">Dampak bullying bisa membekas seumur hidup. Mari cegah sebelum terlambat demi kesehatan mental kita.</p>
                    <a href="{{ route('content.impactOfBullying') }}" class="block text-center py-3 bg-gray-50 text-gray-800 rounded-lg hover:bg-blue-600 hover:text-white transition font-bold">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <!-- Pojok Ilmu Section -->
    <section class="bg-blue-50 py-16 mt-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pojok Ilmu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Temukan berbagai pengetahuan tentang bullying dari berbagai perspektif ilmiah untuk pemahaman yang lebih dalam.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <a href="{{ route('content.scienceBiology') }}" class="bg-white rounded-2xl p-6 text-center hover:shadow-xl transition duration-300 transform hover:-translate-y-1 border border-blue-100">
                    <div class="mb-4 flex justify-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center p-3">
                            <img src="{{ asset('images/icons/biologi.png') }}" alt="Biologi" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Biologi</h3>
                </a>

                <a href="{{ route('content.sciencePsychology') }}" class="bg-white rounded-2xl p-6 text-center hover:shadow-xl transition duration-300 transform hover:-translate-y-1 border border-purple-100">
                    <div class="mb-4 flex justify-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center p-3">
                            <img src="{{ asset('images/icons/psikologi.png') }}" alt="Psikologi" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Psikologi</h3>
                </a>

                <a href="{{ route('content.scienceSocial') }}" class="bg-white rounded-2xl p-6 text-center hover:shadow-xl transition duration-300 transform hover:-translate-y-1 border border-green-100">
                    <div class="mb-4 flex justify-center">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center p-3">
                            <img src="{{ asset('images/icons/sosial.png') }}" alt="Sosial" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Sosial</h3>
                </a>

                <a href="{{ route('content.scienceSpiritual') }}" class="bg-white rounded-2xl p-6 text-center hover:shadow-xl transition duration-300 transform hover:-translate-y-1 border border-amber-100">
                    <div class="mb-4 flex justify-center">
                        <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center p-3">
                            <img src="{{ asset('images/icons/spiritual.png') }}" alt="Spiritual" class="w-full h-full object-contain">
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Spiritual</h3>
                </a>
            </div>
        </div>
    </section>
@endsection
