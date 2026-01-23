<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sains Bullying: Sosial - StopBullying</title>
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

    <header class="bg-gradient-to-r from-green-500 to-emerald-600 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <div class="text-6xl mb-6">👥</div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Perspektif Sosial</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Bullying adalah masalah sosial, bukan masalah individu semata.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto -mt-20 relative z-10">
            
            <!-- Bystander Effect -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <div class="md:flex items-center gap-8">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Efek Penonton (Bystander Effect)</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Dalam banyak kasus bullying, orang-orang di sekitar hanya menonton dan diam. Semakin banyak orang yang menonton, semakin kecil kemungkinan seseorang untuk menolong. Ini disebut <i>diffusion of responsibility</i>.
                        </p>
                        <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                            <p class="text-yellow-800 font-medium">Jangan hanya jadi penonton! Jadilah <strong>Upstander</strong>—orang yang berani bertindak atau melapor saat melihat bullying.</p>
                        </div>
                    </div>
                    <div class="hidden md:block w-1/3">
                        <i class="fas fa-users text-9xl text-gray-200"></i>
                    </div>
                </div>
            </div>

            <!-- Peer Pressure -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Tekanan Teman Sebaya (Peer Pressure)</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border border-gray-100 rounded-xl p-6 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-800 mb-2">Mengapa pelaku membully?</h3>
                        <p class="text-sm text-gray-600">Seringkali untuk mendapatkan status sosial, kekuasaan, atau agar "diterima" oleh kelompok tertentu.</p>
                    </div>
                    <div class="border border-gray-100 rounded-xl p-6 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-800 mb-2">Dampak Komunitas</h3>
                        <p class="text-sm text-gray-600">Lingkungan sekolah yang mentolerir bullying menciptakan budaya ketakutan dan ketidakpercayaan antar siswa.</p>
                    </div>
                </div>
            </div>

            <!-- Social Exclusion -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-red-100 p-3 rounded-full flex-shrink-0">
                        <i class="fas fa-ban text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-2">Pengucilan Sosial (Social Exclusion)</h2>
                        <p class="text-gray-600">
                            Manusia adalah makhluk sosial yang butuh diterima. Pengucilan (ostracism) mengaktifkan bagian otak yang sama dengan rasa sakit fisik. Dikucilkan sama sakitnya dengan dipukul.
                        </p>
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
