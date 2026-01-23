<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refleksi Diri: Menjadi Teman yang Lebih Baik - StopBullying Anak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .reflection-gradient { background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); }
    </style>
</head>
<body class="bg-indigo-50 min-h-screen">
    <!-- Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 text-center">
            <span class="text-indigo-600 font-bold text-xl">StopBullying: Pojok Refleksi</span>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            
            <!-- Hero Message -->
            <div class="reflection-gradient rounded-3xl p-10 text-white text-center shadow-xl mb-12">
                <h1 class="text-3xl font-bold mb-4">Setiap Orang Bisa Berubah Menjadi Lebih Baik</h1>
                <p class="text-lg opacity-90">
                    Menyadari bahwa perbuatan kita menyakiti orang lain adalah langkah yang sangat luar biasa. Yuk, kita pelajari kenapa bullying itu tidak baik dan bagaimana cara memperbaikinya.
                </p>
            </div>

            <!-- Why Bullying is Bad -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8 border-l-8 border-red-500">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Kenapa Bullying Itu Tidak Baik?</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">😢</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Membuat Orang Lain Sedih & Takut</h3>
                            <p class="text-gray-600">Teman yang kamu bully akan merasa sangat sedih di hatinya. Mereka mungkin menangis diam-diam dan merasa takut setiap kali ingin pergi ke sekolah atau bertemu denganmu.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">💔</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Merusak Pertemanan</h3>
                            <p class="text-gray-600">Bullying membuat orang menjauhimu bukan karena mereka hormat, tapi karena mereka takut. Pada akhirnya, kamu mungkin akan kehilangan teman-teman yang tulus menyayangimu.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Steps to Fix -->
            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8 border-l-8 border-green-500">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Apa yang Bisa Kamu Lakukan Sekarang?</h2>
                <div class="grid gap-4">
                    <div class="bg-green-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-green-700 mb-2">1. Segera Berhenti</h3>
                        <p class="text-gray-700 text-sm">Janji pada dirimu sendiri untuk tidak mengulangi perbuatan mengejek atau menyakiti teman lagi mulai hari ini.</p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-blue-700 mb-2">2. Meminta Maaf</h3>
                        <p class="text-gray-700 text-sm">Temui teman yang pernah kamu sakiti. Katakan dengan tulus: "Maafkan aku ya, aku sadar perbuatanku salah. Aku tidak akan mengulanginya lagi."</p>
                    </div>
                    <div class="bg-amber-50 p-6 rounded-2xl">
                        <h3 class="font-bold text-amber-700 mb-2">3. Berlatih Empati</h3>
                        <p class="text-gray-700 text-sm">Bayangkan jika kamu berada di posisi temanmu. Bagaimana rasanya jika namamu diejek atau barangmu diambil? Perlakukanlah orang lain seperti kamu ingin diperlakukan.</p>
                    </div>
                </div>
            </div>

            <!-- Motivational Closing -->
            <div class="bg-gray-900 rounded-3xl p-10 text-white text-center">
                <h3 class="text-2xl font-bold mb-4 text-indigo-400">Kamu Punya Kekuatan untuk Menolong</h3>
                <p class="text-gray-300 mb-8 leading-relaxed">
                    Alih-alih menggunakan kekuatanmu untuk menyakiti, gunakanlah untuk melindungi teman-temanmu. Orang yang paling kuat adalah mereka yang bisa mengendalikan dirinya sendiri dan bersikap baik.
                </p>
                <a href="{{ route('content.children') }}" class="inline-block bg-indigo-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-indigo-700 transition shadow-lg">
                    Aku Berjanji Akan Menjadi Teman yang Baik!
                </a>
            </div>

        </div>
    </main>

    <footer class="bg-gray-100 py-8 text-center text-gray-500">
        <p>&copy; 2024 StopBullying. Mari ciptakan lingkungan pertemanan yang hangat!</p>
    </footer>
</body>
</html>
