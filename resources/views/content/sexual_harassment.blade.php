<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Pelecehan Seksual - StopBullying</title>
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
            background-color: #fca5a5;
            background-image: 
                radial-gradient(at 0% 0%, hsla(353,76%,75%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
        }
        .text-gradient {
            background: linear-gradient(to right, #ef4444, #3b82f6);
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
            <a href="{{ route('content.teens') }}" class="flex items-center gap-2 text-slate-600 hover:text-red-500 transition-all font-bold group">
                <i class="fas fa-chevron-left transform group-hover:-translate-x-1 transition-transform"></i>
                <span>Kembali</span>
            </a>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center text-white">
                    <i class="fas fa-shield-heart"></i>
                </div>
                <span class="font-extrabold text-xl tracking-tight">StopBullying<span class="text-red-500">.</span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="container mx-auto px-4 mt-8">
        <div class="hero-mesh rounded-[2.5rem] p-12 md:p-20 text-white relative overflow-hidden">
            <div class="relative z-10 max-w-3xl">
                <span class="bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-sm font-bold tracking-wider uppercase mb-6 inline-block">Materi Edukasi Remaja</span>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight">Mengenal & Mencegah <span class="underline decoration-red-400">Pelecehan Seksual</span></h1>
                <p class="text-xl md:text-2xl text-white/80 leading-relaxed mb-10">
                    Pengetahuan adalah perisai utamamu. Pahami batasan, kenali tanda-tandanya, dan beranikan diri untuk bertindak.
                </p>
                <a href="#video-materi" class="bg-white text-slate-900 px-8 py-4 rounded-xl font-bold hover:bg-slate-100 transition-all shadow-xl hover:shadow-2xl inline-flex items-center gap-3">
                    <i class="fas fa-play-circle text-red-500 text-xl"></i>
                    Tonton Video Materi
                </a>
            </div>
            <!-- Decorative Icon -->
            <div class="absolute right-[-5%] bottom-[-5%] opacity-20 hidden lg:block animate-float">
                <i class="fas fa-user-shield text-[30rem]"></i>
            </div>
        </div>
    </header>

    <!-- Definition & Context -->
    <section class="container mx-auto px-4 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-extrabold mb-8 text-slate-900">Apa itu Sebenarnya?</h2>
                <div class="space-y-6 text-lg text-slate-600 leading-relaxed">
                    <p>
                        Pelecehan seksual bukan hanya soal sentuhan fisik. Ini adalah <span class="text-red-600 font-bold italic">segala tindakan bersifat seksual</span> yang tidak kamu harapkan, tidak kamu inginkan, dan membuatmu merasa merasa rendah, terintimidasi, atau tidak aman.
                    </p>
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h4 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                            <i class="fas fa-info-circle text-blue-500"></i>
                            Kuncinya adalah PERSETUJUAN (Consent)
                        </h4>
                        <p class="text-sm">Jika kamu merasa tidak nyaman, itu sudah cukup menjadi alasan bahwa tindakan tersebut salah. Kamu memiliki hak penuh atas tubuh dan ruang pribadimu.</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-red-50 p-8 rounded-3xl border border-red-100 transform hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">📢</div>
                    <h3 class="font-bold text-xl mb-2 text-red-900 text-red-700">Lisan</h3>
                    <p class="text-sm text-red-600/80">Candaan kotor, siulan, atau godaan seksual.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-3xl border border-blue-100 transform translate-y-8 hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">📱</div>
                    <h3 class="font-bold text-xl mb-2 text-blue-700">Digital</h3>
                    <p class="text-sm text-blue-600/80">Kiriman pesan atau gambar tak senonoh via chat.</p>
                </div>
                <div class="bg-purple-50 p-8 rounded-3xl border border-purple-100 transform hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="font-bold text-xl mb-2 text-purple-700">Fisik</h3>
                    <p class="text-sm text-purple-600/80">Sentuhan paksa di area manapun di tubuhmu.</p>
                </div>
                <div class="bg-amber-50 p-8 rounded-3xl border border-amber-100 transform translate-y-8 hover:scale-105 transition-all">
                    <div class="text-4xl mb-4">👀</div>
                    <h3 class="font-bold text-xl mb-2 text-amber-700">Isyarat</h3>
                    <p class="text-sm text-amber-600/80">Tatapan mesum atau gestur tubuh yang menjijikkan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Deep Dive: Offline vs Online -->
    <section class="bg-slate-900 text-white py-24 rounded-[3rem] mx-4">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6">Penjabaran Jenis Pelecehan</h2>
                <div class="h-1.5 w-24 bg-red-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Offline -->
                <div class="bg-white/5 backdrop-blur-sm p-10 rounded-[2rem] border border-white/10 hover:bg-white/10 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 bg-orange-500/20 rounded-2xl flex items-center justify-center text-orange-500 text-2xl">
                            <i class="fas fa-street-view"></i>
                        </div>
                        <h3 class="text-2xl font-bold uppercase tracking-wide">Dunia Nyata (Offline)</h3>
                    </div>
                    <div class="space-y-6 text-white/70">
                        <div class="border-l-4 border-orange-500 pl-4">
                            <h4 class="text-white font-bold mb-1">Catcalling & Godaan</h4>
                            <p>Siulan di jalan atau komentar tentang bentuk tubuhmu saat kamu lewat.</p>
                        </div>
                        <div class="border-l-4 border-orange-500 pl-4">
                            <h4 class="text-white font-bold mb-1">Sentuhan Tanpa Izin</h4>
                            <p>Merangkul, menyentuh rambut, atau bagian tubuh lain meskipun kamu sudah menunjukkan rasa risi.</p>
                        </div>
                        <div class="border-l-4 border-orange-500 pl-4">
                            <h4 class="text-white font-bold mb-1">Eksibisionisme</h4>
                            <p>Orang yang sengaja mempertontonkan alat kelamin atau melakukan tindakan tak senonoh di depanmu.</p>
                        </div>
                    </div>
                </div>

                <!-- Online -->
                <div class="bg-white/5 backdrop-blur-sm p-10 rounded-[2rem] border border-white/10 hover:bg-white/10 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-14 h-14 bg-pink-500/20 rounded-2xl flex items-center justify-center text-pink-500 text-2xl">
                            <i class="fas fa-ghost"></i>
                        </div>
                        <h3 class="text-2xl font-bold uppercase tracking-wide">Dunia Digital (Online)</h3>
                    </div>
                    <div class="space-y-6 text-white/70">
                        <div class="border-l-4 border-pink-500 pl-4">
                            <h4 class="text-white font-bold mb-1">Cyber Flashing</h4>
                            <p>Menerima kiriman foto organ vital atau video porno secara tiba-tiba via DM atau Airdrop.</p>
                        </div>
                        <div class="border-l-4 border-pink-500 pl-4">
                            <h4 class="text-white font-bold mb-1">Sextortion</h4>
                            <p>Diancam bahwa foto pribadimu akan disebar jika kamu tidak menuruti kemauan pelaku.</p>
                        </div>
                        <div class="border-l-4 border-pink-500 pl-4">
                            <h4 class="text-white font-bold mb-1">Grooming</h4>
                            <p>Orang asing di internet yang sok baik namun perlahan-lahan mengarahkan pembicaraan ke arah seksual.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section id="video-materi" class="container mx-auto px-4 py-24">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-extrabold mb-4">Panduan Pelindung Diri</h2>
                    <p class="text-slate-600 text-lg">
                        Simak video panduan praktis tentang langkah-langkah yang harus kamu ambil jika berhadapan dengan bahaya kejahatan seksual.
                    </p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-red-500 text-white px-6 py-3 rounded-full font-bold flex items-center gap-2 animate-pulse">
                        <i class="fas fa-circle text-[8px]"></i>
                        Materi Penting
                    </div>
                </div>
            </div>
            
            <div class="video-container">
                <iframe 
                    src="https://www.youtube.com/embed/ftF24LJNFsI?rel=0&showinfo=0" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer Action -->
    <section class="container mx-auto px-4 pb-24">
        <div class="bg-gradient-to-r from-red-600 to-rose-600 rounded-[3rem] p-12 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            <div class="relative z-10">
                <h2 class="text-4xl font-extrabold mb-6">Kami Ada Untukmu</h2>
                <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Jangan pernah merasa bersalah atau malu. Jika kamu merasa terganggu, segera hubungi kami. Identitasmu akan kami jaga 100% aman.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('report.create') }}" class="bg-white text-red-600 px-10 py-5 rounded-2xl font-extrabold text-xl hover:bg-slate-50 transition-all shadow-2xl transform hover:-translate-y-1">
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
        <p class="font-medium">&copy; 2024 StopBullying. Indonesia Bebas Pelecehan.</p>
    </footer>
</body>
</html>
