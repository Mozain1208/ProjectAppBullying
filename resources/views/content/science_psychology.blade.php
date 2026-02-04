<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sains Bullying: Psikologi - StopBullying</title>
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

    <header class="bg-gradient-to-r from-purple-600 to-indigo-600 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <div class="text-6xl mb-6">🧠</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Perspektif Psikologi</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Memahami dampak psikologis dan emosional dari bullying.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto -mt-20 relative z-10">
            
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <!-- Self Esteem -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 text-2xl mb-4">
                        <i class="fas fa-user-minus"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Harga Diri (Self-Esteem)</h3>
                    <p class="text-gray-600">
                        Korban bullying seringkali merasa tidak berharga, malu, dan menyalahkan diri sendiri. Rasa percaya diri mereka hancur perlahan.
                    </p>
                </div>

                <!-- Anxiety & Depression -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center text-indigo-600 text-2xl mb-4">
                        <i class="fas fa-cloud-rain"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Kecemasan & Depresi</h3>
                    <p class="text-gray-600">
                        Rasa takut yang terus menerus bertemu pelaku bisa berkembang menjadi gangguan kecemasan umum dan depresi jangka panjang.
                    </p>
                </div>
            </div>

            <!-- Coping Mechanisms -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Mekanisme Koping (Coping Mechanism)</h2>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <i class="fas fa-times-circle text-red-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Koping Negatif</h4>
                            <p class="text-gray-600 text-sm">Menarik diri dari sosial, menyakiti diri sendiri, atau menjadi agresif kepada orang lain.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 mt-1">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Koping Positif (Resiliensi)</h4>
                            <p class="text-gray-600 text-sm">Mencari dukungan teman/keluarga, menyalurkan emosi lewat seni/olahraga, dan membangun afirmasi diri positif.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 rounded-2xl p-8 text-white text-center">
                <h2 class="text-2xl font-bold mb-4">Kamu Berharga!</h2>
                <p class="mb-6 opacity-90">
                    Jangan biarkan kata-kata menyakitkan mendefinisikan siapa dirimu. Kesehatan mentalmu adalah prioritas utama.
                </p>
                <a href="{{ route('consultation.index') }}" class="inline-block bg-white text-purple-600 px-6 py-3 rounded-full font-bold hover:bg-purple-50 transition">
                    Butuh Teman Cerita? Konsultasi Disini
                </a>
            </div>

        </div>
    </main>
    
    <footer class="bg-gray-900 text-white py-8 mt-12 text-center">
        <p>&copy; 2024 StopBullying.</p>
    </footer>
</body>
</html>
