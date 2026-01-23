<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apa itu Jejak Digital? - StopBullying</title>
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
            background-color: #06b6d4; /* Cyan-500 */
            background-image: 
                radial-gradient(at 0% 0%, hsla(180,75%,70%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(190,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(200,49%,30%,1) 0, transparent 50%);
        }
        .text-gradient {
            background: linear-gradient(to right, #06b6d4, #3b82f6);
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
            <a href="{{ route('content.teens') }}" class="flex items-center gap-2 text-slate-600 hover:text-cyan-600 transition-all font-bold group">
                <i class="fas fa-chevron-left transform group-hover:-translate-x-1 transition-transform"></i>
                <span>Kembali</span>
            </a>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-cyan-600 rounded-lg flex items-center justify-center text-white">
                    <i class="fas fa-fingerprint"></i>
                </div>
                <span class="font-extrabold text-xl tracking-tight">StopBullying<span class="text-cyan-600">.</span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="container mx-auto px-4 mt-8">
        <div class="hero-mesh rounded-[2.5rem] p-12 md:p-20 text-white relative overflow-hidden">
            <div class="relative z-10 max-w-3xl">
                <span class="bg-white/20 backdrop-blur-md px-4 py-1.5 rounded-full text-sm font-bold tracking-wider uppercase mb-6 inline-block">Materi Edukasi Remaja</span>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-8 leading-tight">Apa itu <span class="underline decoration-cyan-300">Jejak Digital?</span></h1>
                <p class="text-xl md:text-2xl text-white/80 leading-relaxed mb-10">
                    Setiap klik, like, dan komentar yang kamu bagikan meninggalkan jejak. Pahami dampaknya untuk masa depanmu.
                </p>
                <a href="#video-materi" class="bg-white text-slate-900 px-8 py-4 rounded-xl font-bold hover:bg-slate-100 transition-all shadow-xl hover:shadow-2xl inline-flex items-center gap-3">
                    <i class="fas fa-play-circle text-cyan-600 text-xl"></i>
                    Tonton Video Penjelasan
                </a>
            </div>
            <!-- Decorative Icon -->
            <div class="absolute right-[-5%] bottom-[-5%] opacity-20 hidden lg:block animate-float">
                <i class="fas fa-shoe-prints text-[30rem]"></i>
            </div>
        </div>
    </header>

    <!-- Definition & Context -->
    <section class="container mx-auto px-4 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-extrabold mb-8 text-slate-900">Mengenal Jejak Digital</h2>
                <div class="space-y-6 text-lg text-slate-600 leading-relaxed">
                    <p>
                        Jejak digital adalah <span class="text-cyan-600 font-bold italic">rekaman aktivitas online</span> yang kamu tinggalkan saat menggunakan internet. Ini termasuk foto yang kamu posting, komentar yang kamu tulis, dan bahkan situs yang kamu kunjungi.
                    </p>
                    <p>
                        Sekali sesuatu diunggah ke internet, akan sangat sulit untuk menghapusnya sepenuhnya. "Internet never forgets."
                    </p>
                    
                    <div class="bg-slate-50 p-6 rounded-2xl border-l-4 border-cyan-500 mt-8">
                        <h3 class="font-bold text-slate-900 text-xl mb-3">Cyberbullying Terekam!</h3>
                        <p>
                            Aktivitas <span class="font-bold text-red-500">Cyberbullying</span> juga merupakan bagian dari jejak digital. Komentar jahat, ancaman, atau penyebaran aib orang lain akan terekam dan bisa dilacak kembali kepadamu, bahkan jika kamu menggunakan akun anonim atau sudah menghapusnya.
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-slate-100 transform hover:scale-105 transition-all">
                    <div class="flex items-start gap-6">
                        <div class="bg-cyan-100 p-4 rounded-2xl text-cyan-600 text-3xl">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl mb-2 text-slate-900">Efek ke Masa Depan</h3>
                            <p class="text-slate-600">
                                Universitas dan perusahaan sering mengecek jejak digital calon mahasiswa atau karyawan. Reputasi online yang buruk bisa menghambat cita-citamu.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-slate-100 transform hover:scale-105 transition-all">
                    <div class="flex items-start gap-6">
                        <div class="bg-purple-100 p-4 rounded-2xl text-purple-600 text-3xl">
                            <i class="fas fa-history"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl mb-2 text-slate-900">Jejak Permanen</h3>
                            <p class="text-slate-600">
                                Screenshot bisa diambil dalam hitungan detik. Meskipun kamu menghapus postingan, salinannya mungkin masih ada di perangkat orang lain.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section id="video-materi" class="container mx-auto px-4 py-24 bg-slate-50 rounded-[3rem]">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6 px-4">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-extrabold mb-4">Etika di Dunia Digital</h2>
                    <p class="text-slate-600 text-lg">
                        Simak video berikut untuk memahami lebih dalam tentang etika berinteraksi di dunia digital dan pentingnya menjaga jejak digitalmu.
                    </p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-cyan-600 text-white px-6 py-3 rounded-full font-bold flex items-center gap-2">
                        <i class="fas fa-video"></i>
                        Video Edukasi
                    </div>
                </div>
            </div>
            
            <div class="video-container">
                <iframe 
                    src="https://www.youtube.com/embed/qNskX8A5I90?si=4XDaMSuqDczTTNb0" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="container mx-auto px-4 py-24">
        <h2 class="text-4xl font-extrabold text-center mb-16">Tips Mengelola Jejak Digital</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100 hover:-translate-y-2 transition-transform">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Think Before Post</h3>
                <p class="text-slate-600 leading-relaxed">
                    Pikirkan apakah postinganmu akan menyakiti orang lain atau merugikan dirimu sendiri di masa depan.
                </p>
            </div>
            <div class="bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100 hover:-translate-y-2 transition-transform">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Hati-hati di Chat dan Komentar</h3>
                <p class="text-slate-600 leading-relaxed">
                    Kata-kata tertulis bisa disalahartikan. Hindari bahasa kasar, gosip, atau candaan yang menyinggung di grup chat maupun kolom komentar.
                </p>
            </div>
            <div class="bg-white p-10 rounded-[2rem] shadow-xl border border-slate-100 hover:-translate-y-2 transition-transform">
                <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Bangun Jejak Positif</h3>
                <p class="text-slate-600 leading-relaxed">
                    Tunjukkan bakatmu, dukung temanmu, dan bagikan hal-hal inspiratif. Jadikan media sosial sebagai portofolio kebaikanmu.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer Action -->
    <section class="container mx-auto px-4 pb-24">
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 rounded-[3rem] p-12 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
            <div class="relative z-10">
                <h2 class="text-4xl font-extrabold mb-6">Mulai Bijak Bermedia Sosial</h2>
                <p class="text-xl text-white/80 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Masa depanmu dimulai dari apa yang kamu lakukan hari ini. Buat jejak digital yang positif dan membanggakan.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('content.teens') }}" class="bg-white text-cyan-600 px-10 py-5 rounded-2xl font-extrabold text-xl hover:bg-slate-50 transition-all shadow-2xl transform hover:-translate-y-1">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Menu
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
