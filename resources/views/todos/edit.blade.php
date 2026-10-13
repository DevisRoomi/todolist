@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
<!-- Navigasi Kembali & Kategori (Opsional) -->
<div class="mb-6">
    <a href="{{ route('todos.index') }}" class="text-sm font-medium text-[#888] hover:text-[#1A1A1A] transition-colors flex items-center gap-2 w-max">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar
    </a>
</div>

<!-- Header Detail -->
<div class="mb-8 border-b border-[#E8E8E3] pb-6">
    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
        <!-- Judul -->
        <h1 class="font-mincho text-3xl sm:text-4xl font-bold text-[#1A1A1A] leading-tight">
            {{ $todo->title }}
        </h1>

        <!-- Status Badge -->
        <div class="mt-2 sm:mt-1">
            @if($todo->is_completed)
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-sm border border-[#A6BFA1] bg-[#F0F4EC] text-[#3A5032] text-xs font-bold tracking-widest uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#5F8055]"></span>
                    Selesai
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-sm border border-[#D1D1CD] bg-[#FCFCFA] text-[#666] text-xs font-bold tracking-widest uppercase">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#999]"></span>
                    Belum Selesai
                </span>
            @endif
        </div>
    </div>
</div>

<!-- Isi Deskripsi -->
<div class="min-h-[150px]">
    @if($todo->description)
        <p class="text-[#444] text-base leading-loose whitespace-pre-wrap">
            {{ $todo->description }}
        </p>
    @else
        <p class="text-[#999] text-sm italic tracking-wide">
            Tidak ada deskripsi untuk tugas ini.
        </p>
    @endif
</div>

<!-- Aksi / Tombol -->
<div class="flex items-center gap-4 mt-12 pt-6 border-t border-[#E8E8E3]">
    <a
        href="{{ route('todos.edit', $todo) }}"
        class="px-7 py-2.5 bg-[#1A1A1A] text-white text-sm font-medium tracking-wider rounded-sm hover:bg-[#333] transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1A1A1A] inline-flex items-center gap-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
        Edit Tugas
    </a>
</div>
@endsection
