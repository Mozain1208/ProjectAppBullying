<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan untuk Orang Tua & Dewasa - StopBullying</title>
    <meta name="description" content="Panduan untuk orang tua dan dewasa dalam melindungi anak dari bahaya online">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%);
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
                    <a href="{{ route('content.teens') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition font-medium">Remaja (13-17 tahun)</a>
                    <a href="{{ route('content.adults') }}" class="text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 transition font-semibold border-b-2 border-purple-600 dark:border-purple-400">Dewasa</a>
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
                            Panduan untuk <span class="underline decoration-4 underline-offset-8">Orang Tua & Dewasa</span>
                        </h1>
                        <p class="text-lg md:text-xl text-purple-50 mt-6">
                            Pelajari cara melindungi anak-anak dari bahaya online dan membangun komunikasi yang sehat tentang keamanan digital
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <button class="btn-help bg-white text-purple-700 px-8 py-4 rounded-lg font-semibold text-lg shadow-lg">
                            Dapatkan Panduan
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
                
                <!-- Card 1: Deteksi Dini Bullying -->
                <a href="{{ route('content.earlyDetection') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-purple-600 to-indigo-700 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-search-plus text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Deteksi Dini Bullying
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Pelajari tanda-tanda perubahan perilaku yang mungkin menunjukkan anak Anda menjadi korban atau pelaku bullying.
                        </p>
                    </div>
                </a>

                <!-- Card 2: Mitos dan Fakta Bullying -->
                <a href="{{ route('content.mythsAndFacts') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-teal-500 to-emerald-600 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-clipboard-check text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Mitos dan Fakta Bullying
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Luruskan kesalahpahaman umum tentang bullying agar Anda dapat mengambil tindakan yang tepat dan efektif.
                        </p>
                    </div>
                </a>

                <!-- Card 3: Aturan dan Perlindungan Hukum -->
                <a href="{{ route('content.legalProtection') }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-64 bg-gradient-to-br from-red-600 to-rose-700 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                        <i class="fas fa-gavel text-white text-8xl opacity-80 relative z-10"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Aturan dan Perlindungan Hukum
                        </h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Pahami undang-undang dan peraturan sekolah terkait bullying untuk melindungi hak-hak anak Anda.
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- Additional Resources Section -->
    <section class="bg-gradient-to-br from-purple-50 to-indigo-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Butuh Bantuan atau Konsultasi?
                </h2>
                <p class="text-lg text-gray-600 mb-8">
                    Jika anak Anda mengalami masalah online atau Anda membutuhkan panduan lebih lanjut, kami siap membantu.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ Auth::user()->role == 'admin' ? route('admin.reports') : route('report.create') }}" class="px-8 py-4 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Laporkan Kasus
                    </a>
                    <a href="{{ route('consultation.index') }}" class="px-8 py-4 bg-white text-purple-600 border-2 border-purple-600 rounded-xl hover:bg-purple-50 transition duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Konsultasi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tips untuk Orang Tua</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-purple-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Bangun Komunikasi Terbuka</h3>
                            <p class="text-gray-600">Ciptakan lingkungan di mana anak merasa nyaman berbagi pengalaman online mereka tanpa takut dihakimi.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-book-reader text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Tetap Update</h3>
                            <p class="text-gray-600">Pelajari platform dan aplikasi yang digunakan anak Anda agar bisa memberikan panduan yang relevan.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-green-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-handshake text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Buat Aturan Bersama</h3>
                            <p class="text-gray-600">Libatkan anak dalam membuat aturan penggunaan internet agar mereka lebih bertanggung jawab.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="bg-red-100 rounded-full p-3 flex-shrink-0">
                            <i class="fas fa-heart text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Jadilah Role Model</h3>
                            <p class="text-gray-600">Tunjukkan perilaku digital yang sehat dengan membatasi screen time Anda sendiri.</p>
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
