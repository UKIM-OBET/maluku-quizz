@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Edit Kuis</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/teacher/quizzes">Kembali</a>
</div>

<div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
    <form method="POST" action="/teacher/quizzes/{{ $quiz->id }}">
        @csrf
        @method('PATCH')

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Judul Kuis</label>
        <input type="text" name="title" value="{{ old('title', $quiz->title) }}" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Deskripsi Kuis</label>
        <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>{{ old('description', $quiz->description) }}</textarea>

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Poin Kuis</label>
        <input type="number" name="points" value="{{ old('points', $quiz->points) }}" min="0" max="10000" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>
        <small class="text-sm text-[#0B6B63] mb-4 block">Poin ini akan diberikan kepada siswa berdasarkan persentase jawaban benar mereka.</small>

        <button class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" type="submit">Perbarui Kuis</button>
    </form>
</div>
@endsection