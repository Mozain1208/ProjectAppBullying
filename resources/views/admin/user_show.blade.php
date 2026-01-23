@extends('layouts.admin')

@section('title', 'Detail Pengguna - Admin Panel')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <nav class="flex mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <i class="fas fa-home mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('admin.users') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">Pengguna</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Detail</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <span class="mr-2">{{ $user->username }}</span>
            @if($user->account_status == 'active')
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-green-400">Aktif</span>
            @elseif($user->account_status == 'warning')
                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-yellow-400">Peringatan</span>
            @elseif($user->account_status == 'temp_blocked')
                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-red-400">Blokir Sementara</span>
            @else
                <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-gray-400">Blokir Permanen</span>
            @endif
        </h1>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    </div>
@endif

@if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg shadow-sm">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column: Profile & Stats -->
    <div class="space-y-6">
        <!-- User Profile Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-700">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-24"></div>
            <div class="px-6 pb-6 relative">
                <div class="absolute -top-12 left-6">
                    <div class="w-24 h-24 rounded-xl bg-white p-1 shadow-md">
                        <div class="w-full h-full rounded-lg bg-blue-100 flex items-center justify-center text-3xl font-bold text-blue-600">
                            {{ strtoupper(substr($user->username, 0, 1)) }}
                        </div>
                    </div>
                </div>
                <div class="mt-14">
                    <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                        <div>
                            <span class="block text-gray-500 text-xs uppercase">NIS</span>
                            <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $user->nis }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs uppercase">Umur</span>
                            <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $user->age ?? '??' }} Tahun</span>
                        </div>
                        <div class="col-span-2">
                            <span class="block text-gray-500 text-xs uppercase">Email</span>
                            <span class="font-semibold text-gray-700 dark:text-gray-300 text-xs break-all">{{ $user->email }}</span>
                        </div>
                        <div class="col-span-2">
                            <span class="block text-gray-500 text-xs uppercase">Bergabung</span>
                            <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $user->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($user->banned_until)
        <div class="p-4 bg-red-50 rounded-xl border border-red-100 dark:bg-red-900/10 dark:border-red-800">
            <div class="flex items-center mb-2">
                <i class="fas fa-clock text-red-500 mr-2"></i>
                <h3 class="font-bold text-red-700 dark:text-red-400">Status Pemblokiran</h3>
            </div>
            <p class="text-sm text-red-600 dark:text-red-300">
                Pengguna ini sedang diblokir sementara hingga <span class="font-bold">{{ $user->banned_until->format('d F Y, H:i') }}</span>.
            </p>
            <p class="text-xs text-red-500 mt-1 italic">({{ $user->banned_until->diffForHumans() }})</p>
        </div>
        @endif

        <!-- Management Actions -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <h3 class="font-bold text-gray-800 dark:text-white mb-4 flex items-center">
                <i class="fas fa-gavel text-gray-700 dark:text-gray-300 mr-2"></i> Tindakan Admin
            </h3>
            
            <form action="{{ route('admin.user.action', $user->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Aksi</label>
                    <select name="action" id="actionSelect" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm p-2.5" onchange="handleActionChange()">
                        <option value="warning">Kirim Peringatan (Warning)</option>
                        <option value="temp_block">Blokir Sementara</option>
                        <option value="perm_block">Blokir Permanen</option>
                        <option value="restrict">Batasi Fitur Tertentu</option>
                        <option value="restore">Pulihkan Akun (Normal)</option>
                    </select>
                </div>

                <div id="durationFields" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Durasi (Hari)</label>
                    <input type="number" name="duration" min="1" value="3" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-2.5">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alasan / Catatan</label>
                    <textarea name="reason" rows="3" required placeholder="Jelaskan alasan tindakan ini..." class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm p-2.5 text-sm"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg shadow-md transition-all text-sm flex justify-center items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Tindakan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Column: Activity & History -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Activity Statistics -->
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100 flex items-center">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-file-alt text-indigo-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-indigo-900 font-medium">Total Laporan</p>
                    <p class="text-2xl font-bold text-indigo-700">{{ $user->reports()->count() }}</p>
                </div>
            </div>
            <div class="bg-teal-50 p-4 rounded-xl border border-teal-100 flex items-center">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-comments text-teal-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-teal-900 font-medium">Konsultasi</p>
                    <p class="text-2xl font-bold text-teal-700">{{ $user->consultations()->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Latest Reports -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">Riwayat Laporan Terakhir</h3>
            </div>
            <div class="p-6">
                @if($user->reports->count() > 0)
                    <div class="space-y-4">
                        @foreach($user->reports->take(5) as $report)
                            <div class="flex items-start p-3 bg-gray-50 rounded-lg border border-gray-100">
                                <div class="flex-shrink-0 mt-1">
                                    <span class="w-2 h-2 rounded-full block {{ $report->status == 'resolved' ? 'bg-green-500' : ($report->status == 'process' ? 'bg-blue-500' : 'bg-yellow-500') }}"></span>
                                </div>
                                <div class="ml-3 w-full">
                                    <div class="flex justify-between">
                                        <p class="text-sm font-semibold text-gray-800">Laporan #{{ $report->id }}</p>
                                        <span class="text-xs text-gray-500">{{ $report->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-xs text-gray-600 mt-1 line-clamp-1">{{ $report->description }}</p>
                                    <div class="mt-2 flex items-center space-x-2">
                                        <span class="text-[10px] px-2 py-0.5 rounded bg-white border border-gray-200 text-gray-600 uppercase">{{ $report->status }}</span>
                                        <span class="text-[10px] px-2 py-0.5 rounded bg-white border border-gray-200 text-gray-600 capitalize">{{ $report->bullying_type }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 text-center py-4">Belum ada laporan yang dibuat.</p>
                @endif
            </div>
        </div>

        <!-- Audit Logs / Admin Notes System -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">Audit Log & Catatan Admin</h3>
            </div>
            <div class="p-6">
                @if($logs->count() > 0)
                    <div class="relative border-l-2 border-gray-200 dark:border-gray-700 ml-3 space-y-6">
                        @foreach($logs as $log)
                            <div class="mb-4 ml-6 relative">
                                <span class="absolute -left-[31px] rounded-full w-4 h-4 bg-blue-500 border-4 border-white dark:border-gray-800"></span>
                                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-1">
                                    <h4 class="text-sm font-bold text-gray-800 dark:text-white">{{ $log->action }}</h4>
                                    <span class="text-xs text-gray-500">{{ $log->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-900/50 p-3 rounded-lg border border-gray-100 dark:border-gray-700 text-sm">
                                    <p class="text-gray-700 dark:text-gray-300 font-medium italic">"{{ $log->details['reason'] ?? 'No reason provided' }}"</p>
                                    @if(isset($log->details['duration_days']))
                                        <p class="text-xs text-gray-500 mt-1">Durasi: {{ $log->details['duration_days'] }} hari</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500 text-center py-4">Belum ada catatan aktivitas admin untuk pengguna ini.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function handleActionChange() {
        const action = document.getElementById('actionSelect').value;
        const durationFields = document.getElementById('durationFields');
        
        if (action === 'temp_block') {
            durationFields.classList.remove('hidden');
        } else {
            durationFields.classList.add('hidden');
        }
    }
</script>
@endsection
