<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan untuk Remaja (13-17 tahun) - StopBullying</title>
    <meta name="description" content="Informasi dan panduan keamanan online untuk remaja usia 13-17 tahun">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
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
                    <a href="{{ route('content.children') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Anak (5-12 tahun)</a>
                    <a href="{{ route('content.teens') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition font-semibold border-b-2 border-blue-600 dark:border-blue-400">Remaja (13-17 tahun)</a>
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
                            Bantuan & Panduan untuk <span class="underline decoration-4 underline-offset-8">Remaja Usia 13-17 tahun</span>
                        </h1>
                        <p class="text-lg md:text-xl text-blue-50 mt-6">
                            Informasi penting tentang keamanan digital, cyberbullying, dan kesehatan mental online
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <button class="btn-help bg-white text-blue-700 px-8 py-4 rounded-lg font-semibold text-lg shadow-lg">
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
                
                <!-- Card 1: Sexual Harassment -->
                <a href="{{ route('content.sexualHarassment') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover border-2 border-red-100">
                    <div class="h-64 bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-shield-alt text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Pelecehan Seksual
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Kenali tanda-tanda pelecehan seksual baik offline maupun online. Pelajari cara melindungi diri dan batasan pribadi yang sehat.
                        </p>
                    </div>
                </a>

                <!-- Card 3: Online Bullying/Cyberbullying -->
                <a href="{{ route('content.cyberbullyingInfo') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-laptop text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Cyberbullying
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Bullying online bisa sangat menyakitkan. Pelajari cara mengenali, menghadapi, dan melaporkan cyberbullying dengan aman.
                        </p>
                    </div>
                </a>



                <!-- Card 6: Digital Footprint -->
                <a href="{{ route('content.digitalFootprint') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-fingerprint text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Jejak Digital
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Apa yang kamu posting online akan tersimpan selamanya. Pelajari cara mengelola reputasi digital dan privasi online-mu.
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
                    Jika kamu mengalami bullying, pelecehan, atau masalah online lainnya, jangan ragu untuk melaporkan atau berkonsultasi dengan kami.
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
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tips Keamanan Digital untuk Remaja</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-lock text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Gunakan Password yang Kuat</h3>
                            <p class="text-gray-600">Buat password yang unik dan sulit ditebak untuk setiap akun. Aktifkan autentikasi dua faktor.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-user-secret text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Jaga Privasi</h3>
                            <p class="text-gray-600">Pikirkan dua kali sebelum membagikan informasi pribadi atau lokasi di media sosial.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-ban text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Block & Report</h3>
                            <p class="text-gray-600">Jangan ragu untuk memblokir dan melaporkan akun yang mengganggu atau mencurigakan.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-comments text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Bicara dengan Orang Terpercaya</h3>
                            <p class="text-gray-600">Ceritakan masalahmu kepada orang tua, guru, atau konselor yang kamu percaya.</p>
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
