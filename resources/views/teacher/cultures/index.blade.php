@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between flex-wrap gap-3 mb-5">
    <h2 class="m-0 text-[#0B6B63] font-bold">Kelola Informasi Budaya</h2>
    <a class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" href="{{ route('teacher.cultures.create') }}">Tambah Budaya</a>
</div>

@if ($cultures->isEmpty())
    <p>Belum ada data budaya. Tambahkan informasi budaya baru untuk murid.</p>
@else
    <div class="overflow-x-auto">
        <table class="w-full border-collapse min-w-96 bg-white rounded-2xl overflow-hidden border border-[#0B6B63] shadow-md">
            <thead>
                <tr class="bg-gradient-to-r from-[#0B6B63] to-[#2F9E96] text-white">
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Judul</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Ringkasan</th>
                    <th class="text-left p-4 font-bold uppercase text-sm" style="letter-spacing: 0.05em;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cultures as $culture)
                <tr class="border-b border-[#0B6B63] border-opacity-10 hover:bg-yellow-100">
                    <td class="p-4">{{ $culture->title }}</td>
                    <td class="p-4">{{ $culture->summary }}</td>
                    <td class="p-4 flex gap-2 flex-wrap">
                        <a class="inline-flex items-center justify-center px-6 py-3 bg-white text-[#0B6B63] border-2 border-[#0B6B63] rounded-full font-bold cursor-pointer no-underline transition-all duration-200 hover:bg-[#0B6B63] hover:text-white hover:-translate-y-0.5 hover:shadow-lg" href="{{ route('teacher.cultures.edit', $culture) }}">Ubah</a>
                        <form method="POST" action="{{ route('teacher.cultures.destroy', $culture) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
