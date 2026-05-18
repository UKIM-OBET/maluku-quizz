@extends('layouts.app')

@section('content')
<div class="mb-8">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-4xl font-bold text-[#0B6B63] m-0 mb-2">❓ Daftar Kuis</h1>
            <p class="text-gray-600 m-0">Pilih kuis untuk mulai mengerjakan soal-soal menarik</p>
        </div>
        <a class="btn-engage-primary px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg inline-flex items-center justify-center" href="/student/dashboard">← Kembali ke Dashboard</a>
    </div>
</div>

@if ($quizzes->isEmpty())
    <div class="text-center py-12">
        <div class="text-6xl mb-4">📭</div>
        <h3 class="text-2xl font-bold text-[#0B6B63] mb-2">Belum Ada Kuis</h3>
        <p class="text-gray-600 mb-6">Belum ada kuis tersedia. Hubungi guru untuk menambahkan kuis baru.</p>
        <a class="btn-engage-primary px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg inline-flex items-center justify-center gap-2" href="/student/dashboard">
            🏠 Kembali ke Dashboard
        </a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($quizzes as $quiz)
        <div class="card-engage bg-white rounded-3xl p-6 shadow-md border-l-4 border-[#FF6B35] list-item">
            <div class="flex justify-between items-start mb-3">
                <h3 class="text-xl font-bold text-[#0B6B63] m-0">{{ $quiz->title }}</h3>
                <span class="inline-block bg-gradient-to-r from-[#FF6B35] to-[#FF8555] text-white px-3 py-1 rounded-full text-sm font-bold">
                    {{ $quiz->questions_count }} soal
                </span>
            </div>

            <p class="text-gray-600 mb-4 text-sm leading-relaxed">{{ $quiz->description }}</p>

            <div class="bg-gradient-to-r from-[#EBF5F0] to-white rounded-2xl p-4 mb-4 border border-[#2F9E96] border-opacity-20">
                <div class="flex justify-between items-center">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-[#FF6B35]">{{ $quiz->points }}</div>
                        <div class="text-xs text-gray-600 font-semibold">POIN</div>
                    </div>
                    <div class="text-center border-l-2 border-[#2F9E96] border-opacity-30 px-4">
                        <div class="text-2xl font-bold text-[#0B6B63]">
                            @if ($quiz->questions_count > 15)
                                ⭐⭐⭐
                            @elseif ($quiz->questions_count > 10)
                                ⭐⭐
                            @elseif ($quiz->questions_count > 5)
                                ⭐
                            @else
                                ◆
                            @endif
                        </div>
                        <div class="text-xs text-gray-600 font-semibold">LEVEL</div>
                    </div>
                </div>
            </div>

            <a class="btn-engage-primary w-full px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-[#FF8555] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-300 hover:shadow-lg hover:shadow-[#FF6B35]/50 hover:-translate-y-0.5 inline-flex items-center justify-center gap-2" href="/student/quizzes/{{ $quiz->id }}">
                🚀 Mulai Mengerjakan
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-12 text-center">
        <div class="inline-block bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white rounded-3xl p-6 shadow-md">
            <p class="m-0 text-sm mb-2">📊 Total {{ $quizzes->count() }} kuis tersedia</p>
            <p class="m-0 font-bold text-lg">Selesaikan semua soal dengan baik untuk mendapatkan poin maksimal! 🎯</p>
        </div>
    </div>
@endif
@endsection
