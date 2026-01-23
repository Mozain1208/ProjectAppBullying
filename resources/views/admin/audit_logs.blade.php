@extends('layouts.admin')

@section('title', 'Audit Logs - Admin Panel')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Audit Log</h1>
    <p class="text-gray-500 dark:text-gray-400">Daftar rekaman aktivitas seluruh pengguna dan sistem.</p>
</div>

<!-- Search & Filter -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4 mb-6 border border-gray-100 dark:border-gray-700">
    <form action="{{ route('admin.audit-logs') }}" method="GET" class="flex items-center">
        <div class="relative flex-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari aktivitas, detail, atau username...">
        </div>
        <button type="submit" class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Filter
        </button>
        @if(request('search'))
            <a href="{{ route('admin.audit-logs') }}" class="ml-2 text-sm text-gray-500 hover:text-gray-700">Reset</a>
        @endif
    </form>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-700">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700">
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider uppercase">Waktu</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider uppercase">Pelaku</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider uppercase">Aktivitas</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider uppercase">Target/User</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider uppercase">Detail</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider uppercase">IP Address</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($logs as $log)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $log->created_at->format('d/m/Y H:i:s') }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($log->performer)
                                <div class="flex items-center">
                                    <div class="w-7 h-7 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                                        <i class="fas fa-user-shield text-[10px] text-blue-600"></i>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $log->performer->username }}</span>
                                </div>
                            @else
                                <span class="text-sm text-gray-400 italic">Sistem</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                {{ $log->action }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($log->user)
                                <span class="text-sm text-gray-600 dark:text-gray-400">{{ $log->user->username }}</span>
                            @else
                                <span class="text-sm text-gray-400 italic">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 max-w-xs overflow-hidden text-ellipsis">
                                @if(is_array($log->details))
                                    @foreach($log->details as $key => $val)
                                        <span class="font-semibold">{{ $key }}:</span> {{ is_array($val) ? json_encode($val) : $val }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                @else
                                    {{ $log->details }}
                                @endif
                            </p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-xs font-mono text-gray-400">{{ $log->ip_address }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            Belum ada rekaman aktivitas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($logs->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
            {{ $logs->appends(request()->input())->links() }}
        </div>
    @endif
</div>
@endsection
