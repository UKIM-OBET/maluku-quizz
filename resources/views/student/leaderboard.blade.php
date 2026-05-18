@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Leaderboard Poin Siswa</h2>
    <div class="flex gap-3">
        <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/student/progress">Progress</a>
        <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/student/dashboard">Kembali</a>
    </div>
</div>

<div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
    <h3 class="mt-0 text-[#0B6B63] font-bold">Statistik Saya</h3>
    <p>Total Poin: <strong>{{ $student->total_points }}</strong></p>
    <p>Telah mengerjakan {{ $attemptedQuizzes }} dari {{ $totalQuizzes }} kuis. Progres Anda: {{ $progressPercent }}%.</p>

    @if ($studentResults->isEmpty())
        <p>Belum ada hasil kuis yang tercatat untuk akun Anda.</p>
    @else
        <div class="overflow-x-auto mt-5">
            <table class="w-full border-collapse min-w-96 bg-white rounded-2xl overflow-hidden border border-[#0B6B63] shadow-md">
                <thead>
                    <tr class="bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white">
                        <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Kuis</th>
                        <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Skor</th>
                        <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Poin yang Diperoleh</th>
                        <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentResults as $result)
                    <tr class="border-b border-[#0B6B63] border-opacity-10 hover:bg-yellow-100">
                        <td class="p-4">{{ $result->quiz->title }}</td>
                        <td class="p-4">{{ $result->score }}</td>
                        <td class="p-4"><strong>{{ $result->points_awarded }}</strong></td>
                        <td class="p-4">{{ is_object($result->completed_at) ? $result->completed_at->format('d M Y H:i') : \Illuminate\Support\Carbon::parse($result->completed_at)->format('d M Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="mt-8">
    <h3 class="m-0 text-[#0B6B63] font-bold mb-5">Papan Peringkat (Top 20 Siswa)</h3>
</div>

@if ($ranking->isEmpty())
    <p>Belum ada siswa yang mengerjakan kuis.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full border-collapse min-w-96 bg-white rounded-2xl overflow-hidden border border-[#0B6B63] shadow-md">
            <thead>
                <tr class="bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white">
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Peringkat</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Nama Siswa</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Total Poin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ranking as $item)
                <tr @if($item->id === $student->id) class="bg-yellow-200 font-bold" @else class="border-b border-[#0B6B63] border-opacity-10 hover:bg-yellow-100" @endif>
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td class="p-4">{{ $item->name }}</td>
                    <td class="p-4">{{ $item->total_points }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
