<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apa itu Cyberbullying? - StopBullying</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .hero-mesh {
            background-color: #6366f1;
            background-image: 
                radial-gradient(at 0% 0%, hsla(243,75%,70%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(260,49%,30%,1) 0, transparent 50%);
        }
        .text-gradient {
            background: linear-gradient(to right, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 overflow-x-hidden">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 glass-card mx-4 mt-4 rounded-2xl">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('content.teens') }}" class="flex items-center gap-2 text-slate-600 hover:text-indigo-500 transition-all font-bold group">
                <i class="fas fa-chevron-left transform group-hover:-translate-x-1 transition-transform"></i>
                <span>Kembali</span>
            </a>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center text-white">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <span class="font-extrabold text-xl tracking-tight">StopBullying<span class="text-indigo-500">.</span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="container mx-auto px-4 mt-8">
        <div class="hero-mesh rounded-[2.5rem] p-12 md:p-20 text-white relative overflow-hidden">
            <div class="relative z-10 max-w-3xl">
                <span class="bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-sm font-bold tracking-wider uppercase mb-6 inline-block">Materi Edukasi Remaja</span>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight">Apa itu <span class="underline decoration-indigo-400">Cyberbullying?</span></h1>
                <p class="text-xl md:text-2xl text-white/80 leading-relaxed mb-10">
                    Dunia digital harusnya jadi tempat berkarya, bukan tempat terluka. Pahami bahayanya dan jadilah netizen yang bijak.
                </p>
                <a href="#video-materi" class="bg-white text-slate-900 px-8 py-4 rounded-xl font-bold hover:bg-slate-100 transition-all shadow-xl hover:shadow-2xl inline-flex items-center gap-3">
                    <i class="fas fa-play-circle text-indigo-500 text-xl"></i>
                    Tonton Video Penjelasan
                </a>
            </div>
            <!-- Decorative Icon -->
            <div class="absolute right-[-5%] bottom-[-5%] opacity-20 hidden lg:block animate-float">
                <i class="fas fa-globe text-[30rem]"></i>
            </div>
        </div>
    </header>

    <!-- Definition & Context -->
    <section class="container mx-auto px-4 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-extrabold mb-8 text-slate-900">Mengenal Cyberbullying</h2>
                <div class="space-y-6 text-lg text-slate-600 leading-relaxed">
                    <p>
                        Cyberbullying adalah <span class="text-indigo-600 font-bold italic">perundungan dengan menggunakan teknologi digital</span>. Hal ini dapat terjadi di media sosial, platform chatting, platform bermain game, dan ponsel.
                    </p>
                    <p>
                        Ini adalah perilaku berulang yang ditujukan untuk menakuti, membuat marah, atau mempermalukan mereka yang menjadi sasaran.
                    </p>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                            <i class="fas fa-exclamation-triangle text-amber-500"></i>
                            Dampaknya Nyata
                        </h4>
                        <p class="text-sm">Walaupun terjadi di dunia maya, dampaknya sangat terasa di dunia nyata mulai dari stres, depresi, hingga keinginan untuk menyakiti diri sendiri.</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-indigo-50 p-8 rounded-3xl border border-indigo-100 transform hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">💬</div>
                    <h3 class="font-bold text-xl mb-2 text-indigo-700">Harassment</h3>
                    <p class="text-sm text-indigo-600/80">Mengirim pesan kasar atau mengancam secara terus-menerus.</p>
                </div>
                <div class="bg-purple-50 p-8 rounded-3xl border border-purple-100 transform translate-y-8 hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">🎭</div>
                    <h3 class="font-bold text-xl mb-2 text-purple-700">Impersonation</h3>
                    <p class="text-sm text-purple-600/80">Menyamar jadi orang lain untuk merusak reputasi korban.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-3xl border border-blue-100 transform hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">🚫</div>
                    <h3 class="font-bold text-xl mb-2 text-blue-700">Exclusion</h3>
                    <p class="text-sm text-blue-600/80">Sengaja mengeluarkan seseorang dari grup online.</p>
                </div>
                <div class="bg-pink-50 p-8 rounded-3xl border border-pink-100 transform translate-y-8 hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">📢</div>
                    <h3 class="font-bold text-xl mb-2 text-pink-700">Outing</h3>
                    <p class="text-sm text-pink-600/80">Menyebarkan rahasia atau foto pribadi tanpa izin.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section id="video-materi" class="container mx-auto px-4 py-24 bg-slate-50 rounded-[3rem]">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6 px-4">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-extrabold mb-4">Simak Penjelasan Video</h2>
                    <p class="text-slate-600 text-lg">
                        Tonton video ini untuk lebih memahami apa itu cyberbullying dan bagaimana cara mengatasinya.
                    </p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-indigo-500 text-white px-6 py-3 rounded-full font-bold flex items-center gap-2">
                        <i class="fas fa-video"></i>
                        Video Edukasi
                    </div>
                </div>
            </div>
            
            <div class="video-container">
                <iframe 
                    src="https://www.youtube.com/embed/nzSKluKSQbE" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- Content Details -->
    <section class="container mx-auto px-4 py-24">
        <h2 class="text-4xl font-extrabold text-center mb-16">Apa yang Harus Dilakukan?</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100 hover:-translate-y-2 transition-transform">
                <div class="w-16 h-16 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                    <i class="fas fa-hand-paper"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Jangan Membalas</h3>
                <p class="text-slate-600 leading-relaxed">
                    Pelaku cyberbullying biasanya mencari reaksi. Dengan tidak membalas, kamu tidak memberikan apa yang mereka inginkan.
                </p>
            </div>
            <div class="bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100 hover:-translate-y-2 transition-transform">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                    <i class="fas fa-camera"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Simpan Bukti</h3>
                <p class="text-slate-600 leading-relaxed">
                    Screenshot semua pesan, komentar, atau postingan yang berisi bullying sebagi bukti jika nantinya diperlukan.
                </p>
            </div>
            <div class="bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100 hover:-translate-y-2 transition-transform">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Blokir & Laporkan</h3>
                <p class="text-slate-600 leading-relaxed">
                    Gunakan fitur blokir dan laporkan yang tersedia di platform tersebut untuk menghentikan aksi pelaku.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer Action -->
    <section class="container mx-auto px-4 pb-24">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-[3rem] p-12 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            <div class="relative z-10">
                <h2 class="text-4xl font-extrabold mb-6">Kamu Tidak Sendirian</h2>
                <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Jika kamu butuh tempat bercerita atau bantuan hukum, kami siap membantumu kapan saja.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('report.create') }}" class="bg-white text-indigo-600 px-10 py-5 rounded-2xl font-extrabold text-xl hover:bg-slate-50 transition-all shadow-2xl transform hover:-translate-y-1">
                        <i class="fas fa-paper-plane mr-2"></i> Lapor Sekarang
                    </a>
                    <a href="{{ route('consultation.index') }}" class="bg-black/20 backdrop-blur-md text-white border-2 border-white/30 px-10 py-5 rounded-2xl font-extrabold text-xl hover:bg-white/10 transition-all transform hover:-translate-y-1">
                        <i class="fas fa-comment-dots mr-2"></i> Konsultasi Rahasia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12 text-center text-slate-400 border-t border-slate-100">
        <p class="font-medium">&copy; 2024 StopBullying. Aman Berinternet, Bijak Bersosial.</p>
    </footer>
</body>
</html>
