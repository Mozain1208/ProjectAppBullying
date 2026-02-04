<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis-jenis Bullying - StopBullying</title>
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

    <header class="bg-gradient-to-r from-green-500 to-teal-500 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <i class="fas fa-layer-group text-6xl mb-6 opacity-80"></i>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Jenis-jenis Bullying</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Bullying tidak selalu berupa pukulan. Kenali berbagai bentuknya agar lebih waspada.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-5xl mx-auto -mt-20 relative z-10">
            <div class="grid md:grid-cols-2 gap-8">
                
                <!-- Verbal -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:transform hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-3xl mb-6">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Bullying Verbal</h2>
                    <p class="text-gray-600 mb-4">
                        Penindasan yang dilakukan lewat kata-kata, tulisan, maupun julukan. Ini sering dianggap sepele ("cuma bercanda"), tapi lukanya sangat dalam.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Menghina atau mengejek</li>
                        <li>Memanggil dengan nama julukan buruk</li>
                        <li>Mengancam</li>
                        <li>Komentar rasis atau seksual yang tidak pantas</li>
                    </ul>
                </div>

                <!-- Fisik -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:transform hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center text-red-600 text-3xl mb-6">
                        <i class="fas fa-fist-raised"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Bullying Fisik</h2>
                    <p class="text-gray-600 mb-4">
                        Tindakan yang melibatkan kontak fisik langsung dan menyakiti tubuh korban atau merusak barang miliknya.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Memukul, menandang, menampar</li>
                        <li>Mendorong atau menjegal</li>
                        <li>Mengambil atau merusak barang</li>
                        <li>Memaksa melakukan sesuatu</li>
                    </ul>
                </div>

                <!-- Sosial -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:transform hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 text-3xl mb-6">
                        <i class="fas fa-users-slash"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Bullying Sosial</h2>
                    <p class="text-gray-600 mb-4">
                        Seringkali sulit dilihat (terselubung), tujuannya untuk merusak reputasi atau hubungan seseorang dengan orang lain.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Menyebarkan gosip atau rumor jahat</li>
                        <li>Sengaja mengucilkan seseorang dari grup</li>
                        <li>Mempermalukan di depan umum</li>
                        <li>Menghasut orang lain untuk memusuhi</li>
                    </ul>
                </div>

                <!-- Cyber -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:transform hover:-translate-y-1 transition duration-300">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 text-3xl mb-6">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Cyberbullying</h2>
                    <p class="text-gray-600 mb-4">
                        Perundungan yang terjadi menggunakan teknologi digital (media sosial, chat, game online).
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Mengirim pesan/komentar kasar</li>
                        <li>Menyebarkan foto/video aib</li>
                        <li>Hack akun orang lain</li>
                        <li>Doxing (menyebar data pribadi)</li>
                    </ul>
                </div>

            </div>
        </div>
    </main>
    
    <footer class="bg-gray-900 text-white py-8 mt-12 text-center">
        <p>&copy; 2024 StopBullying.</p>
    </footer>
</body>
</html>
