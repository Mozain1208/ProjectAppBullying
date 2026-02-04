<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sains Bullying: Spiritual - StopBullying</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition font-bold">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <span class="font-bold text-xl text-gray-800">StopBullying</span>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-amber-500 to-orange-500 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <div class="text-6xl mb-6">✨</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Perspektif Spiritual</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Menemukan kedamaian dan nilai kemanusiaan dalam menghadapi ujian.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto -mt-20 relative z-10">
            
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Empathy -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center text-amber-600 text-3xl mb-6 mx-auto">
                        <i class="fas fa-dove"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Empati & Kasih Sayang</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Semua ajaran spiritual mengajarkan kita untuk memperlakukan orang lain sebagaimana kita ingin diperlakukan. Menyakiti orang lain sama dengan mencederai jiwa kita sendiri.
                    </p>
                </div>

                <!-- Forgiveness -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 text-3xl mb-6 mx-auto">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Maaf & Kedamaian</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Memaafkan bukan berarti membenarkan tindakan pelaku, melainkan melepaskan beban di hati agar kita bisa hidup tenang tanpa rasa dendam.
                    </p>
                </div>
            </div>

            <!-- Moral Values -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Nilai Kemanusiaan</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-gray-600">1</div>
                        <div>
                            <h3 class="font-bold text-gray-800">Setiap Manusia Berharga</h3>
                            <p class="text-gray-600 text-sm">Setiap individu diciptakan unik dan memiliki hak untuk hidup aman, dihargai, dan dihormati.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-gray-600">2</div>
                        <div>
                            <h3 class="font-bold text-gray-800">Karma / Konsekuensi</h3>
                            <p class="text-gray-600 text-sm">Setiap perbuatan baik atau buruk pasti akan kembali kepada pelakunya dalam bentuk dan waktu yang berbeda.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-gray-600">3</div>
                        <div>
                            <h3 class="font-bold text-gray-800">Kekuatan Doa & Sabar</h3>
                            <p class="text-gray-600 text-sm">Menghadapi ujian dengan kesabaran dan doa dapat memberikan kekuatan batin yang luar biasa untuk bangkit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <footer class="bg-gray-900 text-white py-8 mt-12 text-center">
        <p>&copy; 2024 StopBullying.</p>
    </footer>
</body>
</html>
