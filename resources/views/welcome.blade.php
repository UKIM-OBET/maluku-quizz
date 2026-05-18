@extends('layouts.app')

@section('content')
<!-- Hero Section dengan Maluku pattern -->
<div class="hero-maluku min-h-96 rounded-4xl bg-gradient-to-r from-[#0B6B63] via-[#2F9E96] to-[#FF6B35] flex items-center justify-center mb-12 relative overflow-hidden shadow-lg" style="box-shadow: 0 20px 60px rgba(11, 107, 99, 0.3); animation: reveal 0.8s ease forwards;">
    <!-- Floating ornamental elements -->
    <div class="absolute top-10 left-10 text-6xl opacity-20 decoration-float">✦</div>
    <div class="absolute bottom-10 right-10 text-6xl opacity-20 decoration-float-reverse">✦</div>
    <div class="absolute top-1/2 left-1/4 text-5xl opacity-15 decoration-float" style="animation-delay: 1s;">◆</div>
    <div class="absolute bottom-1/3 right-1/3 text-5xl opacity-15 decoration-float-reverse" style="animation-delay: 2s;">◆</div>

    <div class="max-w-3xl text-white text-center relative z-10 px-6">
        <div class="mb-4 text-7xl">🏝️</div>
        <h1 class="mb-5 text-5xl font-black leading-tight uppercase" style="letter-spacing: 0.08em;">Selamat Datang di Maluku Quizz</h1>
        <p class="leading-relaxed mb-3 text-lg max-w-2xl mx-auto font-semibold">Jelajahi Keindahan Budaya Maluku Tengah</p>
        <p class="leading-relaxed mb-7 text-base max-w-2xl mx-auto opacity-95">Platform pembelajaran interaktif untuk guru dan murid. Pelajari budaya Maluku melalui kuis seru dan compete di leaderboard!</p>
        <div class="flex flex-wrap justify-center gap-4 mb-6">
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:scale-105">
                ✍️ Daftar Sekarang
            </a>
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white text-[#0B6B63] border-3 border-white rounded-full font-bold cursor-pointer no-underline transition-all duration-300 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-1 hover:shadow-2xl hover:scale-105">
                🔐 Masuk
            </a>
        </div>
        <!-- Decorative elements -->
        <div class="flex justify-center gap-4 text-2xl opacity-70">
            <span class="inline-block animate-bounce" style="animation-delay: 0s;">🎭</span>
            <span class="inline-block animate-bounce" style="animation-delay: 0.1s;">🏛️</span>
            <span class="inline-block animate-bounce" style="animation-delay: 0.2s;">🎨</span>
            <span class="inline-block animate-bounce" style="animation-delay: 0.3s;">🌺</span>
        </div>
    </div>
</div>

<!-- Features Section dengan ornamen Maluku -->
<div class="mb-6">
    <h2 class="text-center text-3xl font-black text-[#0B6B63] mb-2" style="letter-spacing: 0.05em;">🌟 Fitur Unggulan</h2>
    <div class="flex justify-center gap-2 mb-8">
        <span class="text-[#FF6B35] text-lg">✦</span>
        <span class="text-[#FF6B35] text-lg">◆</span>
        <span class="text-[#FF6B35] text-lg">✦</span>
    </div>
</div>

<div class="features grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-12">
    <!-- Feature 1 -->
    <div class="corner-ornament bg-white rounded-3xl p-7 shadow-md border-l-4 border-[#FF6B35] hover:shadow-xl transition-all duration-300 hover:scale-105 relative overflow-hidden" style="animation: reveal 0.8s ease forwards;">
        <!-- Top decorative line -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#FF6B35] via-[#0B6B63] to-[#FF6B35]"></div>
        <div class="text-4xl mb-3">📚</div>
        <h3 class="mt-0 text-[#0B6B63] font-bold text-lg mb-3">Informasi Budaya</h3>
        <p class="m-0 text-gray-700 leading-relaxed">Guru dapat mengelola konten budaya kaya dengan deskripsi detail tentang tradisi, seni, dan warisan Maluku Tengah yang indah.</p>
    </div>

    <!-- Feature 2 -->
    <div class="corner-ornament bg-white rounded-3xl p-7 shadow-md border-l-4 border-[#0B6B63] hover:shadow-xl transition-all duration-300 hover:scale-105 relative overflow-hidden" style="animation: reveal 0.8s ease forwards; animation-delay: 0.1s;">
        <!-- Top decorative line -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#0B6B63] via-[#FF6B35] to-[#0B6B63]"></div>
        <div class="text-4xl mb-3">❓</div>
        <h3 class="mt-0 text-[#0B6B63] font-bold text-lg mb-3">Quiz Interaktif</h3>
        <p class="m-0 text-gray-700 leading-relaxed">Murid mengerjakan kuis menarik untuk menguji dan memperdalam pemahaman tentang budaya, sejarah, dan keunikan Maluku.</p>
    </div>

    <!-- Feature 3 -->
    <div class="corner-ornament bg-white rounded-3xl p-7 shadow-md border-l-4 border-[#2F9E96] hover:shadow-xl transition-all duration-300 hover:scale-105 relative overflow-hidden" style="animation: reveal 0.8s ease forwards; animation-delay: 0.2s;">
        <!-- Top decorative line -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#2F9E96] via-[#FF6B35] to-[#2F9E96]"></div>
        <div class="text-4xl mb-3">🏆</div>
        <h3 class="mt-0 text-[#0B6B63] font-bold text-lg mb-3">Leaderboard Kompetisi</h3>
        <p class="m-0 text-gray-700 leading-relaxed">Nilai kuis ditampilkan di papan peringkat untuk mendorong motivasi belajar dan menciptakan persaingan sehat antar siswa.</p>
    </div>
</div>

<!-- About Maluku Section -->
<div class="bg-white rounded-3xl p-8 shadow-md border-2 border-[#0B6B63] mb-12 relative overflow-hidden" style="animation: reveal 0.8s ease forwards; animation-delay: 0.3s;">
    <!-- Corner decorations -->
    <div class="absolute top-4 right-4 text-5xl opacity-20">🏝️</div>
    <div class="absolute bottom-4 left-4 text-5xl opacity-20">🌺</div>

    <div class="relative z-10 max-w-3xl">
        <h2 class="text-2xl font-black text-[#0B6B63] mb-4 flex items-center gap-3" style="letter-spacing: 0.05em;">
            <span class="text-3xl">🏛️</span>
            Mengapa Maluku Penting?
        </h2>
        
        <p class="text-gray-700 mb-4 leading-relaxed">
            Maluku Tengah adalah salah satu pusat keberagaman budaya Indonesia yang kaya. Dengan sejarah maritim yang panjang dan tradisi yang unik, Maluku memiliki banyak aspek budaya yang layak dipelajari dan dilestarikan untuk generasi mendatang.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="flex gap-3">
                <span class="text-2xl flex-shrink-0">🎭</span>
                <div>
                    <h4 class="font-bold text-[#0B6B63] m-0">Seni & Tarian</h4>
                    <p class="m-0 text-sm text-gray-600">Tradisi tari dan pertunjukan yang memukau</p>
                </div>
            </div>
            <div class="flex gap-3">
                <span class="text-2xl flex-shrink-0">🎨</span>
                <div>
                    <h4 class="font-bold text-[#0B6B63] m-0">Kerajinan Tangan</h4>
                    <p class="m-0 text-sm text-gray-600">Batik dan tenun tradisional Maluku</p>
                </div>
            </div>
            <div class="flex gap-3">
                <span class="text-2xl flex-shrink-0">🌊</span>
                <div>
                    <h4 class="font-bold text-[#0B6B63] m-0">Maritim</h4>
                    <p class="m-0 text-sm text-gray-600">Sejarah pelayaran dan perdagangan rempah</p>
                </div>
            </div>
            <div class="flex gap-3">
                <span class="text-2xl flex-shrink-0">🍜</span>
                <div>
                    <h4 class="font-bold text-[#0B6B63] m-0">Kuliner</h4>
                    <p class="m-0 text-sm text-gray-600">Masakan khas dengan cita rasa autentik</p>
                </div>
            </div>
        </div>

        <p class="text-gray-700 leading-relaxed">
            Platform Maluku Quizz hadir untuk memastikan bahwa warisan budaya ini tetap hidup dan dikenal oleh generasi muda. Mari bersama-sama lestarikan dan apresiasi kekayaan budaya Maluku!
        </p>
    </div>
</div>

<!-- Call to Action Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
    <div class="card-with-ornament bg-gradient-to-br from-[#FF6B35] to-[#E84C1F] rounded-3xl p-8 text-white shadow-lg relative overflow-hidden">
        <div class="absolute -top-8 -right-8 text-9xl opacity-10">🎓</div>
        <div class="relative z-10">
            <h3 class="text-2xl font-black mb-3">Untuk Guru</h3>
            <p class="mb-4 leading-relaxed">Kelola konten budaya, buat kuis, dan pantau perkembangan murid dengan mudah di satu platform.</p>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#FF6B35] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:scale-105 hover:shadow-lg">
                Daftar Sebagai Guru
            </a>
        </div>
    </div>

    <div class="card-with-ornament bg-gradient-to-br from-[#0B6B63] to-[#124A43] rounded-3xl p-8 text-white shadow-lg relative overflow-hidden">
        <div class="absolute -top-8 -right-8 text-9xl opacity-10">📚</div>
        <div class="relative z-10">
            <h3 class="text-2xl font-black mb-3">Untuk Murid</h3>
            <p class="mb-4 leading-relaxed">Belajar budaya Maluku melalui kuis seru, kumpulkan poin, dan compete di leaderboard global.</p>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:scale-105 hover:shadow-lg">
                Daftar Sebagai Murid
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="divider-ornament"></div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="stat-box bg-white rounded-2xl p-6 text-center">
        <div class="text-4xl font-black text-[#FF6B35] mb-2">21+</div>
        <p class="m-0 text-[#0B6B63] font-bold">Konten Budaya</p>
        <p class="m-0 text-sm text-gray-600">Tema budaya menarik</p>
    </div>

    <div class="stat-box bg-white rounded-2xl p-6 text-center">
        <div class="text-4xl font-black text-[#0B6B63] mb-2">100+</div>
        <p class="m-0 text-[#0B6B63] font-bold">Pertanyaan Quiz</p>
        <p class="m-0 text-sm text-gray-600">Tingkat kesulitan bervariasi</p>
    </div>

    <div class="stat-box bg-white rounded-2xl p-6 text-center">
        <div class="text-4xl font-black text-[#2F9E96] mb-2">∞</div>
        <p class="m-0 text-[#0B6B63] font-bold">Pemelajar</p>
        <p class="m-0 text-sm text-gray-600">Bergabunglah dengan komunitas</p>
    </div>
</div>

@endsection
