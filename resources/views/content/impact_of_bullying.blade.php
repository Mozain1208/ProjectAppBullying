<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dampak Bullying - StopBullying</title>
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
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition font-bold">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <span class="font-bold text-xl text-gray-800">StopBullying</span>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-purple-600 to-pink-500 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <i class="fas fa-heart-broken text-6xl mb-6 opacity-80"></i>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Dampak Serius Bullying</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Bullying bukan bagian dari "tumbuh dewasa". Dampaknya bisa bertahan seumur hidup.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-5xl mx-auto -mt-20 relative z-10">
            
            <!-- Intro Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 text-center">
                <p class="text-xl text-gray-700 leading-relaxed">
                    Dampak bullying tidak hanya dirasakan oleh korban, tetapi juga pelaku dan bahkan mereka yang hanya menyaksikan (bystander). Semua pihak yang terlibat berisiko mengalami dampak negatif.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                
                <!-- Dampak Bagi Korban -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-t-4 border-purple-500">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <i class="fas fa-user-injured text-purple-500"></i> Bagi Korban
                        </h2>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-purple-200 mt-1"></i>
                                <span>Depresi, kecemasan, dan rasa kesepian meningkat.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-purple-200 mt-1"></i>
                                <span>Perubahan pola tidur dan makan.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-purple-200 mt-1"></i>
                                <span>Hilangnya minat pada aktivitas yang disukai.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-purple-200 mt-1"></i>
                                <span>Penurunan prestasi akademik dan sering bolos sekolah.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-purple-200 mt-1"></i>
                                <span>Pikiran untuk menyakiti diri sendiri.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Dampak Bagi Pelaku -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-t-4 border-red-500">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <i class="fas fa-angry text-red-500"></i> Bagi Pelaku
                        </h2>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-red-200 mt-1"></i>
                                <span>Berisiko terlibat penyalahgunaan alkohol dan narkoba di masa depan.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-red-200 mt-1"></i>
                                <span>Cenderung terlibat perkelahian dan tindakan kriminal saat dewasa.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-red-200 mt-1"></i>
                                <span>Memiliki perilaku kasar terhadap pasangan atau anak di masa depan.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Dampak Bagi Saksi -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-t-4 border-yellow-500">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <i class="fas fa-eye text-yellow-500"></i> Bagi Saksi
                        </h2>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-yellow-200 mt-1"></i>
                                <span>Merasa takut dan tidak aman di sekolah.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-yellow-200 mt-1"></i>
                                <span>Merasa bersalah karena tidak membantu.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-yellow-200 mt-1"></i>
                                <span>Cemas menjadi target berikutnya.</span>
                            </li>
                        </ul>
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
