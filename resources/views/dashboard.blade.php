<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StopBullying</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 transition-colors duration-300">
    <!-- Header with Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50 transition-colors duration-300">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK Mandiri Bersemi" class="w-full h-full object-contain">
                    </div>
                    <span class="text-xl font-bold text-gray-800 dark:text-white">SMK Mandiri Bersemi Cianjur</span>
                </div>

                <!-- Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-blue-600 dark:text-blue-400 font-semibold border-b-2 border-blue-600 dark:border-blue-400">Home</a>
                    <a href="{{ route('content.children') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Anak (5-12 tahun)</a>
                    <a href="{{ route('content.teens') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Remaja (13-17 tahun)</a>
                    <a href="{{ route('content.adults') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Dewasa</a>
                    <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">
                        {{ Auth::user()->role == 'admin' ? 'Kelola Laporan' : 'Laporkan Bullying' }}
                    </a>
                    <a href="{{ route('report.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Laporan Saya</a>
                    <a href="{{ route('consultation.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Ruang Konsultasi</a>
                    @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Analisis Data</a>
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
    <section class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Tahukah Kamu<br>Apa Itu Bullying?
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Bullying adalah tindakan agresif yang dilakukan secara berulang terhadap seseorang yang lebih lemah atau tidak berdaya.
                </p>
                <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                    Laporkan Sekarang
                </a>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-xl aspect-[4/3] flex items-center justify-center">
                <img src="{{ asset('images/learning_susi.jpg') }}" alt="Learning Susi" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <!-- Information Cards -->
    <section class="container mx-auto px-4 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1: Apa itu Bullying -->
            <a href="{{ route('content.whatIsBullying') }}" class="block bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 hover:-translate-y-1">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/apa-itu-bullying.jpg') }}" alt="Apa itu Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Apa itu Bullying?</h3>
                    <p class="text-gray-600 mb-4">Bullying adalah perilaku agresif yang tidak diinginkan di kalangan anak usia sekolah yang melibatkan ketidakseimbangan kekuatan yang nyata atau yang dirasakan. Perilaku ini diulang-ulang, atau berpotensi untuk diulang, seiring berjalannya waktu.</p>
                </div>
            </a>

            <!-- Card 2: Jenis Bullying -->
            <a href="{{ route('content.typesOfBullying') }}" class="block bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 hover:-translate-y-1">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/jenis-bullying.jpg') }}" alt="Jenis Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jenis Bullying</h3>
                    <p class="text-gray-600 mb-4">Terdapat empat jenis utama bullying: Bullying Verbal (kata-kata kasar), Bullying Sosial (merusak reputasi), Bullying Fisik (menyakiti tubuh), dan Cyberbullying (perundungan di dunia maya).</p>
                </div>
            </a>

            <!-- Card 3: Dampak Bullying -->
            <a href="{{ route('content.impactOfBullying') }}" class="block bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 hover:-translate-y-1">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/dampak-bullying.jpg') }}" alt="Dampak Bullying" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Dampak Bullying</h3>
                    <p class="text-gray-600 mb-4">Dampak bullying bisa sangat serius dan bertahan lama, meliputi masalah kesehatan mental, penurunan prestasi akademik, hingga risiko menyakiti diri sendiri.</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Pojok Ilmu Section -->
    <section class="bg-white py-16 mt-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-4">Pojok Ilmu</h2>
            <p class="text-center text-gray-600 mb-12">Temukan berbagai ilmu dan pengetahuan tentang bullying dari berbagai aspek ilmiah</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <a href="{{ route('content.scienceBiology') }}" class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl p-6 text-center hover:from-blue-600 hover:to-blue-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <div class="text-4xl mb-3">🧬</div>
                    <h3 class="text-xl font-bold">Biologi</h3>
                </a>

                <a href="{{ route('content.sciencePsychology') }}" class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-xl p-6 text-center hover:from-purple-600 hover:to-purple-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <div class="text-4xl mb-3">🧠</div>
                    <h3 class="text-xl font-bold">Psikologi</h3>
                </a>

                <a href="{{ route('content.scienceSocial') }}" class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl p-6 text-center hover:from-green-600 hover:to-green-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <div class="text-4xl mb-3">👥</div>
                    <h3 class="text-xl font-bold">Sosial</h3>
                </a>

                <a href="{{ route('content.scienceSpiritual') }}" class="bg-gradient-to-br from-amber-500 to-amber-600 text-white rounded-xl p-6 text-center hover:from-amber-600 hover:to-amber-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <div class="text-4xl mb-3">✨</div>
                    <h3 class="text-xl font-bold">Spiritual</h3>
                </a>
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
