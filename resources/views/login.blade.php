<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StopBullying</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-image { 
            background: url('{{ asset('images/bg-login.jpg') }}') no-repeat center center fixed; 
            background-size: cover;
        }
        .glass-effect { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-image min-h-screen flex items-center justify-center md:justify-end p-4 md:pr-24 lg:pr-32">
    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="inline-block p-1 bg-white rounded-full shadow-lg mb-4 overflow-hidden border-4 border-white">
                <img src="{{ asset('images/logo-smk.png') }}" alt="Logo SMK Mandiri Bersemi" class="w-24 h-24 object-contain">
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 drop-shadow-md">StopBullying</h1>
            <p class="text-white font-medium drop-shadow-sm">Platform Pengaduan Bullying yang Aman</p>
        </div>

        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Masuk ke Akun Anda</h2>
            
            @if(session('register_success'))
                <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700 font-medium">{{ session('register_success') }}</p>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-red-700 font-medium">{{ $errors->first() }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                
                <!-- Login Field -->
                <div>
                    <label for="login" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-user mr-2 text-purple-600"></i>
                        Username / NIS / Email
                    </label>
                    <input type="text" id="login" name="login" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200" placeholder="Masukkan username, NIS, atau email" required autofocus value="{{ old('login') }}">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-purple-600"></i>
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:outline-none transition duration-200 pr-12" placeholder="Masukkan password" required>
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 cursor-pointer">
                        <span class="ml-2 text-gray-700 group-hover:text-purple-600 transition">Ingat saya</span>
                    </label>
                    <a href="{{ url('forgot_password.php') }}" class="text-purple-600 hover:text-purple-700 font-medium transition">Lupa password?</a>
                </div>

                <button type="submit" class="w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg font-semibold text-lg hover:from-purple-700 hover:to-indigo-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                </button>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-300"></div></div>
                <div class="relative flex justify-center text-sm"><span class="px-4 bg-white text-gray-500">Belum punya akun?</span></div>
            </div>

            <a href="{{ route('register') }}" class="block w-full py-3 border-2 border-purple-600 text-purple-600 rounded-lg font-semibold text-center hover:bg-purple-50 transition duration-300">
                <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
            </a>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-white hover:text-purple-100 transition font-semibold drop-shadow-md"><i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
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
    </script>
</body>
</html>
