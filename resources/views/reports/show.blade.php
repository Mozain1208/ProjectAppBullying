@extends('layouts.app')

@section('title', 'Detail Laporan - StopBullying')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <a href="{{ route('report.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold mb-2 inline-block">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Laporan Saya
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Detail Laporan #{{ $report->id }}</h1>
        </div>
        <div>
            <span class="px-4 py-1.5 rounded-full text-sm font-bold uppercase tracking-wider
                @if($report->status == 'pending') bg-orange-100 text-orange-600
                @elseif($report->status == 'process') bg-blue-100 text-blue-600
                @else bg-green-100 text-green-600 @endif">
                {{ $report->status }}
            </span>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-file-alt text-blue-600 mr-2"></i>
                    Isi Laporan
                </h2>
                
                <div class="bg-gray-50 rounded-xl p-6 text-gray-700 leading-relaxed whitespace-pre-wrap font-medium mb-8">
                    {{ $report->description }}
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Jenis Bullying</p>
                        <p class="font-bold text-gray-800 capitalize">{{ $report->bullying_type }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Lokasi Kejadian</p>
                        <p class="font-bold text-gray-800">{{ $report->location }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Waktu Kejadian</p>
                        <p class="font-bold text-gray-800">
                            {{ \Carbon\Carbon::parse($report->incident_time)->locale('id')->translatedFormat('d F Y') }}, {{ \Carbon\Carbon::parse($report->incident_time)->format('H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Evidence Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-images text-green-600 mr-2"></i>
                    Bukti yang Dilampirkan
                </h2>
                
                @if($report->evidences->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($report->evidences as $evidence)
                            <div class="group relative aspect-square bg-gray-100 rounded-xl overflow-hidden border border-gray-200">
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
                    <p class="text-gray-500 italic">Tidak ada bukti lampiran.</p>
                @endif
            </div>

            <!-- Chat Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-comments text-purple-600 mr-2"></i>
                        Diskusi dengan Tim StopBullying
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Gunakan ruang ini untuk berkomunikasi dengan kami mengenai laporan Anda.</p>
                </div>
                
                <div class="p-6 md:p-8 bg-gray-50/50 min-h-[300px] max-h-[500px] overflow-y-auto space-y-6">
                    @forelse($report->messages as $message)
                        <div class="flex {{ $message->user_id == Auth::id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[85%] md:max-w-[70%]">
                                @if($message->user_id != Auth::id())
                                    <div class="flex items-center space-x-2 mb-1">
                                        <span class="text-[10px] font-black uppercase text-blue-600">Tim StopBullying</span>
                                    </div>
                                @endif
                                <div class="rounded-2xl p-4 {{ $message->user_id == Auth::id() ? 'bg-blue-600 text-white shadow-md' : 'bg-white border border-gray-100 shadow-sm' }}">
                                    <p class="text-sm md:text-base font-medium">{{ $message->message }}</p>
                                </div>
                                <p class="text-[9px] mt-1.5 opacity-60 {{ $message->user_id == Auth::id() ? 'text-right' : '' }}">
                                    {{ $message->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 border border-gray-100 shadow-sm font-medium">
                                <i class="fas fa-comment-dots text-2xl text-gray-300"></i>
                            </div>
                            <p class="text-gray-500">Belum ada percakapan. Tim kami akan segera menanggapi laporan Anda.</p>
                        </div>
                    @endforelse
                </div>

                <div class="p-6 border-t border-gray-50 bg-white">
                    <form action="{{ route('report.message', $report->id) }}" method="POST" class="flex items-center space-x-4">
                        @csrf
                        <div class="flex-1 relative">
                            <input type="text" name="message" class="w-full bg-gray-50 border-gray-200 rounded-xl px-6 py-4 text-sm md:text-base focus:ring-blue-500 focus:border-blue-500 transition-all font-medium" placeholder="Tuliskan pesan atau pertanyaan..." required>
                        </div>
                        <button type="submit" class="bg-blue-600 text-white w-12 h-12 md:w-14 md:h-14 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-paper-plane text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-lg p-8 text-white">
                <h3 class="text-lg font-bold mb-4 flex items-center">
                    <i class="fas fa-shield-alt mr-2"></i> Keamanan Data
                </h3>
                <p class="text-blue-100 text-sm leading-relaxed font-medium">
                    Semua informasi dalam laporan ini bersifat rahasia dan hanya dapat diakses oleh tim admin dan Anda sendiri.
                </p>
                <div class="mt-6 pt-6 border-t border-white/20">
                    <div class="flex items-center space-x-3 mb-2">
                        <i class="fas fa-check-circle text-blue-300"></i>
                        <span class="text-xs font-bold uppercase">Identitas Terlindungi</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-check-circle text-blue-300"></i>
                        <span class="text-xs font-bold uppercase">Enkripsi Data Sesuai Standar</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-4 flex items-center">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i> Informasi Laporan
                </h3>
                <div class="space-y-6">
                    <div>
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-wider mb-1">Nama Dalam Laporan</p>
                        <p class="font-bold text-gray-800">{{ $report->reporter_name ?? 'Tidak Menyebutkan' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-wider mb-1">Umur & Peran</p>
                        <p class="font-bold text-gray-800">{{ $report->reporter_age ?? '??' }} Tahun • <span class="capitalize">{{ $report->reporter_role }}</span></p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-wider mb-1">Dibuat Pada</p>
                        <p class="font-bold text-gray-800">{{ \Carbon\Carbon::parse($report->created_at)->locale('id')->translatedFormat('d F Y') }}, {{ $report->created_at->format('H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-wider mb-1">Metode Lapor</p>
                        <p class="font-bold text-gray-800 {{ $report->anonymous ? 'text-purple-600' : '' }}">
                            @if($report->anonymous)
                                <i class="fas fa-user-secret mr-1"></i> Anonim
                            @else
                                <i class="fas fa-user mr-1"></i> Terbuka
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
