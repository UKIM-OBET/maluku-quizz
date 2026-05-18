@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Informasi Budaya</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/student/dashboard">Kembali</a>
</div>

@if ($cultures->isEmpty())
    <p>Belum ada informasi budaya tersedia saat ini.</p>
@else
    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($cultures as $culture)
        <div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65 hover:shadow-lg transition-shadow duration-200">
            @if ($culture->image)
                <img src="{{ $culture->image }}" alt="{{ $culture->title }}" class="w-full rounded-3xl object-cover max-h-48 mb-4">
            @endif
            <h3 class="mt-0 text-[#0B6B63] font-bold">{{ $culture->title }}</h3>
            <p>{{ $culture->summary }}</p>
            <details>
                <summary class="cursor-pointer font-bold text-[#0B6B63] hover:underline">Selengkapnya</summary>
                <p class="mt-3">{{ $culture->content }}</p>
            </details>
        </div>
        @endforeach
    </div>
@endif
@endsection
