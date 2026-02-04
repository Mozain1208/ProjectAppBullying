@extends('layouts.app')

@section('title', 'Dashboard - SMK Mandiri Bersemi')

@section('content')
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Tahukah Kamu<br>Apa Itu <span class="text-blue-600">Bullying?</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Bullying adalah tindakan agresif yang dilakukan secara berulang terhadap seseorang yang lebih lemah atau tidak berdaya. Mari bersama-sama hentikan perundungan di lingkungan kita.
                </p>
                @auth
                    <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="inline-block px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-300 font-bold shadow-lg shadow-blue-200">
                        {{ Auth::user()->role == 'admin' ? 'Kelola Laporan' : 'Laporkan Sekarang' }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-300 font-bold shadow-lg shadow-blue-200">
                        Pelajari Lebih Lanjut
                    </a>
                @endauth
            </div>
            <div class="rounded-2xl overflow-hidden shadow-2xl aspect-[4/3] relative group">
                <img src="{{ asset('images/learning_susi.jpg') }}" alt="Learning" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-blue-600 opacity-10 group-hover:opacity-0 transition duration-500"></div>
            </div>
        </div>
    </section>

    <!-- Information Cards -->
    <section class="container mx-auto px-4 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1: Apa itu Bullying -->
            <a href="{{ route('content.whatIsBullying') }}" class="block bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/apa-itu-bullying.jpg') }}" alt="Apa itu Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Apa itu Bullying?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">Bullying adalah perilaku agresif yang tidak diinginkan di kalangan anak usia sekolah yang melibatkan ketidakseimbangan kekuatan.</p>
                    <span class="text-blue-600 font-bold text-sm inline-flex items-center">Pelajari <i class="fas fa-arrow-right ml-2"></i></span>
                </div>
            </a>

            <!-- Card 2: Jenis Bullying -->
            <a href="{{ route('content.typesOfBullying') }}" class="block bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/jenis-bullying.jpg') }}" alt="Jenis Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jenis Bullying</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">Terdapat empat jenis utama: Verbal (kata-kata), Sosial (reputasi), Fisik (tubuh), dan Cyberbullying (internet).</p>
                    <span class="text-blue-600 font-bold text-sm inline-flex items-center">Pelajari <i class="fas fa-arrow-right ml-2"></i></span>
                </div>
            </a>

            <!-- Card 3: Dampak Bullying -->
            <a href="{{ route('content.impactOfBullying') }}" class="block bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/dampak-bullying.jpg') }}" alt="Dampak Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Dampak Bullying</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">Dampak bullying bisa sangat serius, meliputi masalah kesehatan mental hingga penurunan prestasi akademik.</p>
                    <span class="text-blue-600 font-bold text-sm inline-flex items-center">Pelajari <i class="fas fa-arrow-right ml-2"></i></span>
                </div>
            </a>
        </div>
    </section>

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
