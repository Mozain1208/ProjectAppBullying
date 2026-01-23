<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis: Apakah Aku Di-bully? - StopBullying Anak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .quiz-card { transition: all 0.3s ease; }
        .hidden { display: none; }
    </style>
</head>
<body class="bg-orange-50 min-h-screen">
    <!-- Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('content.children') }}" class="flex items-center space-x-2 text-orange-600 hover:text-orange-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span class="font-bold">Kembali</span>
                </a>
                <span class="text-gray-400 font-medium text-sm">Deteksi Bullying</span>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            
            <!-- Explanation Section -->
            <div id="intro-section" class="bg-white rounded-3xl shadow-xl p-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Apakah Kamu Benar-benar Di-bully?</h1>
                <div class="space-y-4 text-gray-600 leading-relaxed text-lg">
                    <p>
                        Halo teman-teman! Terkadang kita bingung, apakah teman kita cuma sedang <strong class="text-orange-600">bersikap jahat</strong> sesaat, atau dia benar-benar melakukan <strong class="text-red-600">bullying</strong>.
                    </p>
                    <div class="grid md:grid-cols-2 gap-6 my-6">
                        <div class="bg-green-50 p-6 rounded-2xl border-2 border-green-100">
                            <h3 class="font-bold text-green-700 mb-2">Orang Jahat/Enggak Baik</h3>
                            <p class="text-sm">Biasanya terjadi sekali-sekali, mungkin karena mereka sedang marah atau lelah, dan mereka merasa menyesal setelahnya.</p>
                        </div>
                        <div class="bg-red-50 p-6 rounded-2xl border-2 border-red-100">
                            <h3 class="font-bold text-red-700 mb-2">Bullying</h3>
                            <p class="text-sm">Terjadi terus-menerus, sengaja ingin menyakiti, dan orang itu merasa lebih kuat dari kamu.</p>
                        </div>
                    </div>
                    <p class="text-center italic">Ayo ikuti kuis ini untuk membantu kamu mencari tahu!</p>
                </div>
                <div class="mt-8 text-center">
                    <button onclick="startQuiz()" class="bg-orange-600 text-white px-10 py-4 rounded-full font-bold text-xl hover:bg-orange-700 transition shadow-lg transform hover:scale-105">
                        Mulai Kuis
                    </button>
                </div>
            </div>

            <!-- Quiz Section -->
            <div id="quiz-section" class="bg-white rounded-3xl shadow-xl p-8 mb-8 hidden">
                <div class="mb-4 flex justify-between items-center text-sm font-bold text-orange-600">
                    <span id="question-number">Pertanyaan 1 dari 10</span>
                    <span id="progress-text">10%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2 mb-8">
                    <div id="progress-bar" class="bg-orange-500 h-2 rounded-full transition-all duration-300" style="width: 10%"></div>
                </div>

                <div id="question-container" class="min-h-[200px] flex items-center justify-center text-center">
                    <h2 id="question-text" class="text-2xl font-bold text-gray-800 leading-tight"></h2>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-12">
                    <button onclick="handleAnswer(true)" class="bg-red-500 text-white py-6 rounded-2xl font-bold text-xl hover:bg-red-600 transition shadow-md">
                        YA
                    </button>
                    <button onclick="handleAnswer(false)" class="bg-green-500 text-white py-6 rounded-2xl font-bold text-xl hover:bg-green-600 transition shadow-md">
                        TIDAK
                    </button>
                </div>
            </div>

            <!-- Result Section -->
            <div id="result-section" class="bg-white rounded-3xl shadow-xl p-10 text-center hidden">
                <div id="result-icon" class="mb-6"></div>
                <h2 id="result-title" class="text-3xl font-bold mb-4"></h2>
                <div id="result-description" class="text-gray-600 text-lg mb-8"></div>
                
                <div class="space-y-4">
                    <a href="{{ route('report.create') }}" id="btn-report" class="block bg-orange-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-orange-700 transition shadow-lg hidden">
                        Laporkan Sekarang
                    </a>
                    <a href="{{ route('content.children') }}" class="block bg-gray-100 text-gray-700 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-200 transition">
                        Kembali ke Menu Utama
                    </a>
                </div>
            </div>

        </div>
    </main>

    <script>
        const questions = [
            "Apakah orang tersebut menyakitimu lebih dari satu kali?",
            "Apakah kamu merasa orang itu lebih kuat atau punya kekuasaan lebih darimu?",
            "Apakah orang tersebut sengaja ingin membuatmu sedih atau marah?",
            "Apakah kamu merasa takut untuk bertemu orang tersebut?",
            "Apakah orang itu mengajak teman-teman lain untuk menjauhimu?",
            "Apakah orang itu tetap melakukannya meskipun kamu sudah memintanya berhenti?",
            "Apakah kamu merasa tidak berdaya untuk melawan atau menghentikannya?",
            "Apakah orang itu mengejek fisikmu atau namamu berkali-kali?",
            "Apakah orang itu merusak atau mengambil barang-barangmu dengan sengaja?",
            "Apakah hal ini membuatmu jadi tidak ingin pergi ke sekolah atau bermain?"
        ];

        let currentQuestion = 0;
        let score = 0;

        function startQuiz() {
            document.getElementById('intro-section').classList.add('hidden');
            document.getElementById('quiz-section').classList.remove('hidden');
            showQuestion();
        }

        function showQuestion() {
            document.getElementById('question-text').innerText = questions[currentQuestion];
            document.getElementById('question-number').innerText = `Pertanyaan ${currentQuestion + 1} dari ${questions.length}`;
            const progress = ((currentQuestion + 1) / questions.length) * 100;
            document.getElementById('progress-bar').style.width = `${progress}%`;
            document.getElementById('progress-text').innerText = `${progress}%`;
        }

        function handleAnswer(isYes) {
            if (isYes) score++;
            
            currentQuestion++;
            
            if (currentQuestion < questions.length) {
                showQuestion();
            } else {
                showResult();
            }
        }

        function showResult() {
            document.getElementById('quiz-section').classList.add('hidden');
            const resultSection = document.getElementById('result-section');
            resultSection.classList.remove('hidden');
            
            const title = document.getElementById('result-title');
            const desc = document.getElementById('result-description');
            const icon = document.getElementById('result-icon');
            const btnReport = document.getElementById('btn-report');
            
            if (score >= 7) {
                icon.innerHTML = `<div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto text-red-600">
                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                </div>`;
                title.innerText = "Terindikasi Bullying";
                title.classList.add('text-red-600');
                desc.innerHTML = `Kamu menjawab <strong>${score} dari 10</strong> pertanyaan dengan "YA". <br><br> Ini menunjukkan bahwa apa yang kamu alami kemungkinan besar adalah bullying. Jangan takut, kamu tidak sendirian. Sebaiknya kamu segera melapor atau bercerita ke orang dewasa yang kamu percaya.`;
                btnReport.classList.remove('hidden');
            } else {
                icon.innerHTML = `<div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto text-green-600">
                    <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                </div>`;
                title.innerText = "Bukan Bullying (Mungkin Hanya Bersikap Buruk)";
                title.classList.add('text-green-600');
                desc.innerHTML = `Kamu menjawab <strong>${score} dari 10</strong> pertanyaan dengan "YA". <br><br> Sepertinya orang tersebut hanya sedang bersikap tidak baik atau jahat padamu saat ini (tidak terus-menerus). Cobalah untuk membicarakannya baik-baik atau jika tetap merasa tidak nyaman, tetap bercerita ke orang tua atau guru ya!`;
                btnReport.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
