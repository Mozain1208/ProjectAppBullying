@extends('layouts.admin')

@section('title', 'Kelola Laporan - Admin Panel')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Kelola Laporan</h1>
    <p class="text-gray-500 dark:text-gray-400">Tinjau dan tindak lanjuti laporan perundungan yang masuk.</p>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-700">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700">
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pelapor</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Deskripsi Kejadian</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($reports as $report)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4 text-sm">
                            <span class="font-medium text-gray-700 dark:text-gray-300">
                                {{ $report->anonymous ? 'Anonim' : ($report->user->username ?? 'User') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 max-w-xs truncate">
                                {{ $report->description }}
                            </p>
                            <span class="text-[10px] text-gray-400 uppercase">{{ $report->location }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                @if($report->status == 'pending') bg-orange-100 text-orange-600
                                @elseif($report->status == 'process') bg-blue-100 text-blue-600
                                @else bg-green-100 text-green-600 @endif">
                                {{ $report->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($report->created_at)->locale('id')->translatedFormat('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.report.show', $report->id) }}" class="inline-block text-blue-600 hover:text-blue-800 text-xs font-semibold mr-2">
                                <i class="fas fa-eye mr-1"></i>Detail
                            </a>
                            <form action="{{ route('admin.report.status', $report->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select onchange="this.form.submit()" name="status" class="text-xs border-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-lg focus:ring-blue-500">
                                    <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="process" {{ $report->status == 'process' ? 'selected' : '' }}>Proses</option>
                                    <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Tidak ada laporan ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($reports->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
            {{ $reports->links() }}
        </div>
    @endif
</div>
@endsection
