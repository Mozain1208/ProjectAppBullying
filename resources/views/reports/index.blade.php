@extends('layouts.app')

@section('title', 'Laporan Saya - StopBullying')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Laporan Saya</h1>
        <p class="text-gray-600">Pantau status dan perkembangan laporan yang telah Anda kirimkan.</p>
    </div>

    @if($reports->count() > 0)
        <div class="grid gap-6">
            @foreach($reports as $report)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition duration-300">
                    <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs font-bold uppercase tracking-wider">
                                    {{ $report->bullying_type }}
                                </span>
                                <span class="text-xs text-gray-400">
                                    <i class="far fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($report->created_at)->locale('id')->translatedFormat('d M Y') }}
                                </span>
                                @if($report->anonymous)
                                    <span class="text-xs text-purple-600 font-bold uppercase">
                                        <i class="fas fa-user-secret mr-1"></i> Anonim
                                    </span>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">{{ $report->description }}</h3>
                            <p class="text-gray-600 text-sm flex items-center">
                                <i class="fas fa-map-marker-alt text-red-500 mr-2"></i> {{ $report->location }}
                            </p>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="text-right hidden md:block">
                                <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Status</p>
                                <span class="px-4 py-1.5 rounded-full text-sm font-bold uppercase tracking-wider
                                    @if($report->status == 'pending') bg-orange-100 text-orange-600
                                    @elseif($report->status == 'process') bg-blue-100 text-blue-600
                                    @else bg-green-100 text-green-600 @endif">
                                    {{ $report->status }}
                                </span>
                            </div>
                            <a href="{{ route('report.show', $report->id) }}" class="px-6 py-3 bg-gray-800 text-white rounded-lg font-bold hover:bg-gray-900 transition shadow-sm flex items-center">
                                Detail <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-2xl p-12 text-center border-2 border-dashed border-gray-200">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-clipboard-list text-3xl text-gray-300"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Laporan</h2>
            <p class="text-gray-500 mb-8">Anda belum pernah mengirimkan laporan perundungan.</p>
            <a href="{{ route('report.create') }}" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition shadow-lg">
                Buat Laporan Sekarang
            </a>
        </div>
    @endif
</div>
@endsection
