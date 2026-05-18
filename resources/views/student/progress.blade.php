@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Progress Kuiz Saya</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="/student/dashboard">Kembali</a>
</div>

<div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
    <h3 class="mt-0 text-[#0B6B63] font-bold">Ringkasan Progress</h3>
    <p>Anda sudah mengerjakan <strong>{{ $attemptedQuizzes }}</strong> dari <strong>{{ $totalQuizzes }}</strong> kuis.</p>
    <p>Progres keseluruhan: <strong>{{ $progressPercent }}%</strong></p>
</div>

@if ($results->isEmpty())
    <div class="bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65 mt-5">
        <p>Belum ada hasil kuis yang tercatat. Silakan kerjakan kuis untuk melihat progress.</p>
        <a class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" href="/student/quizzes">Mulai Quiz</a>
    </div>
@else
    <div class="overflow-x-auto mt-5">
        <table class="w-full border-collapse min-w-96 bg-white rounded-2xl overflow-hidden border border-[#0B6B63] shadow-md">
            <thead>
                <tr class="bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white">
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Kuis</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Skor</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Terakhir Dikerjakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                <tr class="border-b border-[#0B6B63] border-opacity-10 hover:bg-yellow-100">
                    <td class="p-4">{{ $result->quiz->title }}</td>
                    <td class="p-4">{{ $result->score }}</td>
                    <td class="p-4">{{ is_object($result->completed_at) ? $result->completed_at->format('d M Y H:i') : \Illuminate\Support\Carbon::parse($result->completed_at)->format('d M Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
