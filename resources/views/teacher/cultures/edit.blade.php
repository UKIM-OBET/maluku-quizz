@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Edit Informasi Budaya</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="{{ route('teacher.cultures.index') }}">Kembali</a>
</div>

<div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
    <form method="POST" action="{{ route('teacher.cultures.update', $culture) }}">
        @csrf
        @method('PATCH')

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Judul</label>
        <input type="text" name="title" value="{{ old('title', $culture->title) }}" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Ringkasan</label>
        <input type="text" name="summary" value="{{ old('summary', $culture->summary) }}" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Konten Budaya</label>
        <textarea name="content" rows="6" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" required>{{ old('content', $culture->content) }}</textarea>

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Link Gambar (opsional)</label>
        <input type="url" name="image" value="{{ old('image', $culture->image) }}" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]">

        <button class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" type="submit">Perbarui</button>
    </form>
</div>
@endsection
