@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <div>
        <h2 class="m-0 text-[#0B6B63] font-bold text-2xl">{{ $quiz->title }}</h2>
        <p class="m-0 text-gray-600 text-sm mt-1">Selesaikan semua soal dengan baik untuk mendapatkan poin maksimal! 🎯</p>
    </div>
    <a class="btn-engage-primary px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg inline-flex items-center justify-center" href="/student/quizzes">← Kembali</a>
</div>

@if ($quiz->questions->isEmpty())
    <div class="card-engage bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
        <p class="text-lg">📭 Belum ada soal untuk kuis ini. Silakan hubungi guru untuk menambahkan soal terlebih dahulu.</p>
        <a class="btn-engage-primary px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg inline-flex items-center justify-center mt-4" href="/student/quizzes">Kembali ke daftar kuis</a>
    </div>
@else
    <form method="POST" action="/student/quizzes/{{ $quiz->id }}" class="form-engage">
        @csrf

        @foreach ($quiz->questions as $question)
        <div class="card-engage bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65 mb-6 list-item">
            <h4 class="m-0 text-[#0B6B63] font-bold mb-4 text-lg">
                <span class="text-[#FF6B35] font-black">{{ $loop->iteration }}.</span> {{ $question->question }}
            </h4>
            @php
                $options = $question->options;
                if (! is_array($options)) {
                    $options = json_decode($options, true) ?: [];
                }
            @endphp
            
            <div class="mb-4">
                @foreach ($options as $option)
                    <label class="quiz-option">
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" class="mr-3" style="accent-color: #FF6B35;">
                        {{ $option }}
                    </label>
                @endforeach
            </div>

            <div class="mt-6 pt-6 border-t-2 border-[#0B6B63] border-opacity-20">
                <label class="block rounded-2xl border-2 border-[#0B6B63] p-4 cursor-pointer bg-[#EBF5F0] transition-all duration-300 font-medium hover:bg-white hover:border-[#FF6B35]">
                    <span class="font-bold text-[#0B6B63] block mb-2">✏️ Jawaban Manual (Opsional):</span>
                    <input type="text" name="answers_text[{{ $question->id }}]" value="{{ old('answers_text.' . $question->id) }}" placeholder="Tulis jawaban Anda di sini jika tidak memilih opsi..." class="w-full px-4 py-3 rounded-lg border-2 border-[#0B6B63] bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" />
                </label>
            </div>
        </div>
        @endforeach

        <!-- Progress indicator -->
        <div class="card-engage bg-white rounded-3xl p-6 shadow-md border border-white border-opacity-65 mb-6">
            <div class="flex items-center justify-between mb-3">
                <span class="font-bold text-[#0B6B63]">📊 Progres Pengerjaan</span>
                <span class="text-[#FF6B35] font-bold">{{ $quiz->questions->count() }} soal</span>
            </div>
            <div class="progress-container">
                <div class="progress-fill" style="width: 0%;"></div>
            </div>
            <p class="m-0 text-sm text-gray-600 mt-2">Jawab semua soal untuk mengirim kuis ✨</p>
        </div>

        <div class="flex gap-4">
            <button class="btn-engage-primary px-8 py-4 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg flex-1 inline-flex items-center justify-center gap-2" type="submit">
                <span>🚀 Kirim Jawaban</span>
            </button>
            <a class="btn-action px-8 py-4 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white inline-flex items-center justify-center gap-2" href="/student/quizzes">
                <span>← Batal</span>
            </a>
        </div>
    </form>
@endif
@endsection
