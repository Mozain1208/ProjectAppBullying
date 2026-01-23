@extends('layouts.admin')

@section('title', 'Kelola Pengguna - Admin Panel')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">Kelola Pengguna</h1>
    <p class="text-gray-500 dark:text-gray-400 mt-2">Daftar pengguna terdaftar dengan fitur manajemen keamanan dan edukasi.</p>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    </div>
@endif

<!-- Filters & Actions -->
<div class="mb-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 border border-gray-100 dark:border-gray-700">
    <form action="{{ route('admin.users') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <!-- Search -->
        <div class="md:col-span-2">
            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Cari Pengguna</label>
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Username, Email, atau NIS..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>

        <!-- Filter Status -->
        <div class="col-span-2">
            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Status Akun</label>
            <select name="status" class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <option value="all">Semua Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="warning" {{ request('status') == 'warning' ? 'selected' : '' }}>Dalam Peringatan</option>
                <option value="temp_blocked" {{ request('status') == 'temp_blocked' ? 'selected' : '' }}>Blokir Sementara</option>
                <option value="perm_blocked" {{ request('status') == 'perm_blocked' ? 'selected' : '' }}>Blokir Permanen</option>
            </select>
        </div>

        <!-- Filter Button -->
        <div class="flex items-end">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm h-[40px] flex items-center justify-center">
                <i class="fas fa-filter mr-2"></i> Terapkan Filter
            </button>
        </div>
    </form>
</div>

<!-- Users Table -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700">
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengguna</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status Akun</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 flex items-center justify-center shadow-sm">
                                    <span class="text-blue-600 dark:text-blue-400 font-bold text-sm">{{ strtoupper(substr($user->username, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800 dark:text-gray-200 group-hover:text-blue-600 transition-colors">{{ $user->username }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    <p class="text-[10px] text-gray-400 font-mono mt-0.5">NIS: {{ $user->nis }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusClasses = [
                                    'active' => 'bg-green-50 text-green-700 border-green-200',
                                    'warning' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                    'temp_blocked' => 'bg-red-50 text-red-700 border-red-200',
                                    'perm_blocked' => 'bg-gray-100 text-gray-700 border-gray-300',
                                ];
                                $statusIcons = [
                                    'active' => 'fa-check-circle',
                                    'warning' => 'fa-exclamation-triangle',
                                    'temp_blocked' => 'fa-clock',
                                    'perm_blocked' => 'fa-ban',
                                ];
                                $statusLabels = [
                                    'active' => 'Aktif',
                                    'warning' => 'Peringatan (' . $user->warning_count . ')',
                                    'temp_blocked' => 'Blokir Sementara',
                                    'perm_blocked' => 'Blokir Permanen',
                                ];
                            @endphp
                            <span class="px-3 py-1.5 rounded-lg text-xs font-semibold border flex items-center w-fit {{ $statusClasses[$user->account_status] ?? $statusClasses['active'] }}">
                                <i class="fas {{ $statusIcons[$user->account_status] ?? 'fa-check-circle' }} mr-1.5"></i>
                                {{ $statusLabels[$user->account_status] ?? 'Aktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.user.show', $user->id) }}" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all shadow-sm">
                                Manage <i class="fas fa-chevron-right ml-1.5 text-xs"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-users-slash text-gray-400 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Tidak ada pengguna ditemukan</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Coba sesuaikan filter pencarian Anda.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
