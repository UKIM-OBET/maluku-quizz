@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Tambah Soal Kuis: {{ $quiz->title }}</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/teacher/quizzes/{{ $quiz->id }}/questions">Kembali</a>
</div>

<div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
    <form method="POST" action="/teacher/quizzes/{{ $quiz->id }}/questions">
        @csrf

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Pertanyaan</label>
        <textarea name="question" rows="3" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>{{ old('question') }}</textarea>

        @for ($i = 0; $i < 4; $i++)
            <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Opsi {{ $i + 1 }}</label>
            <input type="text" name="options[]" value="{{ old('options.' . $i) }}" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>
        @endfor

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Jawaban Benar</label>
        <select name="answer_index" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>
            <option value="">Pilih jawaban benar</option>
            @for ($i = 0; $i < 4; $i++)
                <option value="{{ $i }}" @if(old('answer_index') == $i) selected @endif>
                    {{ old('options.' . $i) ?: 'Opsi '.($i + 1) }}
                </option>
            @endfor
        </select>

        <button class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" type="submit">Simpan Soal</button>
    </form>
</div>
@endsection