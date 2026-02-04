<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apa itu Bullying? - StopBullying</title>
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

    <header class="bg-gradient-to-r from-red-500 to-orange-500 py-20 text-center text-white">
        <div class="container mx-auto px-4">
            <i class="fas fa-question-circle text-6xl mb-6 opacity-80"></i>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Apa Itu Bullying?</h1>
            <p class="text-xl max-w-2xl mx-auto opacity-90">Memahami definisi dan karakteristik perundungan agar kita bisa menghentikannya bersama.</p>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12 -mt-20 relative z-10">
            <div class="prose prose-lg max-w-none text-gray-700">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Definisi Bullying</h2>
                <p class="mb-6">
                    <span class="font-semibold text-red-500">Bullying</span> atau perundungan adalah perilaku tidak menyenangkan baik secara verbal, fisik, ataupun sosial di dunia nyata maupun dunia maya yang membuat seseorang merasa tidak nyaman, sakit hati, dan tertekan.
                </p>
                <p class="mb-8">
                    Bullying bukanlah kejadian sesekali atau pertengkaran biasa antar teman. Ada tiga komponen utama yang membedakan bullying dengan tindakan agresif lainnya:
                </p>

                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-red-50 p-6 rounded-xl border border-red-100">
                        <div class="bg-red-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 text-red-600 text-xl font-bold">1</div>
                        <h3 class="font-bold text-gray-900 mb-2">Disengaja</h3>
                        <p class="text-sm">Pelaku bermaksud menyakiti fisik atau perasaan korban.</p>
                    </div>
                    <div class="bg-orange-50 p-6 rounded-xl border border-orange-100">
                        <div class="bg-orange-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 text-orange-600 text-xl font-bold">2</div>
                        <h3 class="font-bold text-gray-900 mb-2">Ketidakseimbangan Kekuatan</h3>
                        <p class="text-sm">Korban sulit membela diri karena pelaku lebih kuat, lebih tua, atau lebih populer.</p>
                    </div>
                    <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-100">
                        <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 text-yellow-600 text-xl font-bold">3</div>
                        <h3 class="font-bold text-gray-900 mb-2">Berulang</h3>
                        <p class="text-sm">Tindakan tersebut terjadi lebih dari sekali atau berpotensi terjadi lagi.</p>
                    </div>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-r-xl">
                    <h3 class="font-bold text-blue-900 mb-2">Ingat!</h3>
                    <p class="text-blue-800">
                        Becanda itu menyenangkan <span class="font-bold underline">semua orang</span>. Jika ada yang merasa sakit hati atau tidak suka, itu bukan lagi becanda, itu adalah <span class="font-bold">bullying</span>.
                    </p>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="bg-gray-900 text-white py-8 mt-12 text-center">
        <p>&copy; 2024 StopBullying.</p>
    </footer>
</body>
</html>
