<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StopBullying')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        @yield('styles')
    </style>
</head>
<body class="bg-gray-50 transition-colors duration-300">
    <!-- Header with Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50 transition-colors duration-300">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">StopBullying</span>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('dashboard') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Home</a>
                    <a href="{{ route('content.children') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('content.children') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Anak (5-12 tahun)</a>
                    <a href="{{ route('content.teens') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('content.teens') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Remaja (13-17 tahun)</a>
                    <a href="{{ route('content.adults') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('content.adults') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Dewasa</a>
                    <a href="{{ route('report.create') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('report.create') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Laporkan Bullying</a>
                    <a href="{{ route('report.index') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('report.index') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Laporan Saya</a>
                    <a href="{{ route('consultation.index') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('consultation.*') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Ruang Konsultasi</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('logout') }}" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 font-medium">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    @yield('content')

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

    @yield('scripts')
</body>
</html>
