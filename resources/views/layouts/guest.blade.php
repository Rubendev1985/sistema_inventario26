<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AgroStock') }} - Gestión Agropecuaria</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Fallback Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        agro: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-stone-800 bg-stone-50 selection:bg-agro-500 selection:text-white">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">
        
        <!-- Background decorative elements -->
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-1/3">
            <div class="w-[500px] h-[500px] bg-agro-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        </div>
        <div class="absolute top-0 left-0 -translate-y-1/3 -translate-x-1/3">
            <div class="w-[500px] h-[500px] bg-amber-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10 mt-10 sm:mt-0">
            <a href="/" class="flex flex-col items-center gap-3">
                <div class="w-16 h-16 bg-agro-700 rounded-2xl flex items-center justify-center shadow-lg shadow-agro-700/30 hover:scale-105 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                    </svg>
                </div>
                <span class="font-bold text-3xl tracking-tight text-stone-900">AgroStock</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-8 px-8 py-10 bg-white shadow-2xl border border-stone-100 overflow-hidden sm:rounded-3xl relative z-10 mb-10 sm:mb-0">
            {{ $slot }}
        </div>
        
        <div class="mt-8 text-sm text-stone-500 font-medium relative z-10 mb-6 sm:mb-0">
            &copy; {{ date('Y') }} AgroStock. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
