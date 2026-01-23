<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - StopBullying</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .bg-image {
            background: url('{{ asset('images/bg-login.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-image min-h-screen flex items-center justify-center md:justify-end p-4 md:pr-12 lg:pr-24">
    <div class="w-full max-w-2xl">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="inline-block p-1 bg-white rounded-full shadow-lg mb-4 overflow-hidden border-4 border-white">
                <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK Mandiri Bersemi" class="w-24 h-24 object-contain">
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-md">Daftar Akun Baru</h1>
            <p class="text-white font-medium drop-shadow-sm">Bergabunglah dengan platform anti-bullying kami</p>
        </div>

        <!-- Register Card -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700 font-medium">{{ $errors->first() }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <!-- Username -->
                <div>
                    <label for="username" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-user mr-2 text-purple-600"></i>
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200"
                        placeholder="Pilih username"
                        required
                        value="{{ old('username') }}"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-envelope mr-2 text-purple-600"></i>
                        Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200"
                        placeholder="nama@email.com"
                        required
                        value="{{ old('email') }}"
                    >
                    <p class="text-sm text-gray-500 mt-1">Email akan digunakan untuk reset password</p>
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-birthday-cake mr-2 text-purple-600"></i>
                        Umur
                    </label>
                    <input 
                        type="number" 
                        id="age" 
                        name="age" 
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200"
                        placeholder="Masukkan umur Anda (4-99)"
                        required
                        min="4"
                        max="99"
                        value="{{ old('age') }}"
                    >
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-lock mr-2 text-purple-600"></i>
                            Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200 pr-12"
                                placeholder="Minimal 6 karakter"
                                required
                                minlength="6"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password', 'toggleIcon1')" 
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                            >
                                <i class="fas fa-eye" id="toggleIcon1"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-lock mr-2 text-purple-600"></i>
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200 pr-12"
                                placeholder="Ulangi password"
                                required
                                minlength="6"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password_confirmation', 'toggleIcon2')" 
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                            >
                                <i class="fas fa-eye" id="toggleIcon2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Register Button -->
                <button 
                    type="submit" 
                    class="w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg font-semibold text-lg hover:from-purple-700 hover:to-indigo-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                >
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">Sudah punya akun?</span>
                </div>
            </div>

            <!-- Login Link -->
            <a 
                href="{{ route('login') }}" 
                class="block w-full py-3 border-2 border-purple-600 text-purple-600 rounded-lg font-semibold text-center hover:bg-purple-50 transition duration-300"
            >
                <i class="fas fa-sign-in-alt mr-2"></i>
                Login
            </a>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-white hover:text-purple-100 transition font-semibold drop-shadow-md">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Password match validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (password !== confirmPassword) {
                this.setCustomValidity('Password tidak cocok');
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</html>
