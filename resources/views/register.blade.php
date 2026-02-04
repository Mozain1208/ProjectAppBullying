<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - StopBullying</title>
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
            overflow-x: hidden;
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

        .input-group:focus-within label {
            color: var(--brand-primary);
        }
        
        .input-group:focus-within .input-icon {
            color: var(--brand-primary);
            transform: scale(1.1);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        
        /* Premium button hover effect */
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
    </style>
</head>
<body class="bg-image min-h-screen relative flex items-center justify-center p-4">
    <!-- Decorative elements -->
    <div class="fixed top-20 left-10 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float hidden lg:block"></div>
    <div class="fixed bottom-20 right-10 w-48 h-48 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float hidden lg:block" style="animation-delay: 2s"></div>

    <div class="w-full max-w-5xl flex flex-col md:flex-row shadow-2xl rounded-3xl overflow-hidden glass-effect animate-in fade-in zoom-in duration-500">
        <!-- Left Side: Informational/Branding -->
        <div class="w-full md:w-5/12 bg-gradient-to-br from-indigo-600 to-purple-700 p-8 md:p-12 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="inline-flex items-center space-x-3 mb-10 bg-white/20 p-2 pr-6 rounded-full backdrop-blur-md">
                    <img src="{{ asset('images/logo-smk.png') }}" alt="Logo" class="w-10 h-10 object-contain rounded-full bg-white p-1">
                    <span class="font-bold text-sm tracking-wider uppercase">Anti-Bullying System</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-heading font-bold leading-tight mb-6">Mulai Langkah <br><span class="text-indigo-200">Perubahan</span> Mu</h2>
                <p class="text-indigo-100 text-lg leading-relaxed mb-8 font-light">
                    Bergabunglah untuk menciptakan lingkungan sekolah yang aman, nyaman, dan saling menghargai. Suara Anda berharga.
                </p>
            </div>
            
            <div class="relative z-10 mt-auto">
                <div class="flex items-center space-x-4 p-4 bg-white/10 rounded-2xl backdrop-blur-sm border border-white/10 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center">
                        <i class="fas fa-shield-halved text-2xl text-indigo-200"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Privasi Terjamin</h4>
                        <p class="text-xs text-indigo-100/70">Data Anda dilindungi enkripsi tingkat tinggi.</p>
                    </div>
                </div>
                <p class="text-[10px] text-indigo-300 uppercase tracking-[0.2em] font-bold">SMK MANDIRI BERSEMI - 2024</p>
            </div>
        </div>

        <!-- Right Side: Register Form -->
        <div class="w-full md:w-7/12 p-8 md:p-12 bg-white flex flex-col overflow-y-auto max-h-[90vh] custom-scrollbar">
            <div class="mb-8">
                <h1 class="text-3xl font-heading font-bold text-gray-800 mb-2">Buat Akun</h1>
                <p class="text-gray-500">Lengkapi data diri di bawah ini dengan benar.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Username -->
                    <div class="input-group">
                        <label for="username" class="block text-sm font-bold text-gray-600 mb-2 transition-colors">
                            Username
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon transition-transform">
                                <i class="fas fa-user-circle text-lg"></i>
                            </span>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 @error('username') border-red-200 @else border-gray-100 @enderror rounded-2xl focus:border-indigo-400 focus:bg-white focus:outline-none transition-all"
                                placeholder="Pilih username"
                                required
                                value="{{ old('username') }}"
                            >
                        </div>
                        @error('username')
                            <p class="text-red-500 text-[10px] mt-2 font-semibold flex items-center italic">
                                <i class="fas fa-circle-exclamation mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div class="input-group">
                        <label for="age" class="block text-sm font-bold text-gray-600 mb-2 transition-colors">
                            Umur
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon transition-transform">
                                <i class="fas fa-calendar-check text-lg"></i>
                            </span>
                            <input 
                                type="number" 
                                id="age" 
                                name="age" 
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 @error('age') border-red-200 @else border-gray-100 @enderror rounded-2xl focus:border-indigo-400 focus:bg-white focus:outline-none transition-all"
                                placeholder="Contoh: 15"
                                required
                                min="4"
                                max="99"
                                value="{{ old('age') }}"
                            >
                        </div>
                        @error('age')
                            <p class="text-red-500 text-[10px] mt-2 font-semibold flex items-center italic">
                                <i class="fas fa-circle-exclamation mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group">
                    <label for="email" class="block text-sm font-bold text-gray-600 mb-2 transition-colors">
                        Email Address
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon transition-transform">
                            <i class="fas fa-envelope-open-text text-lg"></i>
                        </span>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border-2 @error('email') border-red-200 @else border-gray-100 @enderror rounded-2xl focus:border-indigo-400 focus:bg-white focus:outline-none transition-all"
                            placeholder="nama@email.com"
                            required
                            value="{{ old('email') }}"
                        >
                    </div>
                    @error('email')
                        <p class="text-red-500 text-[10px] mt-2 font-semibold flex items-center italic">
                            <i class="fas fa-circle-exclamation mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Password -->
                    <div class="input-group">
                        <label for="password" class="block text-sm font-bold text-gray-600 mb-2 transition-colors">
                            Password
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon transition-transform">
                                <i class="fas fa-shield-lock text-lg"></i>
                            </span>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="w-full pl-12 pr-12 py-3 bg-gray-50 border-2 @error('password') border-red-200 @else border-gray-100 @enderror rounded-2xl focus:border-indigo-400 focus:bg-white focus:outline-none transition-all"
                                placeholder="Min. 6 karakter"
                                required
                                minlength="6"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password', 'toggleIcon1')" 
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-indigo-600 p-2"
                            >
                                <i class="fas fa-eye" id="toggleIcon1"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-[10px] mt-2 font-semibold flex items-center italic">
                                <i class="fas fa-circle-exclamation mr-1"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group">
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-600 mb-2 transition-colors">
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 input-icon transition-transform">
                                <i class="fas fa-check-double text-lg"></i>
                            </span>
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                class="w-full pl-12 pr-12 py-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-indigo-400 focus:bg-white focus:outline-none transition-all"
                                placeholder="Ulangi password"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password_confirmation', 'toggleIcon2')" 
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-indigo-600 p-2"
                            >
                                <i class="fas fa-eye" id="toggleIcon2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <button 
                        type="submit" 
                        class="w-full btn-premium py-4 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-100 hover:shadow-2xl hover:shadow-indigo-200 transform hover:-translate-y-1 active:scale-[0.98] transition-all"
                    >
                        <i class="fas fa-user-plus mr-2"></i>
                        Buat Akun Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-auto pt-10 text-center">
                <p class="text-gray-500 font-medium">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:text-purple-600 transition-colors underline underline-offset-4 decoration-2 decoration-indigo-200 hover:decoration-purple-200">
                        Masuk di sini
                    </a>
                </p>
                
                <div class="mt-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-gray-400 hover:text-gray-800 transition-colors text-sm font-semibold group">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        const passInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');

        function validatePassword() {
            if (passInput.value != confirmInput.value) {
                confirmInput.setCustomValidity('Password tidak cocok');
                confirmInput.classList.add('border-red-200');
            } else {
                confirmInput.setCustomValidity('');
                confirmInput.classList.remove('border-red-200');
            }
        }

        passInput.onchange = validatePassword;
        confirmInput.onkeyup = validatePassword;
    </script>
</body>
</html>
