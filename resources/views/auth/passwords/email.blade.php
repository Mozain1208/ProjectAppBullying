@extends('layouts.app')

@section('title', 'Lupa Kata Sandi - StopBullying')

@section('content')
<div class="container mx-auto px-4 py-20">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-key text-3xl text-blue-600"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Lupa Kata Sandi?</h1>
                <p class="text-gray-600 mt-2 text-sm">Masukkan email Anda untuk menerima kode verifikasi.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" class="w-full pl-10 pr-4 py-3 border-2 border-gray-100 rounded-xl focus:border-blue-500 focus:outline-none transition @error('email') border-red-500 @enderror" placeholder="nama@email.com" required value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition duration-300">
                    Kirim Kode Verifikasi
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline text-sm font-semibold">Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
