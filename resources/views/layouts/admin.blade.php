<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - StopBullying')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); overflow-x: hidden; }
        .sidebar-collapsed { width: 0 !important; transform: translateX(-100%); }
        .sidebar-text, .sidebar-section-title, .sidebar-header-text { 
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
        }
        @media (min-width: 1024px) {
            .sidebar-collapsed { transform: translateX(-100%); }
            .sidebar-collapsed .sidebar-text { visibility: hidden; opacity: 0; }
            .main-content-collapsed { margin-left: 0 !important; }
        }
        #mainContent { margin-left: 16rem; } /* Default w-64 is 16rem */
        @media (max-width: 1023px) {
            #mainContent { margin-left: 0; }
        }
        /* Fix for 14" laptops zoom issue */
        @media (max-width: 1536px) {
            html { font-size: 14px; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="adminSidebar" class="sidebar w-64 bg-white shadow-xl fixed h-full z-40 transition-all duration-300 overflow-y-auto border-r border-gray-100">
            <div class="p-4 border-b border-gray-100 h-16 flex items-center overflow-hidden">
                <div class="flex items-center space-x-3 min-w-max">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                        <img src="{{ asset('images/logo-smk.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="sidebar-header-text">
                        <h1 class="text-sm font-bold text-gray-800 truncate" style="max-width: 140px;">{{ $site_settings['school_name'] ?? 'AdminPanel' }}</h1>
                        <p class="text-[10px] text-gray-500">Anti Bullying System</p>
                    </div>
                </div>
            </div>

            <nav class="p-3 space-y-6">
                <!-- Menu Utama -->
                <div>
                    <h3 class="sidebar-section-title px-4 text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-3">Menu Utama</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-gray-50' }}" title="Ringkasan">
                                <i class="fas fa-th-large w-5 text-center"></i>
                                <span class="sidebar-text ml-3 font-medium text-sm">Ringkasan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.reports') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-gray-50' }}" title="Kelola Laporan">
                                <i class="fas fa-file-alt w-5 text-center"></i>
                                <span class="sidebar-text ml-3 font-medium text-sm">Kelola Laporan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.consultations') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.consultations') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-gray-50' }}" title="Kelola Konsultasi">
                                <i class="fas fa-comments w-5 text-center"></i>
                                <span class="sidebar-text ml-3 font-medium text-sm">Kelola Konsultasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.users') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-gray-50' }}" title="Kelola Pengguna">
                                <i class="fas fa-users w-5 text-center"></i>
                                <span class="sidebar-text ml-3 font-medium text-sm">Kelola Pengguna</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sistem -->
                <div>
                    <h3 class="sidebar-section-title px-4 text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-3">Sistem</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.audit-logs') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.audit-logs') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-gray-50' }}" title="Audit Log">
                                <i class="fas fa-history w-5 text-center"></i>
                                <span class="sidebar-text ml-3 font-medium text-sm">Audit Log</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.settings') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-gray-600 hover:bg-gray-50' }}" title="Pengaturan">
                                <i class="fas fa-cog w-5 text-center"></i>
                                <span class="sidebar-text ml-3 font-medium text-sm">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Footer -->
                <div class="pt-4 border-t border-gray-100">
                    <a href="{{ route('logout') }}" class="sidebar-item flex items-center px-4 py-2.5 rounded-xl transition-all text-red-600 hover:bg-red-50" title="Keluar">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        <span class="sidebar-text ml-3 font-medium text-sm">Logout</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div id="mainContent" class="flex-1 transition-all duration-300 min-h-screen flex flex-col">
            <!-- Top Navbar -->
            <header class="h-16 bg-white border-b border-gray-100 sticky top-0 z-30 flex items-center justify-between px-4 lg:px-8">
                <div class="flex items-center space-x-4">
                    <button onclick="toggleSidebar()" class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 transition focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800 hidden sm:block">Panel Guru</h2>
                </div>

                <div class="flex items-center space-x-2">
                    <div class="h-8 w-px bg-gray-200 mx-2"></div>
                    <div class="flex items-center space-x-3">
                        <div class="text-right hidden md:block">
                            <p class="text-xs font-bold text-gray-800">{{ Auth::user()->username }}</p>
                            <p class="text-[10px] text-gray-500 uppercase tracking-tighter">Administrator</p>
                        </div>
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center border-2 border-white shadow-sm">
                            <i class="fas fa-user-tie text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4 lg:p-8 flex-1">
                @yield('content')
            </main>

            <!-- Admin Footer -->
            <footer class="p-6 text-center text-xs text-gray-500 bg-white border-t border-gray-100">
                &copy; 2024 {{ $site_settings['school_name'] ?? 'SMK Mandiri Bersemi' }} - Admin Panel
            </footer>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const mainContent = document.getElementById('mainContent');
            const isMobile = window.innerWidth < 1024;

            if (isMobile) {
                sidebar.classList.toggle('sidebar-collapsed');
            } else {
                sidebar.classList.toggle('sidebar-collapsed');
                mainContent.classList.toggle('main-content-collapsed');
                localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('sidebar-collapsed'));
            }
        }

        // Initialize sidebar state
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('adminSidebar');
            const mainContent = document.getElementById('mainContent');
            const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
            const isMobile = window.innerWidth < 1024;

            if (isCollapsed && !isMobile) {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-content-collapsed');
            } else if (isMobile) {
                sidebar.classList.add('sidebar-collapsed');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
