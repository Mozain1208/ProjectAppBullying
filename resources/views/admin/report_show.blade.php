@extends('layouts.admin')

@section('title', 'Detail Laporan - Admin Panel')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <a href="{{ route('admin.reports') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold mb-2 inline-block">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Laporan
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Detail Laporan #{{ $report->id }}</h1>
    </div>
    <div class="flex items-center space-x-3">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
            @if($report->status == 'pending') bg-orange-100 text-orange-600
            @elseif($report->status == 'process') bg-blue-100 text-blue-600
            @else bg-green-100 text-green-600 @endif">
            {{ $report->status }}
        </span>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-8">
    <!-- Main Report Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Chronology Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-file-alt text-blue-600 mr-2"></i>
                Kronologi Kejadian
            </h2>
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 leading-relaxed whitespace-pre-wrap font-medium">
                {{ $report->description }}
            </div>
            
            <div class="grid md:grid-cols-3 gap-4 mt-6">
                <div class="bg-blue-50 p-3 rounded-lg">
                    <p class="text-xs text-blue-600 font-bold uppercase mb-1">Jenis Bullying</p>
                    <p class="text-sm font-semibold text-gray-800 capitalize">{{ $report->bullying_type }}</p>
                </div>
                <div class="bg-blue-50 p-3 rounded-lg">
                    <p class="text-xs text-blue-600 font-bold uppercase mb-1">Lokasi</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $report->location }}</p>
                </div>
                <div class="bg-blue-50 p-3 rounded-lg">
                    <p class="text-xs text-blue-600 font-bold uppercase mb-1">Waktu Kejadian</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ \Carbon\Carbon::parse($report->incident_time)->locale('id')->translatedFormat('d F Y') }}, {{ \Carbon\Carbon::parse($report->incident_time)->format('H:i') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Evidence Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-images text-green-600 mr-2"></i>
                Bukti Lampiran
            </h2>
            
            @if($report->evidences->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($report->evidences as $evidence)
                        <div class="group relative aspect-square bg-gray-100 rounded-lg overflow-hidden border border-gray-200">
                            @if(Str::contains($evidence->file_type, 'image'))
                                <img src="{{ asset('storage/' . $evidence->file_path) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fas fa-file-alt text-4xl text-gray-400"></i>
                                </div>
                            @endif
                            <a href="{{ asset('storage/' . $evidence->file_path) }}" target="_blank" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-bold">
                                <i class="fas fa-expand mr-1"></i> LIHAT
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic">Tidak ada bukti yang dilampirkan.</p>
            @endif
        </div>

        <!-- Timeline/Handling History -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-history text-orange-600 mr-2"></i>
                Riwayat Penanganan
            </h2>
            
            <div class="relative border-l-2 border-gray-200 ml-3 space-y-6">
                @forelse($report->handlings as $handling)
                    <div class="mb-8 ml-6 relative">
                        <!-- Dot -->
                        <span class="absolute -left-[33px] flex h-4 w-4 items-center justify-center rounded-full bg-white ring-4 ring-white {{ $handling->status == 'resolved' ? 'bg-green-500' : ($handling->status == 'process' ? 'bg-blue-500' : 'bg-orange-500') }}">
                        </span>
                        
                        <div class="flex items-center justify-between mb-1">
                            <h3 class="font-bold text-gray-900 capitalize text-sm">
                                Status: {{ $handling->status }}
                            </h3>
                            <time class="text-xs text-gray-400 font-medium">
                                {{ $handling->created_at->format('d M Y, H:i') }}
                            </time>
                        </div>
                        
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100 text-sm text-gray-600">
                            <p class="mb-2">{{ $handling->note ?? 'Tidak ada catatan.' }}</p>
                            <div class="flex items-center text-xs text-gray-400 mt-2 border-t border-gray-200 pt-2">
                                <i class="fas fa-user-shield mr-1"></i>
                                <span>Oleh: {{ $handling->admin->username ?? 'Admin' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ml-6">
                        <p class="text-gray-500 text-sm italic">Belum ada riwayat penanganan.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Chat Section (Two-Way Communication) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50">
                <h2 class="text-lg font-bold text-gray-800 flex items-center">
                    <i class="fas fa-comments text-purple-600 mr-2"></i>
                    Komunikasi Dua Arah (Anonim)
                </h2>
                <p class="text-sm text-gray-500 mt-1">Gunakan fitur ini untuk berkomunikasi dengan pelapor secara rahasia.</p>
            </div>
            
            <div class="p-6 bg-gray-50/50 max-h-[400px] overflow-y-auto space-y-4">
                @forelse($report->messages as $message)
                    <div class="flex {{ $message->user_id == Auth::id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[80%] rounded-2xl p-4 {{ $message->user_id == Auth::id() ? 'bg-blue-600 text-white' : 'bg-white border border-gray-100' }}">
                            @if($message->user_id != Auth::id())
                                <p class="text-[10px] font-bold uppercase mb-1 {{ $message->user_id == Auth::id() ? 'text-blue-100' : 'text-gray-400' }}">
                                    Pelapor
                                </p>
                            @endif
                            <p class="text-sm">{{ $message->message }}</p>
                            <p class="text-[9px] mt-1 opacity-70 {{ $message->user_id == Auth::id() ? 'text-right' : '' }}">
                                {{ $message->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <i class="fas fa-comment-slash text-3xl text-gray-300 mb-2"></i>
                        <p class="text-gray-500 text-sm">Belum ada percakapan.</p>
                    </div>
                @endforelse
            </div>

            <div class="p-4 border-t border-gray-50 bg-white">
                <form action="{{ route('admin.report.message', $report->id) }}" method="POST" class="flex space-x-2">
                    @csrf
                    <input type="text" name="message" class="flex-1 bg-gray-50 border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-blue-500" placeholder="Ketik pesan tindak lanjut..." required>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar Info -->
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Informasi Pelapor</h3>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-gray-400 font-bold uppercase">Nama Tertera</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $report->reporter_name ?? 'Tidak Menyebutkan' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 font-bold uppercase">Umur & Peran</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $report->reporter_age ?? '??' }} Tahun • <span class="capitalize">{{ $report->reporter_role }}</span>
                    </p>
                </div>
                <div class="pt-2 border-t border-gray-50">
                    <p class="text-xs text-gray-400 font-bold uppercase">Metode Lapor</p>
                    <p class="text-sm font-semibold text-gray-800">
                        @if($report->anonymous)
                            <span class="text-purple-600"><i class="fas fa-user-secret mr-1"></i>Anonim</span>
                        @else
                            <span class="text-blue-600"><i class="fas fa-user mr-1"></i>Terbuka ({{ $report->user->username ?? 'User' }})</span>
                        @endif
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 font-bold uppercase">Tanggal Lapor</p>
                    <p class="text-sm font-semibold text-gray-800">{{ \Carbon\Carbon::parse($report->created_at)->locale('id')->translatedFormat('d F Y') }}, {{ $report->created_at->format('H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Update Penanganan</h3>
            <form action="{{ route('admin.report.handling.store', $report->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Status Terbaru</label>
                    <select name="status" class="w-full border-gray-200 rounded-lg text-sm bg-gray-50 focus:ring-blue-500">
                        <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="process" {{ $report->status == 'process' ? 'selected' : '' }}>Dalam Proses</option>
                        <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Catatan Penanganan</label>
                    <textarea name="note" rows="4" class="w-full border-gray-200 rounded-lg text-sm bg-gray-50 focus:ring-blue-500" placeholder="Tulis catatan proses penanganan report ini..." required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-bold text-sm hover:bg-blue-700 transition shadow-sm flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i> Simpan Progress
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
