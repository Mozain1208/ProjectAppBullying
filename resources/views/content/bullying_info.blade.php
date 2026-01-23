<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apa itu Bullying? - StopBullying Anak</title>
    <meta name="description" content="Penjelasan tentang bullying untuk anak usia 5-12 tahun">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .info-card {
            transition: all 0.3s ease;
        }
        .info-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-blue-50">
    <!-- Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('content.children') }}" class="flex items-center space-x-2 text-blue-600 hover:text-blue-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="font-bold">Kembali ke Panduan Anak</span>
                </a>
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient py-20 text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 -mt-20 -mr-20 opacity-10">
            <svg class="w-96 h-96" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
            </svg>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Mengenal Apa Itu Bullying</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Halo teman-teman! Yuk, kita belajar bersama tentang apa itu bullying dan bagaimana kita bisa saling menyayangi.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-16 -mt-10">
        <div class="max-w-4xl mx-auto">
            
            <!-- Section 1: What is Bullying -->
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-12 info-card border-l-8 border-yellow-400">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Apa itu Bullying?</h2>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            <span class="font-bold text-blue-600">Bullying</span> (perundungan) adalah ketika seseorang menyakiti orang lain dengan sengaja dan berulang kali. Ini bukan sekadar bercanda, karena orang yang di-bully merasa sedih, takut, dan tidak berdaya.
                        </p>
                    </div>
                    <div class="w-48 h-48 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-24 h-24 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Section 2: Types of Bullying -->
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-12 info-card border-l-8 border-green-400">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 font-bold">2. Bullying bisa berupa apa saja?</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-green-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-green-700 mb-2">Bullying Kata-kata</h3>
                        <p class="text-gray-600">Mengejek, memanggil dengan nama buruk, atau mengancam.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-blue-700 mb-2">Bullying Fisik</h3>
                        <p class="text-gray-600">Memukul, mendorong, menendang, atau merusak barang milikmu.</p>
                    </div>
                    <div class="bg-purple-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-purple-700 mb-2">Bullying Sosial</h3>
                        <p class="text-gray-600">Menghasut teman untuk tidak mau berteman dengan seseorang atau menyebarkan rahasia.</p>
                    </div>
                    <div class="bg-orange-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-orange-700 mb-2">Cyberbullying</h3>
                        <p class="text-gray-600">Bullying yang terjadi lewat HP, tablet, atau komputer.</p>
                    </div>
                </div>
            </div>

            <!-- Section 3: Where it happens -->
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-12 info-card border-l-8 border-purple-400">
                <div class="flex flex-col md:flex-row-reverse gap-8 items-center">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 font-bold">3. Dimana bullying bisa terjadi?</h2>
                        <p class="text-gray-600 text-lg leading-relaxed mb-4">
                            Bullying bisa terjadi di mana saja teman-teman berkumpul, seperti:
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-gray-700 font-medium">Di sekolah (kelas, kantin, lapangan)</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-gray-700 font-medium">Di lingkungan rumah atau taman bermain</span>
                            </li>
        
                            <li class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <span class="text-gray-700 font-medium">Di dunia maya (game online, media sosial)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="w-48 h-48 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-24 h-24 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Section 4: Cyberbullying -->
            <div class="bg-gray-900 rounded-3xl shadow-xl p-8 mb-12 info-card text-white">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold mb-4 font-bold text-blue-400">4. Kenali Cyberbullying</h2>
                        <p class="text-gray-300 text-lg leading-relaxed mb-6">
                            Cyberbullying adalah bullying yang menggunakan teknologi digital. Contohnya:
                        </p>
                        <div class="grid gap-4">
                            <div class="bg-white bg-opacity-10 p-4 rounded-xl">
                                <p class="text-sm italic">"Mengirim pesan jahat melalui WhatsApp atau game online."</p>
                            </div>
                            <div class="bg-white bg-opacity-10 p-4 rounded-xl">
                                <p class="text-sm italic">"Membagikan foto orang lain untuk diejek."</p>
                            </div>
                            <div class="bg-white bg-opacity-10 p-4 rounded-xl">
                                <p class="text-sm italic">"Mengeluarkan seseorang dari grup chat untuk menyakiti hatinya."</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-48 h-48 bg-blue-900 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-24 h-24 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 18c1.1 0 1.99-.9 1.99-2L22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2H0v2h24v-2h-4zM4 6h16v10H4V6z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Footer Action -->
            <div class="text-center bg-blue-600 rounded-3xl p-10 text-white">
                <h3 class="text-2xl font-bold mb-4 font-bold">Ingat Ya Teman-teman!</h3>
                <p class="text-lg mb-8 opacity-90">
                    Kamu tidak sendirian. Kalau ada yang membuatmu merasa tidak nyaman, segera bicara dengan Ibu, Ayah, atau Gurumu ya.
                </p>
                <a href="{{ route('content.children') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-full font-bold hover:bg-blue-50 transition">
                    Mengerti, Terima Kasih!
                </a>
            </div>

        </div>
    </main>

    <footer class="bg-gray-100 py-8 text-center text-gray-500">
        <p>&copy; 2024 StopBullying. Ayo saling menyayangi!</p>
    </footer>
</body>
</html>
