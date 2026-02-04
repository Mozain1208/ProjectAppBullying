<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sains Bullying: Biologi - StopBullying</title>
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

    <header class="bg-gradient-to-r from-blue-600 to-cyan-500 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <div class="text-6xl mb-6">🧬</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Perspektif Biologi</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Bagaimana tubuh dan otak kita merespons bullying?</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto -mt-20 relative z-10">
            
            <!-- Brain Impact -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="flex items-start gap-6">
                    <div class="bg-blue-100 p-4 rounded-xl hidden md:block">
                        <i class="fas fa-brain text-blue-600 text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Dampak pada Otak</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Saat seseorang mengalami bullying, otak meresponsnya sebagai ancaman fisik. Amigdala (pusat rasa takut) menjadi sangat aktif, memicu respons "fight or flight".
                        </p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-arrow-right text-blue-500 text-sm"></i>
                                <span>Peningkatan hormon kortisol (hormon stres).</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-arrow-right text-blue-500 text-sm"></i>
                                <span>Kesulitan berkonsentrasi dan mengingat pelajaran.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Body Response -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="flex items-start gap-6">
                    <div class="bg-red-100 p-4 rounded-xl hidden md:block">
                        <i class="fas fa-heartbeat text-red-600 text-3xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Reaksi Fisik Tubuh</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Stres kronis akibat bullying dapat melemahkan sistem kekebalan tubuh, membuat korban lebih mudah sakit.
                        </p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-bold text-gray-800 mb-2">Gangguan Tidur</h3>
                                <p class="text-sm text-gray-600">Insomnia atau mimpi buruk yang berulang.</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-bold text-gray-800 mb-2">Gejala Psikosomatis</h3>
                                <p class="text-sm text-gray-600">Sakit kepala, sakit perut, atau mual tanpa penyebab medis yang jelas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Long Term -->
            <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100">
                <h2 class="text-xl font-bold text-blue-900 mb-4 text-center">Pentingnya Pemulihan</h2>
                <p class="text-blue-800 text-center max-w-2xl mx-auto">
                    Tubuh memiliki kemampuan luar biasa untuk pulih. Dengan dukungan lingkungan yang positif, olahraga teratur, dan istirahat yang cukup, tingkat hormon stres dapat kembali normal dan kesehatan otak dapat membaik.
                </p>
            </div>

        </div>
    </main>
    
    <footer class="bg-gray-900 text-white py-8 mt-12 text-center">
        <p>&copy; 2024 StopBullying.</p>
    </footer>
</body>
</html>
