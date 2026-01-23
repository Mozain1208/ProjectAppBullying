<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - StopBullying')</title>
    <script>
        // Check for theme preference immediately
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        // You can add custom colors here if needed
                    }
                }
            }
        }
    </script>
    <script src="{{ asset('js/toggle-theme.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg fixed h-full z-20 transition-colors duration-300 overflow-y-auto">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white text-sm"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800 dark:text-white">{{ $site_settings['school_name'] ?? 'AdminPanel' }}</h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Anti Bullying System</p>
                    </div>
                </div>
            </div>

            <nav class="p-4 space-y-8">
                <!-- Menu Utama -->
                <div>
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Menu Utama</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:hover:bg-gray-700/50' }}">
                                <i class="fas fa-th-large w-5"></i>
                                <span class="font-medium">Ringkasan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.reports') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:hover:bg-gray-700/50' }}">
                                <i class="fas fa-file-alt w-5"></i>
                                <span class="font-medium">Kelola Laporan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.consultations') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.consultations') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:hover:bg-gray-700/50' }}">
                                <i class="fas fa-comments w-5"></i>
                                <span class="font-medium">Kelola Konsultasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.users') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:hover:bg-gray-700/50' }}">
                                <i class="fas fa-users w-5"></i>
                                <span class="font-medium">Kelola Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sistem -->
                <div>
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Sistem</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.audit-logs') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.audit-logs') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:hover:bg-gray-700/50' }}">
                                <i class="fas fa-history w-5"></i>
                                <span class="font-medium">Audit Log</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.settings') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:hover:bg-gray-700/50' }}">
                                <i class="fas fa-cog w-5"></i>
                                <span class="font-medium">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Lainnya -->
                <div>
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Lainnya</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('logout') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                <span class="font-medium">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 min-h-screen transition-all duration-300">
            <!-- Topbar (Optional, just for theme toggle and profile if needed, matching image simple float) -->
            <div class="p-8">
                <!-- Theme Toggle Floating -->
                <div class="absolute top-8 right-8 z-10">
                    <button onclick="toggleTheme()" class="p-2 rounded-full bg-white dark:bg-gray-800 shadow-lg text-gray-600 dark:text-yellow-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition focus:outline-none">
                        <i class="fas fa-moon theme-toggle-icon text-xl"></i>
                    </button>
                </div>

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
