@extends('layouts.app')

@section('title', 'Reset Kata Sandi - StopBullying')

@section('content')
<div class="container mx-auto px-4 py-20">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lock-open text-3xl text-blue-600"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Buat Kata Sandi Baru</h1>
                <p class="text-gray-600 mt-2 text-sm">Silakan masukkan kata sandi baru Anda.</p>
            </div>

            <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="code" value="{{ $code }}">
                
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi Baru</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-blue-500 focus:outline-none transition @error('password') border-red-500 @enderror" placeholder="••••••••" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 border-2 border-gray-100 rounded-xl focus:border-blue-500 focus:outline-none transition" placeholder="••••••••" required>
                </div>

                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition duration-300">
                    Simpan Kata Sandi Baru
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
