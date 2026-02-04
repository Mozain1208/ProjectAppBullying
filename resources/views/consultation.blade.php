@extends('layouts.app')

@section('title', 'Ruang Konsultasi - StopBullying')

@section('styles')
<style>
.consultation-card {
    border-radius: 1rem;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
}

.consultation-card:hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.message-bubble {
    border-radius: 1rem;
    padding: 1rem;
    margin-bottom: 1rem;
    animation: fadeIn 0.3s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.message-bubble.anonymous {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.message-bubble.identified {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
            <i class="fas fa-comments text-blue-600 mr-2"></i>
            Ruang Konsultasi
        </h1>
        <p class="text-gray-600">
            @if(Auth::user()->isAdmin())
                Lihat dan tanggapi pesan konsultasi dari pengguna
            @else
                Sampaikan keluh kesah atau pertanyaan Anda kepada kami secara rahasia
            @endif
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
            <p class="text-green-700 font-medium flex items-center">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </p>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
            <p class="text-red-700 font-medium flex items-center">
                <i class="fas fa-times-circle mr-2"></i>{{ $errors->first() }}
            </p>
        </div>
    @endif

    @if(Auth::user()->isAdmin())
        <!-- Admin View: List of Consultations -->
        <div class="consultation-card p-6 bg-white">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">
                Pesan Konsultasi
                <span class="text-sm font-normal text-gray-500 ml-2">
                    ({{ isset($consultations) ? $consultations->count() : 0 }} pesan)
                </span>
            </h2>

            @if(isset($consultations) && $consultations->count() > 0)
                <div class="space-y-4">
                    @foreach($consultations as $consultation)
                        <a href="{{ route('consultation.show', $consultation->id) }}" class="block message-bubble cursor-pointer transform hover:scale-[1.01] transition-all duration-200 {{ $consultation->anonymous ? 'anonymous' : 'identified' }}">
                            <div class="flex items-start justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full {{ $consultation->anonymous ? 'bg-gray-800' : 'bg-white/20' }} flex items-center justify-center mr-3">
                                        <i class="fas {{ $consultation->anonymous ? 'fa-user-secret' : 'fa-user' }} text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">
                                            @if($consultation->anonymous)
                                                Anonymous
                                            @else
                                                {{ $consultation->user ? $consultation->user->username : 'User Terhapus' }}
                                            @endif
                                            @if($consultation->replies->count() > 0)
                                                <span class="ml-2 text-[10px] bg-white text-gray-800 px-2 py-0.5 rounded-full shadow-sm">{{ $consultation->replies->count() }} Rep</span>
                                            @endif
                                        </p>
                                        <p class="text-sm opacity-80">
                                            {{ $consultation->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-white/20 rounded-full p-2 hover:bg-white/30 transition">
                                    <i class="fas fa-reply text-white"></i>
                                </div>
                            </div>
                            <p class="text-white/90 leading-relaxed font-medium line-clamp-2">{{ $consultation->message }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg font-medium">Belum ada pesan konsultasi</p>
                </div>
            @endif
        </div>
    @else
        <!-- User View: Send Consultation Form -->
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Info Cards -->
            <div class="lg:col-span-1 space-y-4">
                <div class="consultation-card p-6 bg-gradient-to-br from-blue-500 to-blue-600 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Aman & Terpercaya</h3>
                    <p class="text-blue-100 text-sm">Semua pesan Anda akan dijaga kerahasiaannya</p>
                </div>



                <div class="consultation-card p-6 bg-gradient-to-br from-green-500 to-green-600 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-headset text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Respon Cepat</h3>
                    <p class="text-green-100 text-sm">Tim kami siap membantu Anda</p>
                </div>

                <!-- Tips Section -->
                <div class="consultation-card p-6 bg-gradient-to-br from-yellow-50 to-orange-50 border-2 border-yellow-100">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-yellow-600 mr-2"></i>
                        Tips Konsultasi
                    </h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-1"></i>
                            <span class="font-medium">Ceritakan dengan jelas dan detail</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-1"></i>
                            <span class="font-medium">Jangan ragu untuk bertanya apapun</span>
                        </li>

                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-600 mr-2 mt-1"></i>
                            <span class="font-medium">Pesan Anda akan ditanggapi oleh tim profesional kami</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Consultation Form -->
            <div class="lg:col-span-2">
                <div class="consultation-card p-8 bg-white border-2 border-gray-100 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 font-primary">
                        <i class="fas fa-paper-plane text-blue-600 mr-2"></i>
                        Mulai Konsultasi Baru
                    </h2>

                    <form method="POST" action="{{ route('consultation.store') }}" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="message" class="block text-gray-700 font-semibold mb-2">
                                Pesan Anda
                            </label>
                            <textarea 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition min-h-[150px] resize-none bg-white font-medium" 
                                id="message" 
                                name="message" 
                                placeholder="Sampaikan keluh kesah, pertanyaan, atau cerita Anda di sini..."
                                required
                            >{{ old('message') }}</textarea>
                        </div>

                        <!-- Anonymous Option -->
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                id="anonymous" 
                                name="anonymous" 
                                class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 transition duration-150 ease-in-out cursor-pointer"
                                value="1"
                                {{ old('anonymous') ? 'checked' : '' }}
                            >
                            <label for="anonymous" class="ml-3 block text-gray-700 font-medium cursor-pointer select-none">
                                Kirim sebagai Anonim
                                <p class="text-xs text-gray-500 font-normal mt-0.5">Identitas Anda akan disembunyikan dari admin</p>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button 
                                type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition duration-200 shadow-lg hover:shadow-xl"
                            >
                                <i class="fas fa-paper-plane mr-2"></i>
                                Mulai Chat
                            </button>
                        </div>
                    </form>
                </div>

                <!-- History List -->
                <div class="consultation-card p-6 bg-white border-2 border-gray-100">
                    <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-history text-gray-500 mr-2"></i>
                        Riwayat Konsultasi
                    </h3>
                    
                    @if(isset($consultations) && $consultations->count() > 0)
                        <div class="space-y-3">
                            @foreach($consultations as $consultation)
                                <a href="{{ route('consultation.show', $consultation->id) }}" class="block p-4 rounded-xl bg-gray-50 hover:bg-blue-50 border border-gray-200 hover:border-blue-200 transition group">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="flex items-center">
                                            @if($consultation->anonymous)
                                                <span class="bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded-full mr-2">ANONIM</span>
                                            @endif
                                            <span class="text-xs text-gray-500">{{ $consultation->created_at->format('d M Y, H:i') }}</span>
                                        </div>
                                        @if($consultation->replies->count() > 0)
                                            <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded-full">
                                                {{ $consultation->replies->count() }} Balasan
                                            </span>
                                        @else
                                            <span class="bg-gray-100 text-gray-500 text-[10px] font-bold px-2 py-0.5 rounded-full">Menunggu</span>
                                        @endif
                                    </div>
                                    <p class="text-gray-800 font-medium line-clamp-2">{{ $consultation->message }}</p>
                                    <div class="mt-2 text-xs text-blue-600 font-semibold group-hover:translate-x-1 transition-transform inline-flex items-center">
                                        Buka Chat <i class="fas fa-chevron-right ml-1"></i>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <p>Belum ada riwayat konsultasi.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
