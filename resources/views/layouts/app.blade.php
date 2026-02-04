<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StopBullying')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Global Responsiveness for 14" laptops */
        @media (max-width: 1536px) {
            html { font-size: 15px; }
            .container { max-width: 1200px; }
        }
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.3); }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50">
    <!-- Header with Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold text-gray-800 leading-tight">SMK Mandiri Bersemi</span>
                        <span class="text-xs text-blue-600 font-semibold uppercase tracking-wider">Stop Bullying</span>
                    </div>
                </div>
                
                <!-- Navigation Menu (Desktop) -->
                <nav class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('home') || request()->routeIs('dashboard') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Home</a>
                    
                    <div class="relative group">
                        <button class="flex items-center text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('content.*') ? 'text-blue-600 font-semibold' : '' }}">
                            Konten Edukasi
                            <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform origin-top-left scale-95 group-hover:scale-100 border border-gray-100">
                             <a href="{{ route('content.children') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition group/item">
                                <div class="flex items-center relative z-10">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 bg-cover bg-center shadow-sm" style="background-image: url('{{ asset('images/anak_bg.jpg') }}')">
                                        <div class="absolute inset-0 bg-yellow-600/40 rounded-lg group-hover/item:bg-yellow-600/20 transition"></div>
                                        <i class="fas fa-child text-white text-xs relative z-10 drop-shadow-md"></i>
                                    </div>
                                    <span class="font-medium">Anak (5-12 tahun)</span>
                                </div>
                            </a>
                            <a href="{{ route('content.teens') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition group/item">
                                <div class="flex items-center relative z-10">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 bg-cover bg-center shadow-sm" style="background-image: url('{{ asset('images/remaja_bg.jpg') }}')">
                                        <div class="absolute inset-0 bg-blue-600/40 rounded-lg group-hover/item:bg-blue-600/20 transition"></div>
                                        <i class="fas fa-user-graduate text-white text-xs relative z-10 drop-shadow-md"></i>
                                    </div>
                                    <span class="font-medium">Remaja (13-17 tahun)</span>
                                </div>
                            </a>
                            <a href="{{ route('content.adults') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition group/item">
                                <div class="flex items-center relative z-10">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 bg-cover bg-center shadow-sm" style="background-image: url('{{ asset('images/dewasa_bg.jpg') }}')">
                                        <div class="absolute inset-0 bg-purple-600/40 rounded-lg group-hover/item:bg-purple-600/20 transition"></div>
                                        <i class="fas fa-user-tie text-white text-xs relative z-10 drop-shadow-md"></i>
                                    </div>
                                    <span class="font-medium">Dewasa</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('report.create') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('report.create') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Laporkan</a>
                    <a href="{{ route('report.index') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('report.index') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Laporan Saya</a>
                    <a href="{{ route('consultation.index') }}" class="text-gray-600 hover:text-blue-600 transition font-medium {{ request()->routeIs('consultation.*') ? 'text-blue-600 font-semibold border-b-2 border-blue-600' : '' }}">Konsultasi</a>
                </nav>
                
                <div class="flex items-center space-x-2">
                    <button id="mobile-menu-button" class="lg:hidden p-2 text-gray-600 hover:text-blue-600 transition focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    @auth
                        <a href="{{ route('logout') }}" class="hidden sm:block px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200 font-medium text-sm">
                            Logout
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hidden sm:block px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium text-sm">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overflow -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 shadow-lg animate-in slide-in-from-top duration-300 overflow-hidden">
            <div class="container mx-auto px-4 py-4 space-y-3 pb-8">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('home') || request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                    <i class="fas fa-house mr-3 w-5"></i>Home
                </a>
                
                <div class="space-y-1">
                    <p class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-widest">Edukasi</p>
                    <a href="{{ route('content.children') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('content.children') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                        <i class="fas fa-child mr-3 w-5"></i>Anak (5-12 tahun)
                    </a>
                    <a href="{{ route('content.teens') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('content.teens') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                        <i class="fas fa-user-graduate mr-3 w-5"></i>Remaja (13-17 tahun)
                    </a>
                    <a href="{{ route('content.adults') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('content.adults') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                        <i class="fas fa-user-tie mr-3 w-5"></i>Dewasa
                    </a>
                </div>

                <div class="space-y-1 pt-2">
                    <p class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-widest">Layanan</p>
                    <a href="{{ route('report.create') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('report.create') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                        <i class="fas fa-edit mr-3 w-5 text-orange-500"></i>Laporkan Insiden
                    </a>
                    <a href="{{ route('report.index') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('report.index') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                        <i class="fas fa-file-invoice mr-3 w-5 text-blue-500"></i>Laporan Saya
                    </a>
                    <a href="{{ route('consultation.index') }}" class="block px-4 py-3 rounded-xl text-gray-700 font-medium {{ request()->routeIs('consultation.*') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }}">
                        <i class="fas fa-comments mr-3 w-5 text-purple-500"></i>Konsultasi
                    </a>
                </div>

                <div class="pt-4 mt-4 border-t border-gray-100 flex flex-col space-y-2">
                    @auth
                        <a href="{{ route('logout') }}" class="w-full px-5 py-3 bg-red-600 text-white rounded-xl text-center font-bold shadow-md">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-full px-5 py-3 bg-blue-600 text-white rounded-xl text-center font-bold shadow-md">
                            Login ke Akun
                        </a>
                        <a href="{{ route('register') }}" class="w-full px-5 py-3 border-2 border-blue-600 text-blue-600 rounded-xl text-center font-bold">
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', function() {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        menuButton.innerHTML = '<i class="fas fa-times text-xl"></i>';
                    } else {
                        mobileMenu.classList.add('hidden');
                        menuButton.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    }
                });
            }
        });
    </script>

    <!-- Main Content -->
    <main class="min-h-[80vh]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16 border-t border-gray-800">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 items-center text-center md:text-left mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-2">SMK Mandiri Bersemi</h3>
                    <p class="text-gray-400 text-sm">Portal Pengaduan dan Edukasi Anti Bullying yang Aman, Percaya diri, dan Terlindungi.</p>
                </div>
                <div class="flex justify-center md:justify-end space-x-4">
                    @auth
                        <span class="text-gray-400 text-sm">Halo, {{ Auth::user()->username }}!</span>
                        <a href="{{ route('logout') }}" class="text-gray-400 hover:text-white transition text-sm underline">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition text-sm">Login</a>
                        <span class="text-gray-600">|</span>
                        <a href="{{ route('register') }}" class="text-gray-400 hover:text-white transition text-sm">Daftar</a>
                    @endauth
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-gray-500 text-xs">&copy; 2024 StopBullying. Seluruh Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
