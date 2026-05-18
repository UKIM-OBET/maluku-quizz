@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Progress Pengerjaan Siswa</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/teacher/dashboard">Kembali</a>
</div>

<div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    <div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
        <h3 class="mt-0 text-[#0B6B63] font-bold">Total Hasil</h3>
        <p>{{ $totalResults }}</p>
    </div>
    <div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
        <h3 class="mt-0 text-[#0B6B63] font-bold">Murid Aktif</h3>
        <p>{{ $uniqueStudents }}</p>
    </div>
    <div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
        <h3 class="mt-0 text-[#0B6B63] font-bold">Rata-rata Skor</h3>
        <p>{{ $averageScore }}</p>
    </div>
</div>

@if ($progress->isEmpty())
    <p>Belum ada hasil kuis yang tercatat. Ajak murid mengerjakan kuis untuk melihat progress.</p>
@else
    <div class="overflow-x-auto mt-5">
        <table class="w-full border-collapse min-w-96 bg-white rounded-2xl overflow-hidden border border-[#0B6B63] shadow-md">
            <thead>
                <tr class="bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white">
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Murid</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Kuis</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Skor</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($progress as $item)
                <tr class="border-b border-[#0B6B63] border-opacity-10 hover:bg-yellow-100">
                    <td class="p-4">{{ $item->user->name }}</td>
                    <td class="p-4">{{ $item->quiz->title }}</td>
                    <td class="p-4">{{ $item->score }}</td>
                    <td class="p-4">{{ $item->completed_at->format('d M Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
