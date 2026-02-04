<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deteksi Dini Bullying - Panduan Orang Tua</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/dewasa_bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.3); }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('content.adults') }}" class="flex items-center gap-2 text-gray-600 hover:text-purple-600 transition font-bold">
                <i class="fas fa-arrow-left"></i> Kembali ke Menu Dewasa
            </a>
            <span class="font-bold text-xl text-gray-800">StopBullying</span>
        </div>
    </nav>

    <header class="hero-gradient py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <i class="fas fa-search-plus text-6xl mb-6 opacity-80 drop-shadow-lg"></i>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-shadow">Deteksi Dini Bullying</h1>
            <p class="text-xl max-w-2xl mx-auto text-shadow font-medium">Anak-anak seringkali tidak menceritakan apa yang mereka alami. Ketahui tanda-tandanya sejak dini.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto -mt-20 relative z-10">
            
            <!-- Tanda Korban -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                <div class="bg-purple-50 p-6 border-b border-purple-100">
                    <h2 class="text-2xl font-bold text-purple-900 flex items-center gap-3">
                        <i class="fas fa-user-injured text-purple-600"></i> Tanda Anak Menjadi Korban
                    </h2>
                </div>
                <div class="p-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Perubahan Fisik</h3>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Luka, memar, atau goresan yang tidak bisa dijelaskan.</li>
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Pakaian robek atau barang pribadi sering hilang/rusak.</li>
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Sering mengeluh sakit kepala atau sakit perut (terutama saat pagi hari).</li>
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Perubahan pola makan (tiba-tiba nafsu makan hilang atau justru makan berlebihan).</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Perubahan Sosial & Emosional</h3>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Menarik diri dari pergaulan atau aktivitas yang disukai.</li>
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Tampak cemas, murung, atau mudah marah sepulang sekolah.</li>
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Prestasi akademik menurun drastis.</li>
                                <li class="flex items-start gap-2"><i class="fas fa-circle text-xs mt-2 text-purple-400"></i> Sulit tidur atau sering mimpi buruk.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tanda Pelaku -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                <div class="bg-red-50 p-6 border-b border-red-100">
                    <h2 class="text-2xl font-bold text-red-900 flex items-center gap-3">
                        <i class="fas fa-angry text-red-600"></i> Tanda Anak Menjadi Pelaku (Bullies)
                    </h2>
                </div>
                <div class="p-8">
                    <p class="text-gray-600 mb-6">Menerima kenyataan bahwa anak kita mungkin melakukan bullying itu sulit, tapi deteksi dini penting agar perilaku ini tidak terbawa hingga dewasa.</p>
                    <ul class="grid md:grid-cols-2 gap-4 text-gray-700">
                        <li class="bg-gray-50 p-4 rounded-lg flex items-center gap-3 border border-gray-100">
                            <i class="fas fa-exclamation-triangle text-red-500"></i> Memiliki sifat agresif atau mudah frustrasi.
                        </li>
                        <li class="bg-gray-50 p-4 rounded-lg flex items-center gap-3 border border-gray-100">
                            <i class="fas fa-exclamation-triangle text-red-500"></i> Kurang memiliki empati terhadap orang lain.
                        </li>
                        <li class="bg-gray-50 p-4 rounded-lg flex items-center gap-3 border border-gray-100">
                            <i class="fas fa-exclamation-triangle text-red-500"></i> Sering terlibat perkelahian fisik atau verbal.
                        </li>
                        <li class="bg-gray-50 p-4 rounded-lg flex items-center gap-3 border border-gray-100">
                            <i class="fas fa-exclamation-triangle text-red-500"></i> Memiliki barang baru atau uang yang tidak bisa dijelaskan asalnya.
                        </li>
                        <li class="bg-gray-50 p-4 rounded-lg flex items-center gap-3 border border-gray-100">
                            <i class="fas fa-exclamation-triangle text-red-500"></i> Tidak mau bertanggung jawab atas tindakannya.
                        </li>
                        <li class="bg-gray-50 p-4 rounded-lg flex items-center gap-3 border border-gray-100">
                            <i class="fas fa-exclamation-triangle text-red-500"></i> Sangat kompetitif dan obsesif dengan popularitas.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-purple-700 to-indigo-800 rounded-2xl p-8 text-white text-center">
                <h2 class="text-2xl font-bold mb-4">Melihat Tanda-tanda Ini?</h2>
                <p class="mb-6 opacity-90 max-w-2xl mx-auto">
                    Jangan panik, tapi jangan diabaikan. Ajak anak bicara dari hati ke hati tanpa menghakimi. Jika perlu bantuan profesional, kami siap membantu.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('consultation.index') }}" class="px-6 py-3 bg-white text-purple-700 rounded-full font-bold hover:bg-purple-100 transition">
                        Konsultasi dengan Ahli
                    </a>
                </div>
            </div>

        </div>
    </main>
    
    <footer class="bg-gray-900 text-white py-8 mt-12 text-center">
        <p>&copy; 2024 StopBullying.</p>
    </footer>
</body>
</html>
