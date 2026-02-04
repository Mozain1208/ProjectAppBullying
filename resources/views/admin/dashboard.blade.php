@extends('layouts.admin')

@section('title', 'Dashboard Overview - Admin Panel')

@section('content')
<div class="flex justify-between items-end mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard Overview</h1>
        <p class="text-gray-500 dark:text-gray-400">{{ now()->format('l, d F Y') }}</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Laporan -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 flex justify-between items-center border border-gray-100 dark:border-gray-700">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Laporan</p>
            <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-1">{{ $stats['total_reports'] }}</h3>
        </div>
        <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
            <i class="fas fa-file-alt text-blue-600 dark:text-blue-400 text-xl"></i>
        </div>
    </div>

    <!-- Laporan Pending -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 flex justify-between items-center border border-gray-100 dark:border-gray-700">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Laporan Pending</p>
            <h3 class="text-3xl font-bold text-orange-500 mt-1">{{ $stats['pending_reports'] }}</h3>
        </div>
        <div class="w-12 h-12 bg-orange-50 dark:bg-orange-900/30 rounded-xl flex items-center justify-center">
            <i class="fas fa-clock text-orange-500 text-xl"></i>
        </div>
    </div>

    <!-- Total Pengguna -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 flex justify-between items-center border border-gray-100 dark:border-gray-700">
        <div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pengguna</p>
            <h3 class="text-3xl font-bold text-green-500 mt-1">{{ $stats['total_users'] }}</h3>
        </div>
        <div class="w-12 h-12 bg-green-50 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
            <i class="fas fa-users text-green-500 text-xl"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Chart: Tren Laporan -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6">Tren Laporan Bulanan</h3>
        <div class="h-64">
            <canvas id="reportsTrendChart"></canvas>
        </div>
    </div>

    <!-- Chart: Jenis Bullying -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-6">Jenis Bullying</h3>
        <div class="h-64 flex justify-center">
            <canvas id="bullyingTypesChart"></canvas>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Reports -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-50 dark:border-gray-700 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Laporan Terbaru</h3>
            <a href="{{ route('admin.reports') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50 dark:divide-gray-700 text-sm">
            @forelse($recent_reports as $report)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-white">{{ Str::limit($report->description, 60) }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $report->created_at->diffForHumans() }} • {{ $report->location }}</p>
                        </div>
                        <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider
                            @if($report->status == 'pending') bg-orange-100 text-orange-600
                            @elseif($report->status == 'process') bg-blue-100 text-blue-600
                            @else bg-green-100 text-green-600 @endif">
                            {{ $report->status }}
                        </span>
                    </div>
                </div>
            @empty
                <p class="p-6 text-center text-gray-500">Belum ada laporan.</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Consultations -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-50 dark:border-gray-700 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Konsultasi Terbaru</h3>
            <a href="{{ route('admin.consultations') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50 dark:divide-gray-700 text-sm">
            @forelse($recent_consultations as $consultation)
                <a href="{{ route('consultation.show', $consultation->id) }}" class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-full bg-purple-50 dark:bg-purple-900/30 flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $consultation->anonymous ? 'fa-user-secret' : 'fa-user' }} text-purple-600 text-xs"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-white">
                                {{ $consultation->anonymous ? 'Anonim' : ($consultation->user->username ?? 'User') }}
                            </p>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">{{ Str::limit($consultation->message, 80) }}</p>
                            <p class="text-[10px] text-gray-400 mt-1 uppercase">{{ $consultation->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="p-6 text-center text-gray-500">Belum ada konsultasi.</p>
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tren Laporan Chart
        new Chart(document.getElementById('reportsTrendChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Laporan',
                    data: {!! json_encode($trend_data) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Jenis Bullying Chart (Doughnut)
        new Chart(document.getElementById('bullyingTypesChart'), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($bullying_types_stats)) !!}.map(function(label) {
                    return label.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                }),
                datasets: [{
                    data: {!! json_encode(array_values($bullying_types_stats)) !!},
                    backgroundColor: ['#ef4444', '#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899', '#64748b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { position: 'right', labels: { usePointStyle: true, padding: 20 } }
                }
            }
        });
    });
</script>
@endsection
