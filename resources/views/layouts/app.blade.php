<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Todo Sakura')</title>

    <!-- Memuat Tailwind CSS langsung -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Memuat Font Ala Jepang yang Manis (Shippori Mincho & Nunito) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&family=Shippori+Mincho:wght@500;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Nunito', sans-serif; }
        .font-jp { font-family: 'Shippori Mincho', serif; }

        /* Pola Latar Belakang Seigaiha (Ombak Jepang Sakura) */
        .bg-sakura-motif {
            background-color: #fff1f2; /* Warna dasar rose-50 */
            background-image:
                radial-gradient(circle at 100% 150%, #fff1f2 24%, #ffe4e6 25%, #ffe4e6 28%, #fff1f2 29%, #fff1f2 36%, #ffe4e6 36%, #ffe4e6 40%, transparent 40%, transparent),
                radial-gradient(circle at 0 150%, #fff1f2 24%, #ffe4e6 25%, #ffe4e6 28%, #fff1f2 29%, #fff1f2 36%, #ffe4e6 36%, #ffe4e6 40%, transparent 40%, transparent),
                radial-gradient(circle at 50% 100%, #fecdd3 10%, #ffe4e6 11%, #ffe4e6 23%, #fecdd3 24%, #fecdd3 30%, #ffe4e6 31%, #ffe4e6 43%, #fecdd3 44%, #fecdd3 50%, #ffe4e6 51%, #ffe4e6 63%, #fecdd3 64%, #fecdd3 71%, transparent 71%, transparent),
                radial-gradient(circle at 100% 50%, #fecdd3 5%, #ffe4e6 6%, #ffe4e6 15%, #fecdd3 16%, #fecdd3 20%, #ffe4e6 21%, #ffe4e6 30%, #fecdd3 31%, #fecdd3 35%, #ffe4e6 36%, #ffe4e6 45%, #fecdd3 46%, #fecdd3 49%, transparent 50%, transparent),
                radial-gradient(circle at 0 50%, #fecdd3 5%, #ffe4e6 6%, #ffe4e6 15%, #fecdd3 16%, #fecdd3 20%, #ffe4e6 21%, #ffe4e6 30%, #fecdd3 31%, #fecdd3 35%, #ffe4e6 36%, #ffe4e6 45%, #fecdd3 46%, #fecdd3 49%, transparent 50%, transparent);
            background-size: 60px 30px;
        }
    </style>
</head>

<body class="bg-sakura-motif text-stone-800 min-h-screen flex flex-col antialiased selection:bg-rose-300 selection:text-white">

    <!-- Header Transparan -->
    <header class="bg-white/60 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-rose-100">
        <div class="max-w-3xl mx-auto px-6 py-4">
            <a href="{{ route('todos.index') }}" class="flex items-center gap-3 w-max group">
                <span class="text-2xl group-hover:rotate-12 transition-transform duration-300">🌸</span>
                <span class="font-jp text-xl font-bold text-rose-700 tracking-wide">
                    タスク <span class="text-rose-400 font-normal ml-1">Todo</span>
                </span>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow w-full max-w-3xl mx-auto px-4 py-10 relative">

        <!-- Notifikasi -->
        @if (session('success'))
        <div class="bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl mb-6 shadow-sm flex items-center gap-2">
            <span>✨</span> {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 shadow-sm">
            <strong class="font-semibold text-sm">Ada yang kurang tepat:</strong>
            <ul class="list-disc pl-5 mt-1 text-sm">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
        @endif

        <!-- Area Card Utama (Efek Kaca / Glassmorphism) -->
        <div class="bg-white/85 backdrop-blur-lg rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white p-6 sm:p-10 relative overflow-hidden">
            <!-- Aksen Sakura Bunga di Pojok Kanan Atas Card -->
            <div class="absolute -top-6 -right-6 text-rose-100 opacity-50 pointer-events-none" style="font-size: 8rem;">
                🌸
            </div>

            <div class="relative z-10">
                @yield('content')
            </div>
        </div>

    </main>
</body>

</html>
