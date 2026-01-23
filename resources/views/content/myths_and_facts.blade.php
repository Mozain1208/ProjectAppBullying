<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitos dan Fakta Bullying - Panduan Orang Tua</title>
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
            <a href="{{ route('content.adults') }}" class="flex items-center gap-2 text-gray-600 hover:text-green-600 transition font-bold">
                <i class="fas fa-arrow-left"></i> Kembali ke Menu Dewasa
            </a>
            <span class="font-bold text-xl text-gray-800">StopBullying</span>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-teal-500 to-emerald-600 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <i class="fas fa-clipboard-check text-6xl mb-6 opacity-80"></i>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Mitos dan Fakta Bullying</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Banyak kesalahpahaman tentang bullying yang justru memperburuk keadaan. Mari luruskan faktanya.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto -mt-20 relative z-10">
            
            <div class="space-y-6">

                <!-- Item 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition">
                    <div class="flex flex-col md:flex-row">
                        <div class="bg-red-50 p-6 md:w-1/3 border-b md:border-b-0 md:border-r border-red-100 flex flex-col justify-center text-center md:text-left">
                            <span class="text-red-500 font-bold tracking-wider text-sm uppercase mb-2">Mitos</span>
                            <p class="text-gray-800 font-semibold text-lg">"Bullying hanyalah bagian normal dari tumbuh dewasa."</p>
                        </div>
                        <div class="bg-green-50 p-6 md:w-2/3 flex flex-col justify-center">
                            <span class="text-green-600 font-bold tracking-wider text-sm uppercase mb-2 flex items-center gap-2"><i class="fas fa-check-circle"></i> Fakta</span>
                            <p class="text-gray-700 leading-relaxed">
                                Bullying <strong>bukanlah</strong> hal normal. Itu adalah perilaku agresif yang menyimpang. Menganggapnya normal sama saja dengan membiarkan anak tersakiti. Anak bisa tumbuh dewasa dengan sehat tanpa harus mengalami perundungan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition">
                    <div class="flex flex-col md:flex-row">
                        <div class="bg-red-50 p-6 md:w-1/3 border-b md:border-b-0 md:border-r border-red-100 flex flex-col justify-center text-center md:text-left">
                            <span class="text-red-500 font-bold tracking-wider text-sm uppercase mb-2">Mitos</span>
                            <p class="text-gray-800 font-semibold text-lg">"Balas melawan fisik adalah satu-satunya cara menghentikan bullying."</p>
                        </div>
                        <div class="bg-green-50 p-6 md:w-2/3 flex flex-col justify-center">
                            <span class="text-green-600 font-bold tracking-wider text-sm uppercase mb-2 flex items-center gap-2"><i class="fas fa-check-circle"></i> Fakta</span>
                            <p class="text-gray-700 leading-relaxed">
                                Membalas dengan kekerasan seringkali memperburuk situasi dan membuat korban berisiko terluka lebih parah atau justru dihukum sekolah. Strategi terbaik adalah melapor, bersikap asertif, dan melibatkan orang dewasa.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition">
                    <div class="flex flex-col md:flex-row">
                        <div class="bg-red-50 p-6 md:w-1/3 border-b md:border-b-0 md:border-r border-red-100 flex flex-col justify-center text-center md:text-left">
                            <span class="text-red-500 font-bold tracking-wider text-sm uppercase mb-2">Mitos</span>
                            <p class="text-gray-800 font-semibold text-lg">"Kata-kata tidak akan menyakitimu (Sticks and stones...)."</p>
                        </div>
                        <div class="bg-green-50 p-6 md:w-2/3 flex flex-col justify-center">
                            <span class="text-green-600 font-bold tracking-wider text-sm uppercase mb-2 flex items-center gap-2"><i class="fas fa-check-circle"></i> Fakta</span>
                            <p class="text-gray-700 leading-relaxed">
                                Luka fisik bisa sembuh dalam hitungan hari, tapi luka emosional akibat kata-kata jahat (bullying verbal) bisa bertahan seumur hidup dan merusak kesehatan mental (depresi, trauma).
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:shadow-xl transition">
                    <div class="flex flex-col md:flex-row">
                        <div class="bg-red-50 p-6 md:w-1/3 border-b md:border-b-0 md:border-r border-red-100 flex flex-col justify-center text-center md:text-left">
                            <span class="text-red-500 font-bold tracking-wider text-sm uppercase mb-2">Mitos</span>
                            <p class="text-gray-800 font-semibold text-lg">"Cyberbullying tidak seberbahaya bullying fisik."</p>
                        </div>
                        <div class="bg-green-50 p-6 md:w-2/3 flex flex-col justify-center">
                            <span class="text-green-600 font-bold tracking-wider text-sm uppercase mb-2 flex items-center gap-2"><i class="fas fa-check-circle"></i> Fakta</span>
                            <p class="text-gray-700 leading-relaxed">
                                Cyberbullying bisa lebih berbahaya karena bisa terjadi 24/7, menyebar dengan sangat cepat ke audiens yang luas, dan jejak digitalnya sulit dihapus. Korban merasa tidak ada tempat yang aman, bahkan di rumah sendiri.
                            </p>
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
