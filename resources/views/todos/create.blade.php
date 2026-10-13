@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
<!-- Judul Halaman -->
<div class="mb-8 border-b border-rose-100/50 pb-5">
    <h1 class="font-jp text-3xl font-bold text-rose-800 mb-2">Tambah Tugas</h1>
    <p class="text-rose-500 text-sm font-medium">Catat apa yang ingin kamu lakukan hari ini 🍡</p>
</div>

<form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
    @csrf

    <!-- Input Judul -->
    <div>
        <label for="title" class="block text-sm font-bold text-stone-600 mb-2">
            Judul Tugas <span class="text-rose-400">*</span>
        </label>
        <input
            id="title"
            name="title"
            type="text"
            maxlength="255"
            value="{{ old('title') }}"
            required
            class="w-full px-4 py-3 bg-white/50 border border-rose-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 focus:bg-white transition-all shadow-sm placeholder-stone-300 text-stone-700 font-medium"
            placeholder="Ketik tugasmu di sini..."
        >
    </div>

    <!-- Input Deskripsi -->
    <div>
        <label for="description" class="block text-sm font-bold text-stone-600 mb-2">
            Catatan Tambahan <span class="text-stone-400 font-normal text-xs ml-1">(Opsional)</span>
        </label>
        <textarea
            id="description"
            name="description"
            rows="4"
            maxlength="5000"
            class="w-full px-4 py-3 bg-white/50 border border-rose-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 focus:bg-white transition-all shadow-sm placeholder-stone-300 text-stone-700 resize-y"
            placeholder="Detail tambahan jika diperlukan..."
        >{{ old('description') }}</textarea>
    </div>

    <!-- Checkbox Status -->
    <div class="p-4 bg-rose-50/50 border border-rose-100 rounded-2xl inline-block w-full sm:w-auto">
        <label class="flex items-center gap-3 cursor-pointer group">
            <input
                type="checkbox"
                name="is_completed"
                value="1"
                @checked(old('is_completed', false))
                class="w-5 h-5 rounded-md border-rose-300 text-rose-500 focus:ring-rose-400 cursor-pointer transition-colors accent-rose-500"
            >
            <span class="text-sm font-bold text-stone-600 group-hover:text-rose-600 transition-colors">
                Tandai sudah selesai
            </span>
        </label>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex flex-col-reverse sm:flex-row items-center gap-4 mt-8 pt-6">
        <a
            href="{{ route('todos.index') }}"
            class="w-full sm:w-auto px-6 py-3 text-sm font-bold text-stone-400 hover:text-stone-700 hover:bg-stone-50 rounded-2xl transition-all text-center"
        >
            Batal
        </a>
        <button
            type="submit"
            class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-rose-400 to-pink-500 text-white text-sm font-bold rounded-2xl hover:from-rose-500 hover:to-pink-600 shadow-md hover:shadow-lg hover:shadow-rose-200 transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400"
        >
            Simpan Tugas 🌸
        </button>
    </div>
</form>
@endsection
