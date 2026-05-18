@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-3xl p-7 shadow-md border border-white border-opacity-65">
    <h2 class="m-0 text-[#0B6B63] font-bold">Masuk</h2>

    @if ($errors->has('login'))
        <div class="p-5 rounded-2xl mb-7 border-l-4 border-[#0B6B63] flex items-center gap-4 font-medium text-lg bg-gradient-to-r from-[#FF6B35] to-[#E84C1F] text-white shadow-lg">
            <span class="text-2xl font-bold">✕</span>
            <span>{{ $errors->first('login') }}</span>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Email</label>
        <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" />
        @error('email')
            <span class="text-[#FF6B35] text-sm font-bold block -mt-2 mb-3">{{ $message }}</span>
        @enderror

        <label class="block mb-2.5 font-bold text-[#0B6B63] uppercase text-sm" style="letter-spacing: 0.05em;">Password</label>
        <input type="password" name="password" required class="w-full px-4 py-3 rounded-2xl border-2 border-[#0B6B63] mb-4 bg-white text-[#0B6B63] transition-all duration-300 font-medium focus:outline-none focus:border-[#FF6B35] focus:shadow-md focus:bg-[#EBF5F0]" />
        @error('password')
            <span class="text-[#FF6B35] text-sm font-bold block -mt-2 mb-3">{{ $message }}</span>
        @enderror

        <button class="inline-flex items-center justify-center px-6 py-3 bg-[#FF6B35] text-white rounded-full font-bold cursor-pointer transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg w-full" type="submit">Masuk</button>
    </form>
    <p class="mt-4 text-center text-[#0B6B63]">Belum punya akun? <a href="/register" class="font-bold text-[#0B6B63] hover:underline">Daftar di sini</a>.</p>
</div>
@endsection
