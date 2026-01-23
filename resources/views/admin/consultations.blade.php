@extends('layouts.admin')

@section('title', 'Kelola Konsultasi - Admin Panel')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Kelola Konsultasi</h1>
    <p class="text-gray-500 dark:text-gray-400">Daftar semua permintaan konsultasi dari pengguna.</p>
</div>

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700">
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengirim</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pesan</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($consultations as $consultation)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                    <i class="fas {{ $consultation->anonymous ? 'fa-user-secret text-purple-600' : 'fa-user text-purple-600' }}"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ $consultation->anonymous ? 'Anonim' : ($consultation->user->username ?? 'User') }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 max-w-md">
                                {{ Str::limit($consultation->message, 100) }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $consultation->created_at->format('d M Y, H:i') }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('consultation.show', $consultation->id) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                                Balas / Lihat Chat
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            Belum ada konsultasi masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($consultations->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
            {{ $consultations->links() }}
        </div>
    @endif
</div>
@endsection
