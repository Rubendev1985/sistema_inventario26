<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'AgroStock') }} - Gestión Agropecuaria</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    
    <!-- Fallback Tailwind CDN (Garantiza el diseño sin compilar) -->
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

    <!-- Navbar -->
    <nav class="absolute top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-12 h-12 bg-agro-700 rounded-xl flex items-center justify-center shadow-lg shadow-agro-700/30">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-stone-900">AgroStock</span>
                </div>

                <!-- Navigation & Auth -->
                <div class="flex items-center gap-8">
                    <div class="hidden md:flex gap-8 text-sm font-semibold text-stone-600">
                        <a href="#soluciones" class="hover:text-agro-700 transition-colors">Soluciones</a>
                        <a href="#beneficios" class="hover:text-agro-700 transition-colors">Beneficios</a>
                    </div>
                    
                    <div class="h-6 w-px bg-stone-300 hidden md:block"></div>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-agro-700 hover:text-agro-800 transition-colors">
                                    Ir al Panel &rarr;
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-semibold text-stone-600 hover:text-stone-900 transition-colors">
                                    Ingresar
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm font-bold text-white bg-agro-700 hover:bg-agro-800 px-6 py-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                                        Crear Cuenta
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative overflow-hidden pt-32 pb-20 lg:pt-48 lg:pb-32">
        <!-- Background decorative elements -->
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-1/3">
            <div class="w-[500px] h-[500px] bg-agro-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        </div>
        <div class="absolute top-0 right-0 translate-y-1/3 -translate-x-1/3">
            <div class="w-[500px] h-[500px] bg-amber-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob" style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-8 items-center">
                
                <!-- Hero Content -->
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white shadow-sm border border-stone-200 text-agro-700 text-sm font-bold mb-8">
                        <span class="flex h-2.5 w-2.5 rounded-full bg-agro-500 animate-pulse"></span>
                        Gestión Agropecuaria 2.0
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-stone-900 mb-6 leading-[1.1]">
                        Potencia tu <span class="text-transparent bg-clip-text bg-gradient-to-r from-agro-600 to-agro-800">negocio agropecuario</span>
                    </h1>
                    
                    <p class="text-lg text-stone-600 mb-10 leading-relaxed max-w-xl font-medium">
                        Controla tu inventario de insumos, semillas y herramientas. Gestiona ventas, compras y trazabilidad desde una única plataforma profesional diseñada para el campo.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-white bg-agro-700 hover:bg-agro-800 shadow-lg shadow-agro-700/30 hover:shadow-xl hover:shadow-agro-700/40 transition-all duration-300 transform hover:-translate-y-1">
                                Abrir Panel de Control
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-white bg-agro-700 hover:bg-agro-800 shadow-lg shadow-agro-700/30 hover:shadow-xl hover:shadow-agro-700/40 transition-all duration-300 transform hover:-translate-y-1">
                                Comenzar Prueba Gratis
                            </a>
                            <a href="#soluciones" class="inline-flex justify-center items-center px-8 py-4 border-2 border-stone-200 text-base font-bold rounded-full text-stone-700 bg-white hover:bg-stone-50 hover:border-stone-300 transition-all duration-300">
                                Ver Características
                            </a>
                        @endauth
                    </div>
                    
                    <div class="mt-12 flex items-center gap-4 text-sm text-stone-500 font-semibold">
                        <div class="flex -space-x-2">
                            <div class="w-10 h-10 rounded-full bg-stone-200 border-2 border-white"></div>
                            <div class="w-10 h-10 rounded-full bg-stone-300 border-2 border-white"></div>
                            <div class="w-10 h-10 rounded-full bg-stone-400 border-2 border-white"></div>
                        </div>
                        <p>+500 productores ya confían en nosotros</p>
                    </div>
                </div>

                <!-- Hero Image/Mockup -->
                <div class="relative mx-auto w-full max-w-lg lg:max-w-none">
                    <div class="relative bg-white rounded-3xl shadow-2xl border border-stone-200/50 overflow-hidden transform lg:-rotate-2 transition-transform duration-500 hover:rotate-0">
                        <!-- Mac OS Window Header -->
                        <div class="bg-stone-100/80 border-b border-stone-200 px-4 py-3.5 flex items-center gap-2">
                            <div class="w-3.5 h-3.5 rounded-full bg-red-400 border border-red-500/20"></div>
                            <div class="w-3.5 h-3.5 rounded-full bg-amber-400 border border-amber-500/20"></div>
                            <div class="w-3.5 h-3.5 rounded-full bg-green-400 border border-green-500/20"></div>
                        </div>
                        <!-- Mockup Content -->
                        <div class="p-6 lg:p-8 bg-stone-50/50">
                            <!-- Top metrics -->
                            <div class="grid grid-cols-3 gap-4 mb-8">
                                <div class="bg-white p-5 rounded-2xl border border-stone-100 shadow-sm">
                                    <div class="w-10 h-10 rounded-xl bg-agro-50 text-agro-600 flex items-center justify-center mb-4">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    </div>
                                    <div class="text-3xl font-extrabold text-stone-800 tracking-tight">1,240</div>
                                    <div class="text-xs text-stone-500 font-bold mt-1 uppercase tracking-wide">Stock</div>
                                </div>
                                <div class="bg-white p-5 rounded-2xl border border-stone-100 shadow-sm">
                                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="text-3xl font-extrabold text-stone-800 tracking-tight">$45K</div>
                                    <div class="text-xs text-stone-500 font-bold mt-1 uppercase tracking-wide">Ventas</div>
                                </div>
                                <div class="bg-white p-5 rounded-2xl border border-stone-100 shadow-sm">
                                    <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <div class="text-3xl font-extrabold text-stone-800 tracking-tight">89</div>
                                    <div class="text-xs text-stone-500 font-bold mt-1 uppercase tracking-wide">Clientes</div>
                                </div>
                            </div>
                            <!-- Fake List -->
                            <div class="bg-white rounded-2xl border border-stone-100 shadow-sm overflow-hidden">
                                <div class="border-b border-stone-50 px-5 py-4 flex justify-between items-center bg-stone-50/30">
                                    <div class="font-bold text-sm text-stone-800">Últimos Movimientos</div>
                                    <div class="text-xs font-bold text-agro-700 bg-agro-50 px-3 py-1.5 rounded-md hover:bg-agro-100 cursor-pointer transition-colors">Ver todos</div>
                                </div>
                                <div class="divide-y divide-stone-50">
                                    <div class="px-5 py-4 flex items-center justify-between hover:bg-stone-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center text-stone-500">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-stone-800">Venta de Fertilizante NPK</div>
                                                <div class="text-xs text-stone-500 font-medium">Hace 2 horas</div>
                                            </div>
                                        </div>
                                        <div class="text-sm font-extrabold text-green-600">+$1,250.00</div>
                                    </div>
                                    <div class="px-5 py-4 flex items-center justify-between hover:bg-stone-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center text-stone-500">
                                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-stone-800">Ingreso Semillas Maíz</div>
                                                <div class="text-xs text-stone-500 font-medium">Hace 5 horas</div>
                                            </div>
                                        </div>
                                        <div class="text-sm font-extrabold text-stone-600">- $450.00</div>
                                    </div>
                                    <div class="px-5 py-4 flex items-center justify-between hover:bg-stone-50 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center text-stone-500">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-stone-800">Venta Alimento Balanceado</div>
                                                <div class="text-xs text-stone-500 font-medium">Ayer</div>
                                            </div>
                                        </div>
                                        <div class="text-sm font-extrabold text-green-600">+$890.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating decorative element -->
                    <div class="absolute -bottom-8 -left-8 bg-white p-5 rounded-2xl shadow-xl border border-stone-100 flex items-center gap-4 animate-bounce" style="animation-duration: 3.5s;">
                        <div class="w-14 h-14 bg-agro-50 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-agro-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="text-sm font-extrabold text-stone-900">Stock Actualizado</div>
                            <div class="text-xs text-stone-500 font-semibold mt-0.5">Sincronización en tiempo real</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="soluciones" class="py-24 bg-white border-y border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-agro-700 font-bold tracking-widest uppercase text-sm mb-3">Soluciones Integrales</h2>
                <p class="mt-2 text-3xl leading-tight font-extrabold text-stone-900 sm:text-4xl">
                    Herramientas profesionales para tu agronegocio
                </p>
                <p class="mt-6 max-w-2xl text-lg text-stone-500 mx-auto font-medium">
                    Olvídate de las hojas de cálculo. Nuestro sistema está diseñado para simplificar el día a día de distribuidores y productores.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-10 lg:gap-12">
                <!-- Feature 1 -->
                <div class="relative p-10 bg-white rounded-3xl border border-stone-100 shadow-sm hover:shadow-2xl transition-all duration-300 group transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-agro-50 rounded-2xl flex items-center justify-center mb-8 text-agro-600 group-hover:scale-110 group-hover:bg-agro-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-stone-900 mb-4">Control de Inventario</h3>
                    <p class="text-stone-600 leading-relaxed font-medium">
                        Gestiona existencias de fertilizantes, semillas, agroquímicos y herramientas. Alertas automáticas de stock mínimo y fechas de caducidad.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="relative p-10 bg-white rounded-3xl border border-stone-100 shadow-sm hover:shadow-2xl transition-all duration-300 group transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-8 text-blue-600 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-stone-900 mb-4">Ventas y Facturación</h3>
                    <p class="text-stone-600 leading-relaxed font-medium">
                        Punto de venta (POS) rápido e intuitivo. Genera comprobantes, gestiona cuentas por cobrar y analiza el rendimiento diario de tu negocio.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="relative p-10 bg-white rounded-3xl border border-stone-100 shadow-sm hover:shadow-2xl transition-all duration-300 group transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mb-8 text-amber-600 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-stone-900 mb-4">Gestión de Clientes</h3>
                    <p class="text-stone-600 leading-relaxed font-medium">
                        Fideliza a tus productores. Historial de compras, créditos otorgados, preferencias y directorio de proveedores agropecuarios.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div id="beneficios" class="bg-agro-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between relative z-10">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block mb-2">¿Listo para modernizar tu negocio?</span>
                <span class="block text-agro-400">Únete a la nueva era del agro.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-agro-900 bg-white hover:bg-stone-50 transition-colors">
                            Ir al Panel
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-agro-900 bg-white hover:bg-stone-50 transition-colors">
                            Registrarse Gratis
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-stone-950">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-agro-700/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-agro-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <span class="text-2xl font-bold text-white tracking-tight">AgroStock</span>
                </div>
                <p class="text-stone-400 text-sm font-medium">
                    &copy; {{ date('Y') }} AgroStock. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
