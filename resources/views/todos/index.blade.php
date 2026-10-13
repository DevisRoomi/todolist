@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')
<!-- Header Bagian Atas -->
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 border-b border-[#E8E8E3] pb-6">
    <div>
        <h1 class="font-mincho text-3xl font-bold text-[#1A1A1A]">Daftar Tugas</h1>
        <p class="text-[#666] text-sm mt-2 tracking-wide font-inter">
            Catat tugasmu, kerjakan, lalu tandai selesai.
        </p>
    </div>
    <a
        href="{{ route('todos.create') }}"
        class="px-5 py-2.5 bg-[#1A1A1A] text-white text-sm font-medium tracking-wider rounded-sm hover:bg-[#333] transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1A1A1A] whitespace-nowrap inline-flex items-center gap-2 w-max"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Tugas
    </a>
</div>

<!-- Daftar Tugas -->
<div class="flex flex-col">
    @forelse ($todos as $todo)
        <article class="group py-5 border-b border-[#F0F0EC] last:border-b-0 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-colors hover:bg-[#FAF9F7] -mx-6 px-6 sm:-mx-8 sm:px-8">

            <!-- Sisi Kiri: Judul dan Status -->
            <div class="flex-grow">
                <h2 class="text-lg font-medium mb-1">
                    <a
                        href="{{ route('todos.show', $todo) }}"
                        class="transition-colors outline-none focus:text-[#E56B55] {{ $todo->is_completed ? 'text-[#A0A09C] line-through decoration-[#D1D1CD] hover:text-[#2C2C2C]' : 'text-[#2C2C2C] hover:text-[#E56B55]' }}"
                    >
                        {{ $todo->title }}
                    </a>
                </h2>
                <div>
                    @if($todo->is_completed)
                        <span class="text-[11px] font-bold tracking-widest uppercase text-[#5F8055] flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-[#5F8055]"></span> Selesai
                        </span>
                    @else
                        <span class="text-[11px] font-bold tracking-widest uppercase text-[#999] flex items-center gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-[#CCC]"></span> Belum selesai
                        </span>
                    @endif
                </div>
            </div>

            <!-- Sisi Kanan: Aksi -->
            <div class="flex items-center gap-4 text-sm font-medium sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-300">
                <a
                    href="{{ route('todos.show', $todo) }}"
                    class="text-[#888] hover:text-[#1A1A1A] transition-colors"
                >
                    Detail
                </a>
                <span class="text-[#E8E8E3]">|</span>
                <a
                    href="{{ route('todos.edit', $todo) }}"
                    class="text-[#888] hover:text-[#1A1A1A] transition-colors"
                >
                    Edit
                </a>
                <span class="text-[#E8E8E3]">|</span>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus tugas ini?')" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        aria-label="Hapus tugas {{ $todo->title }}"
                        class="text-[#C95252] hover:text-[#8F3333] transition-colors focus:outline-none"
                    >
                        Hapus
                    </button>
                </form>
            </div>

        </article>
    @empty
        <!-- State Kosong (Empty State) -->
        <div class="py-20 flex flex-col items-center justify-center text-center">
            <span class="w-3 h-3 rounded-full border border-[#D1D1CD] mb-4"></span>
            <p class="text-[#888] text-sm tracking-wide font-medium">Belum ada tugas.</p>
            <p class="text-[#AAA] text-xs mt-1">Tekan "Tambah Tugas" untuk memulai.</p>
        </div>
    @endforelse
</div>
@endsection
