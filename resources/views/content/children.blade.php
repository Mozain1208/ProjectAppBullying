<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan untuk Anak (5-12 tahun) - StopBullying</title>
    <meta name="description" content="Informasi dan panduan keamanan online untuk anak usia 5-12 tahun">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
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
    </style>
</head>
<body class="bg-gray-50 transition-colors duration-300">
    <!-- Header with Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50 transition-colors duration-300">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800 dark:text-white">StopBullying</span>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Home</a>
                    <a href="{{ route('content.children') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition font-semibold border-b-2 border-blue-600 dark:border-blue-400">Anak (5-12 tahun)</a>
                    <a href="{{ route('content.teens') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Remaja (13-17 tahun)</a>
                    <a href="{{ route('content.adults') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Dewasa</a>
                    <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">
                        {{ Auth::user()->role == 'admin' ? 'Kelola Laporan' : 'Laporkan Bullying' }}
                    </a>
                    <a href="{{ route('report.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Laporan Saya</a>
                    <a href="{{ route('consultation.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Ruang Konsultasi</a>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}#analytics" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Analisis Data</a>
                    @endif
                </nav>
                
                <div class="flex items-center space-x-4">

                    <a href="{{ route('logout') }}" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 font-medium">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="text-white flex-1">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4">
                            Bantuan & Panduan untuk <span class="underline decoration-4 underline-offset-8">Anak Usia 5-12 tahun</span>
                        </h1>
                        <p class="text-lg md:text-xl text-green-50 mt-6">
                            Informasi bermanfaat dan panduan tentang berbagai topik keamanan online
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <button class="btn-help bg-white text-green-700 px-8 py-4 rounded-lg font-semibold text-lg shadow-lg">
                            Dapatkan Bantuan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Cards Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                
                <!-- Card 0: What is Bullying? -->
                <a href="{{ route('content.bullyingInfo') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-bullhorn text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Apa itu Bullying?
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Yuk cari tahu apa itu bullying, jenisnya, dan dimana saja itu bisa terjadi.
                        </p>
                    </div>
                </a>

                <!-- Card Quiz: Is it Bullying? -->
                <a href="{{ route('content.bullyingQuiz') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-question-circle text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Apakah kamu benar-benar di-bully?
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Kadang kita bingung antara bullying dan orang yang cuma bersikap jahat sesaat. Yuk cek lewat kuis ini!
                        </p>
                    </div>
                </a>

                <!-- Card Quiz: Do I Bully? -->
                <a href="{{ route('content.bullyQuiz') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-indigo-400 to-purple-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-user-secret text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Apakah kamu membully?
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Kadang kita tidak sadar kalau perbuatan kita menyakiti orang lain. Yuk, kita introspeksi diri sejenak.
                        </p>
                    </div>
                </a>







            </div>
        </div>
    </section>

    <!-- Additional Resources Section -->
    <section class="bg-gradient-to-br from-blue-50 to-indigo-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Butuh Bantuan Lebih Lanjut?
                </h2>
                <p class="text-lg text-gray-600 mb-8">
                    Jika kamu mengalami bullying atau melihat temanmu di-bully, jangan ragu untuk melaporkan atau berkonsultasi dengan kami.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="px-8 py-4 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Laporkan Bullying
                    </a>
                    <a href="{{ route('consultation.index') }}" class="px-8 py-4 bg-white text-blue-600 border-2 border-blue-600 rounded-xl hover:bg-blue-50 transition duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Ruang Konsultasi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tips Keamanan Online untuk Anak</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 rounded-full p-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Bicara dengan Orang Dewasa</h3>
                            <p class="text-gray-600">Selalu ceritakan kepada orang tua atau guru jika ada yang membuatmu tidak nyaman saat online.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Jaga Privasi</h3>
                            <p class="text-gray-600">Jangan berbagi informasi pribadi seperti alamat rumah, nomor telepon, atau nama sekolah.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 rounded-full p-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Berpikir Sebelum Posting</h3>
                            <p class="text-gray-600">Pikirkan baik-baik sebelum membagikan foto atau menulis sesuatu online.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 rounded-full p-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                            </svg>
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-16">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; 2024 StopBullying. Platform Pengaduan Bullying yang Aman dan Terpercaya.</p>
            <div class="mt-4 space-x-4">
                <span class="text-gray-400">Selamat datang, {{ Auth::user()->role == 'admin' ? 'Guru' : 'Pengguna' }}!</span>
                <span class="text-gray-600">|</span>
                <a href="{{ route('logout') }}" class="text-gray-400 hover:text-white transition">Logout</a>
            </div>
        </div>
    </footer>
</body>
</html>
