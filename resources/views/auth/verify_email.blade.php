<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - StopBullying</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --brand-primary: #6366f1;
            --brand-secondary: #a855f7;
        }
        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }
        .font-heading { font-family: 'Outfit', sans-serif; }
        
        .bg-image {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('images/bg-login.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .btn-premium {
            background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .btn-premium::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        .btn-premium:hover::after {
            left: 100%;
        }

        .otp-input:focus {
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }
    </style>
</head>
<body class="bg-image min-h-screen relative flex items-center justify-center p-4">
    <!-- Decorative elements -->
    <div class="fixed top-20 left-1/4 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float hidden lg:block"></div>
    <div class="fixed bottom-20 right-1/4 w-48 h-48 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float hidden lg:block" style="animation-delay: 2s"></div>

    <div class="w-full max-w-lg shadow-2xl rounded-3xl overflow-hidden glass-effect animate-in fade-in zoom-in duration-500">
        <div class="p-8 md:p-12 bg-white text-center">
            <!-- Icon -->
            <div class="w-24 h-24 bg-indigo-50 rounded-3xl flex items-center justify-center mx-auto mb-8 transform -rotate-6 shadow-inner">
                <i class="fas fa-envelope-open-text text-4xl text-indigo-600"></i>
            </div>

            <!-- Title -->
            <h1 class="text-3xl font-heading font-bold text-gray-800 mb-4">Verifikasi Email</h1>
            <p class="text-gray-500 mb-8 leading-relaxed">
                Terima kasih telah bergabung! Silakan masukkan 6 digit kode yang kami kirimkan ke <br>
                <span class="font-bold text-gray-700 decoration-indigo-300 underline underline-offset-4">{{ $email }}</span>
            </p>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-xl mb-8 flex items-center text-left">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <p class="text-sm text-green-700 font-bold">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('verification.verify') }}" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                
                <div>
                    <input 
                        type="text" 
                        name="code" 
                        id="code" 
                        class="otp-input w-full text-center text-4xl tracking-[1.5rem] font-bold py-5 bg-gray-50 border-2 @error('code') border-red-200 @else border-gray-100 @enderror rounded-2xl focus:bg-white focus:outline-none transition-all uppercase" 
                        placeholder="000000" 
                        maxlength="6" 
                        required 
                        autofocus
                        autocomplete="one-time-code"
                    >
                    @error('code')
                        <p class="text-red-500 text-[10px] mt-2 font-semibold flex items-center justify-center italic">
                            <i class="fas fa-circle-exclamation mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <button 
                    type="submit" 
                    class="w-full btn-premium py-4 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-100 hover:shadow-2xl hover:shadow-indigo-200 transform hover:-translate-y-1 active:scale-[0.98] transition-all"
                >
                    <i class="fas fa-shield-check mr-2"></i>
                    Aktivasi Akun Saya
                </button>
            </form>

            <!-- Resend & Alternative -->
            <div class="mt-10 border-t border-gray-100 pt-8">
                <p class="text-gray-500 font-medium text-sm mb-4">
                    Tidak menerima kode? 
                    <a href="#" class="text-indigo-600 font-bold hover:text-purple-600 transition-all hover:underline" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                        Kirim Ulang
                    </a>
                </p>
                
                <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                </form>

                <a href="{{ route('register') }}" class="inline-flex items-center text-gray-400 hover:text-gray-800 transition-colors text-xs font-semibold group">
                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                    Gunakan email lain
                </a>
            </div>
        </div>
    </div>
</body>
</html>
