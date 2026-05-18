@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="flex items-center justify-between flex-wrap gap-3 mb-8">
    <div>
        <h1 class="text-4xl font-bold text-[#0B6B63] m-0 mb-2">🏛️ Pameran Budaya Maluku Tengah</h1>
        <p class="text-gray-600 m-0">Jelajahi Kekayaan Budaya & Raih Poin Melalui Quiz Interaktif</p>
    </div>
    <form method="POST" action="/logout" class="inline">
        @csrf
        <button class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg">🚪 Logout</button>
    </form>
</div>

<!-- Stats Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="card-engage bg-gradient-to-br from-[#EBF5F0] to-white rounded-3xl p-6 shadow-md border-l-4 border-[#0B6B63]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 m-0">Materi Budaya</p>
                <h3 class="text-3xl font-bold text-[#0B6B63] m-0">{{ $cultures }}</h3>
                <p class="text-xs text-gray-500 m-0 mt-1">Topik untuk dipelajari</p>
            </div>
            <div class="text-5xl">📚</div>
        </div>
    </div>

    <div class="card-engage bg-gradient-to-br from-[#FFE4D4] to-white rounded-3xl p-6 shadow-md border-l-4 border-[#FF6B35]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 m-0">Quiz Tersedia</p>
                <h3 class="text-3xl font-bold text-[#FF6B35] m-0">{{ $quizzes ?? '0' }}</h3>
                <p class="text-xs text-gray-500 m-0 mt-1">Latihan interaktif</p>
            </div>
            <div class="text-5xl">❓</div>
        </div>
    </div>

    <div class="card-engage bg-gradient-to-br from-[#E8F4F1] to-white rounded-3xl p-6 shadow-md border-l-4 border-[#2F9E96]">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 m-0">Total Poin</p>
                <h3 class="text-3xl font-bold text-[#2F9E96] m-0">{{ $totalPoints ?? '0' }}</h3>
                <p class="text-xs text-gray-500 m-0 mt-1">Dari jawaban benar</p>
            </div>
            <div class="text-5xl">⭐</div>
        </div>
    </div>
</div>

<!-- Cultural Showcase Gallery -->
<div class="mb-8">
    <h2 class="text-2xl font-bold text-[#0B6B63] mb-6 flex items-center gap-2">
        👘 <span>Pakaian Daerah Tradisional</span>
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Baju Adat Items -->
        <a href="https://www.google.com/search?q=Baju+Caci+Maluku+Tengah+pakaian+adat" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#FF6B35] to-[#FF8555] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                👘
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Baju Caci</h4>
                <p class="text-sm text-gray-600 m-0">Pakaian adat tradisional pria Maluku Tengah</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Baju+Kebaya+Maluku+pakaian+tradisional" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#FF6B35] to-[#FF8555] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🌸
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Baju Kebaya</h4>
                <p class="text-sm text-gray-600 m-0">Pakaian tradisional wanita yang elegan</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Kain+Tenun+Maluku+tradisional" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#0B6B63] to-[#2F9E96] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🧵
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Kain Tenun</h4>
                <p class="text-sm text-gray-600 m-0">Kain tradisional hasil tenun tangan</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Topi+Adat+Maluku+mahkota+tradisional" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#FF6B35] to-[#FF8555] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🎩
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Topi Adat</h4>
                <p class="text-sm text-gray-600 m-0">Mahkota tradisional untuk acara khusus</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>
    </div>
</div>

<!-- Animals Section -->
<div class="mb-8">
    <h2 class="text-2xl font-bold text-[#0B6B63] mb-6 flex items-center gap-2">
        🦜 <span>Fauna Khas Maluku Tengah</span>
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="https://www.google.com/search?q=Burung+Cendrawasih+Maluku+langka" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#2F9E96] to-[#0B6B63] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🦜
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Burung Cendrawasih</h4>
                <p class="text-sm text-gray-600 m-0">Burung langka dengan bulu indah Maluku</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Ikan+Bawal+Maluku+perairan" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#FF6B35] to-[#FF8555] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🐠
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Ikan Bawal</h4>
                <p class="text-sm text-gray-600 m-0">Ikan yang melimpah di perairan Maluku</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Komodo+reptil+langka+Indonesia" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#0B6B63] to-[#2F9E96] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🦎
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Komodo</h4>
                <p class="text-sm text-gray-600 m-0">Reptil langka endemik Indonesia</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Kerang+Mutiara+Maluku" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#FF6B35] to-[#FF8555] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🐚
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Kerang Mutiara</h4>
                <p class="text-sm text-gray-600 m-0">Sumber mutiara berkualitas tinggi</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>
    </div>
</div>

<!-- Traditional Houses Section -->
<div class="mb-8">
    <h2 class="text-2xl font-bold text-[#0B6B63] mb-6 flex items-center gap-2">
        🏠 <span>Rumah Adat Tradisional</span>
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <a href="https://www.google.com/search?q=Rumah+Baileo+Maluku+tradisional" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#0B6B63] to-[#2F9E96] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🏘️
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Rumah Baileo</h4>
                <p class="text-sm text-gray-600 m-0">Rumah bergonjong tradisional masyarakat Maluku</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Rumah+Adat+Ternate+Kesultanan" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#FF6B35] to-[#FF8555] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🏛️
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Rumah Adat Ternate</h4>
                <p class="text-sm text-gray-600 m-0">Arsitektur khas Kesultanan Ternate</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>

        <a href="https://www.google.com/search?q=Rumah+Adat+Tidore+tradisional" target="_blank" rel="noopener noreferrer" class="card-engage bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 list-item no-underline">
            <div class="bg-gradient-to-br from-[#2F9E96] to-[#0B6B63] h-40 flex items-center justify-center text-6xl hover:scale-110 transition-transform duration-300">
                🎋
            </div>
            <div class="p-4">
                <h4 class="font-bold text-[#0B6B63] m-0 mb-1 hover:underline">Rumah Adat Tidore</h4>
                <p class="text-sm text-gray-600 m-0">Rumah tradisional dengan tiang kayu tegak</p>
                <p class="text-xs text-[#FF6B35] m-0 mt-2 font-bold">🔗 Cari di Google</p>
            </div>
        </a>
    </div>
</div>

<!-- Footer Info -->
<div class="text-center bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white rounded-3xl p-8 mb-6">
    <p class="text-lg font-semibold m-0 mb-2">🎓 Jelajahi Budaya Maluku Tengah & Raih Poin!</p>
    <p class="text-sm m-0">Setiap pembelajaran dan quiz berhasil akan menambah poin Anda. Naik ke leaderboard!</p>
</div>
@endsection
