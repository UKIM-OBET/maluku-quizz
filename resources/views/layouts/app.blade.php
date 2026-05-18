<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maluku Quizz</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/maluku-decorations.css') }}">
</head>
<body class="font-sans text-[#0B6B63] bg-gradient-to-b from-[#EBF5F0] to-[#B8D8CF] min-h-screen overflow-x-hidden"
      style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22><defs><pattern id=%22m%22 x=%220%22 y=%220%22 width=%22200%22 height=%22200%22 patternUnits=%22userSpaceOnUse%22><rect width=%22200%22 height=%22200%22 fill=%22transparent%22/><g opacity=%220.08%22 stroke=%22%230B6B63%22 stroke-width=%221%22 fill=%22none%22><polygon points=%2250,20 100,80 0,80%22/><polygon points=%22150,20 200,80 100,80%22/><polygon points=%2250,120 100,180 0,180%22/><polygon points=%22150,120 200,180 100,180%22/></g></pattern></defs><rect width=%22200%22 height=%22200%22 fill=%22url(%23m)%22/></svg>'); background-size: 200px 200px, 100%; background-attachment: fixed;">
    
    <!-- Page Layer Overlay dengan gradien Maluku -->
    <div class="page-layer fixed inset-0 pointer-events-none" style="background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.16), transparent 32%), radial-gradient(circle at 80% 15%, rgba(255, 255, 255, 0.12), transparent 30%), linear-gradient(180deg, rgba(255, 255, 255, 0.05), transparent 65%);"></div>

    <!-- Topbar dengan ornamen tradisional -->
    <header class="topbar relative z-10 bg-gradient-to-r from-[#0B6B63] to-[#124A43] text-white py-4 shadow-lg" style="box-shadow: 0 6px 30px rgba(11, 107, 99, 0.2);">
        <!-- Decorative line top -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#FF6B35] via-[#0B6B63] to-[#FF6B35]"></div>
        <div class="w-fit max-w-[1120px] mx-auto px-4 flex items-center justify-between gap-3">
            <a href="/" class="text-2xl font-black text-[#FF6B35] no-underline" style="letter-spacing: 0.08em;">🏝️ Maluku Quizz</a>
            <div class="flex items-center gap-4">
                @if (session('user_id'))
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="bg-transparent border-none text-white cursor-pointer font-bold hover:underline transition-all">Logout</button>
                    </form>
                @else
                    <a href="/login" class="text-white font-bold no-underline hover:opacity-90 transition-opacity">Masuk</a>
                    <a href="/register" class="text-white font-bold no-underline hover:opacity-90 transition-opacity">Daftar</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Main Layout -->
    <div class="flex gap-7 items-start py-6">
        @if (session('user_id'))
            <!-- Sidebar dengan ornamen Maluku -->
            <aside class="w-80 bg-gradient-to-b from-white to-[#EBF5F0] rounded-3xl shadow-lg p-6 sticky top-24 self-start border-2 border-[#0B6B63] relative overflow-hidden" style="box-shadow: 0 18px 50px rgba(11, 107, 99, 0.12);">
                <!-- Decorative top border -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#FF6B35] via-[#0B6B63] to-[#2F9E96]"></div>
                
                <div class="relative z-10">
                    <h2 class="m-0 mb-6 text-lg text-[#0B6B63] font-black uppercase" style="letter-spacing: 0.04em;">📋 Menu Utama</h2>
                    <nav class="flex flex-col gap-0">
                        <a href="{{ session('user_role') === 'guru' ? route('teacher.dashboard') : route('student.dashboard') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">🎯 Dashboard</a>
                        @if (session('user_role') === 'guru')
                            <a href="{{ route('teacher.cultures.index') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">🏛️ Kelola Budaya</a>
                            <a href="{{ route('teacher.quizzes.index') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">✏️ Kelola Kuis</a>
                            <a href="{{ route('teacher.progress') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">📊 Progress Murid</a>
                        @else
                            <a href="{{ route('student.cultures') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">🏛️ Budaya</a>
                            <a href="{{ route('student.quizzes') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">❓ Kuis</a>
                            <a href="{{ route('student.leaderboard') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">🏆 Leaderboard</a>
                            <a href="{{ route('student.progress') }}" class="block px-4 py-3 mb-3 rounded-3xl bg-[#EBF5F0] text-[#0B6B63] no-underline font-bold transition-all duration-200 border-2 border-transparent hover:bg-gradient-to-r hover:from-[#0B6B63] hover:to-[#2F9E96] hover:text-white hover:translate-x-1 hover:border-[#FF6B35]">📈 Progress</a>
                        @endif
                    </nav>
                </div>
            </aside>
        @endif

        <!-- Content Area -->
        <div class="flex-1 max-w-7xl mx-auto px-4">
            <main>
                @if (session('success'))
                    <div class="p-5 rounded-2xl mb-7 border-l-4 border-[#FF6B35] flex items-center gap-4 font-medium text-lg bg-gradient-to-r from-[#2F9E96] to-[#0B6B63] text-white shadow-lg" style="animation: slideDown 0.4s ease-out;">
                        <span class="text-2xl font-bold">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="p-5 rounded-2xl mb-7 border-l-4 border-[#0B6B63] flex items-center gap-4 font-medium text-lg bg-gradient-to-r from-[#FF6B35] to-[#E84C1F] text-white shadow-lg" style="animation: slideDown 0.4s ease-out;">
                        <span class="text-2xl font-bold">✕</span>
                        <ul class="m-0 p-0 list-none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer dengan ornamen tradisional Maluku -->
    <footer class="relative bg-gradient-to-r from-[#0B6B63] via-[#2F9E96] to-[#0B6B63] py-12 border-t-4 border-[#FF6B35] text-white mt-12 overflow-hidden">
        <!-- Decorative background pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22><line x1=%220%22 y1=%220%22 x2=%22100%22 y2=%22100%22 stroke=%22white%22 stroke-width=%221%22/><line x1=%22100%22 y1=%220%22 x2=%220%22 y2=%22100%22 stroke=%22white%22 stroke-width=%221%22/></svg>'); background-size: 50px 50px;"></div>

        <!-- Top decorative line with Maluku pattern -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-repeating-gradient" style="background: repeating-linear-gradient(90deg, #FF6B35 0, #FF6B35 8px, white 8px, white 16px);"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Main footer content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Branding column -->
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-black text-[#FF6B35] mb-2" style="letter-spacing: 0.08em;">🏝️ MALUKU QUIZZ</h3>
                    <p class="text-[#EBF5F0] text-sm">Platform pembelajaran budaya Maluku Tengah untuk generasi muda</p>
                </div>

                <!-- Info column -->
                <div class="text-center">
                    <h4 class="text-lg font-bold text-white mb-3 border-b-2 border-[#FF6B35] pb-2 inline-block">📍 Tentang</h4>
                    <p class="text-[#EBF5F0] text-sm leading-relaxed">Sebuah aplikasi interaktif untuk mengenali dan memahami kekayaan budaya tradisional Maluku Tengah melalui kuis yang menarik dan edukatif.</p>
                </div>

                <!-- Links column -->
                <div class="text-center md:text-right">
                    <h4 class="text-lg font-bold text-white mb-3 border-b-2 border-[#FF6B35] pb-2 inline-block">🔗 Tautan</h4>
                    <ul class="list-none p-0 m-0 space-y-1">
                        <li><a href="/" class="text-[#EBF5F0] no-underline hover:text-[#FF6B35] transition-colors">🏠 Beranda</a></li>
                        <li><a href="/login" class="text-[#EBF5F0] no-underline hover:text-[#FF6B35] transition-colors">🔐 Masuk</a></li>
                        <li><a href="/register" class="text-[#EBF5F0] no-underline hover:text-[#FF6B35] transition-colors">📝 Daftar</a></li>
                    </ul>
                </div>
            </div>

            <!-- Divider dengan motif -->
            <div class="my-6 h-0.5 bg-gradient-to-r from-transparent via-[#FF6B35] to-transparent opacity-50"></div>

            <!-- Bottom footer text -->
            <div class="text-center">
                <!-- Ornamental decorative line -->
                <div class="mb-4 flex items-center justify-center gap-3">
                    <span class="text-[#FF6B35] text-lg">✦</span>
                    <p class="m-0 text-[#EBF5F0] font-medium">© 2026 Maluku Quizz - Pengenalan Budaya Maluku Tengah</p>
                    <span class="text-[#FF6B35] text-lg">✦</span>
                </div>

                <!-- Cultural tagline -->
                <p class="m-0 text-[#B8D8CF] text-xs" style="letter-spacing: 0.05em;">Melestarikan Warisan Budaya • Membangun Generasi Berpengetahuan • Mencintai Tradisi</p>
            </div>
        </div>

        <!-- Bottom decorative line -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-repeating-gradient" style="background: repeating-linear-gradient(90deg, white 0, white 8px, #FF6B35 8px, #FF6B35 16px);"></div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/animations.js') }}"></script>
    <style>
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Additional Maluku-themed animations */
        @keyframes shimmer {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 1; }
        }

        .maluku-shimmer {
            animation: shimmer 3s ease-in-out infinite;
        }

        /* Decorative ornament styling */
        .ornament {
            display: inline-block;
            color: #FF6B35;
            font-size: 1.2rem;
            margin: 0 0.5rem;
            animation: shimmer 2s ease-in-out infinite;
        }
    </style>
</body>
</html>
