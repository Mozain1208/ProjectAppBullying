@extends('layouts.app')

@section('title', 'Verifikasi Kode - StopBullying')

@section('content')
<div class="container mx-auto px-4 py-20">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-3xl text-blue-600"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Verifikasi Kode</h1>
                <p class="text-gray-600 mt-2 text-sm">Masukkan 6 digit kode yang telah kami kirimkan ke <strong>{{ $email }}</strong>.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('password.verify') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                
                <div>
                    <label for="code" class="block text-sm font-semibold text-gray-700 mb-2">Kode Verifikasi</label>
                    <input type="text" name="code" id="code" class="w-full text-center text-2xl tracking-[1rem] font-bold py-3 border-2 border-gray-100 rounded-xl focus:border-blue-500 focus:outline-none transition @error('code') border-red-500 @enderror" placeholder="000000" maxlength="6" required>
                    @error('code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition duration-300">
                    Verifikasi Kode
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-500 text-sm">Tidak menerima kode? <a href="#" class="text-blue-600 hover:underline font-semibold" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">Kirim Ulang</a></p>
                <form id="resend-form" action="{{ route('password.email') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
