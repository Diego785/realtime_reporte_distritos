<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SDER') }}</title>

    <link rel="icon" href="{{ asset('favicon_bolivia.png') }}" type="image/x-icon">

    <title>SDER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    {{-- <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/equipo-tecnico.css">
    <link rel="stylesheet" href="css/rotating-image-gallery.css">
    <link rel="stylesheet" href="css/news.css"> --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.23/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    @livewireStyles

    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />






    <!-- Styles -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* This example part of kwd-dashboard see https://kamona-wd.github.io/kwd-dashboard/ */
        /* So here we will write some classes to simulate dark mode and some of tailwind css config in our project */
        :root {
            --light: #edf2f9;
            --dark: #152e4d;
            --darker: #12263f;

            --color-red: #dc2626;
            --color-green: #16a34a;
            --color-blue: #2563eb;
            --color-cyan: #0891b2;
            --color-teal: #0d9488;
            --color-fuchsia: #c026d3;
            --color-orange: #ea580c;
            --color-yellow: #ca8a04;
            --color-violet: #7c3aed;
        }

        [x-cloak] {
            display: none;
        }

        .dark .dark\:text-light {
            color: var(--light);
        }

        .dark .dark\:bg-dark {
            background-color: var(--dark);
        }

        .dark .dark\:bg-darker {
            background-color: var(--darker);
        }

        .dark .dark\:text-gray-300 {
            color: #D1D5DB;
        }

        .dark .dark\:text-blue-500 {
            color: #3B82F6;
        }

        .dark .dark\:text-blue-100 {
            color: #DBEAFE;
        }

        .dark .dark\:hover\:text-light:hover {
            color: var(--light);
        }

        .dark .dark\:border-blue-800 {
            border-color: #1e40af;
        }

        .dark .dark\:border-blue-700 {
            border-color: #1D4ED8;
        }

        .dark .dark\:bg-blue-600 {
            background-color: #2563eb;
        }

        .dark .dark\:hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }

        .hover\:overflow-y-auto:hover {
            overflow-y: auto;
        }
    </style>


    @livewireStyles

</head>

<body>

    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark': isDark }">
        <!--  -->
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-opacity-90 bg-blue-800">
                Cargando.....
            </div>

            <!-- Sidebar -->
            <aside class="flex-shrink-0 hidden w-48 bg-white border-r dark:border-blue-800 dark:bg-darker md:block">
                <div class="flex flex-col h-full">
                    <!-- Sidebar links -->
                    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Dashboards links -->
                        <div>
                            <!-- active classes 'bg-blue-100 dark:bg-blue-600' -->
                            <a href="{{ route('show-encuestas') }}"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-square-poll-vertical"></i>
                                </span>
                                <span class="ml-2 text-sm">ENCUESTAS</span>
                            </a>
                            <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <span class="ml-2 text-sm">DISTRITOS</span>
                            </a>
                            <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="ml-2 text-sm"> USUARIOS </span>
                            </a>

                    </nav>

                    <!-- Sidebar footer -->
                    <div class="flex-shrink-0 px-2 py-4 space-y-2">
                        <button @click="openSettingsPanel" type="button"
                            class="flex items-center justify-center w-full px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-700 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                            <span aria-hidden="true"">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </span>
                            <span>Configuración</span>
                        </button>
                    </div>
                </div>
            </aside>

            <div class="flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                <header class="relative bg-white dark:bg-darker">
                    <div class="flex items-center justify-between p-2 border-b dark:border-blue-800">
                        <!-- Mobile menu button -->
                        <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                            class="p-1 text-blue-400 transition-colors duration-200 rounded-md bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark md:hidden focus:outline-none focus:ring">
                            <span class="sr-only">Abrir menú principal</span>
                            <span aria-hidden="true">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </span>
                        </button>

                        <!-- Brand -->
                        <a href="#"
                            class="inline-block text-2xl font-bold tracking-wider text-blue-700 uppercase dark:text-light">
                            SUBDIRECCIÓN DE EDUCACIÓN REGULAR
                        </a>

                        <!-- Mobile sub menu button -->
                        <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                            class="p-1 text-blue-400 transition-colors duration-200 rounded-md bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark md:hidden focus:outline-none focus:ring">
                            <span class="sr-only">Abrir sub menú</span>
                            <span aria-hidden="true">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </span>
                        </button>

                        <!-- Desktop Right buttons -->
                        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                            <!-- Toggle dark theme button -->
                            <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                                <div class="w-12 h-6 transition bg-blue-100 rounded-full outline-none dark:bg-blue-400">
                                </div>
                                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                                    :class="{
                                        'translate-x-0 -translate-y-px  bg-white text-blue-700': !
                                            isDark,
                                        'translate-x-6 text-blue-100 bg-blue-800': isDark
                                    }">
                                    <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                    <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </div>
                            </button>

                            <!-- Notification button -->
                            {{-- <button @click="openNotificationsPanel"
                                class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                <span class="sr-only">Abrir panel de notificaciones</span>
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button> --}}

                            <!-- Search button -->
                            {{-- <button @click="openSearchPanel"
                                class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                <span class="sr-only">Abrir panel del buscador</span>
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button> --}}

                            <!-- Settings button -->
                            <button @click="openSettingsPanel"
                                class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                <span class="sr-only">Abrir panel de ajustes</span>
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>

                            <!-- Settings button -->
                            <form data-ripple-light="true" style="position: relative; overflow: hidden;"
                                method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <button href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                    class="p-2 text-red-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-red-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-red-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-red-700 focus:ring-red-800">
                                    <span class="sr-only">Cerrar sesión</span>
                                    <div class="w-7 h-7 ">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </div>
                                </button>
                            </form>



                        </nav>

                        <!-- Mobile sub menu -->
                        <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
                            x-transition:enter-start="-translate-y-full opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-100"
                            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                            x-transition:leave-start="translate-y-0 opacity-100"
                            x-transition:leave-end="-translate-y-full opacity-0" x-show="isMobileSubMenuOpen"
                            @click.away="isMobileSubMenuOpen = false"
                            class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
                            aria-label="Secondary">
                            <div class="space-x-2">
                                <!-- Toggle dark theme button -->
                                <button aria-hidden="true" class="relative focus:outline-none" x-cloak
                                    @click="toggleTheme">
                                    <div
                                        class="w-12 h-6 transition bg-blue-100 rounded-full outline-none dark:bg-blue-400">
                                    </div>
                                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                                        :class="{
                                            'translate-x-0 -translate-y-px  bg-white text-blue-700': !
                                                isDark,
                                            'translate-x-6 text-blue-100 bg-blue-800': isDark
                                        }">
                                        <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                        </svg>
                                        <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Notification button -->
                                {{-- <button
                                    @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                                    class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                    <span class="sr-only">Abrir panel de notificaciones</span></span>
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button> --}}

                                <!-- Search button -->
                                {{-- <button
                                    @click="openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })"
                                    class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                    <span class="sr-only">Abrir panel de búsqueda</span>
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button> --}}

                                <!-- Settings button -->
                                <button @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                                    class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                    <span class="sr-only">Abrir panel de ajustes</span>
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>

                            </div>

                        </nav>
                    </div>
                    <!-- Mobile main manu -->
                    <div class="border-b md:hidden dark:border-blue-800" x-show="isMobileMainMenuOpen"
                        @click.away="isMobileMainMenuOpen = false">
                        <nav aria-label="Main" class="px-2 py-4 space-y-2">
                            <!-- Dashboards links -->
                            <a href="{{ route('show-encuestas') }}"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-square-poll-vertical"></i>
                                </span>
                                <span class="ml-2 text-sm">ENCUESTAS</span>
                            </a>
                            <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <span class="ml-2 text-sm">DISTRITOS</span>
                            </a>
                            {{-- <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-image"></i>
                                </span>
                                <span class="ml-2 text-sm"> PORTADAS </span>
                            </a>
                            <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-newspaper"></i>
                                </span>
                                <span class="ml-2 text-sm"> NOTICIAS </span>
                            </a>
                            <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-scale-balanced"></i>
                                </span>
                                <span class="ml-2 text-sm"> RESOLUCIONES </span>
                            </a> --}}
                            <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="ml-2 text-sm"> USUARIOS </span>
                            </a>
                            {{-- <a href=""
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-600">
                                <span aria-hidden="true">
                                    <i class="fa-solid fa-book"></i>
                                </span>
                                <span class="ml-2 text-sm"> BITÁCORA </span>
                            </a> --}}

                        </nav>
                    </div>
                </header>

                <!-- Main content -->

                @yield('content')




            </div>





        </div>

        <!-- Panels -->

        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSettingsPanelOpen"
            @click="isSettingsPanelOpen = false" class="fixed inset-0 z-10 bg-blue-800" style="opacity: 0.5"
            aria-hidden="true"></div>
        <!-- Panel -->
        <section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" x-ref="settingsPanel"
            tabindex="-1" x-show="isSettingsPanelOpen" @keydown.escape="isSettingsPanelOpen = false"
            class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
            aria-labelledby="settinsPanelLabel">
            <div class="absolute left-0 p-2 transform -translate-x-full">
                <!-- Close button -->
                <button @click="isSettingsPanelOpen = false"
                    class="p-2 text-white rounded-md focus:outline-none focus:ring">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Panel content -->
            <div class="flex flex-col h-screen">
                <!-- Panel header -->
                <div
                    class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-blue-700">
                    <span aria-hidden="true" class="text-gray-500 dark:text-blue-600">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </span>
                    <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">Configuración
                    </h2>
                </div>
                <!-- Content -->
                <div class="flex-1 overflow-hidden hover:overflow-y-auto">
                    <!-- Theme -->
                    <div class="p-4 space-y-4 md:p-8">
                        <h6 class="text-lg font-medium text-gray-400 dark:text-light">Modo</h6>
                        <div class="flex items-center space-x-8">
                            <!-- Light button -->
                            <button @click="setLightTheme"
                                class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-blue-700 dark:hover:text-blue-100 dark:hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-indigo-700"
                                :class="{
                                    'border-gray-900 text-gray-900 dark:border-blue-500 dark:text-blue-100': !
                                        isDark,
                                    'text-gray-500 dark:text-blue-500': isDark
                                }">
                                <span>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </span>
                                <span>Claro</span>
                            </button>

                            <!-- Dark button -->
                            <button @click="setDarkTheme"
                                class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-blue-700 dark:hover:text-indigo-100 dark:hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-700"
                                :class="{
                                    'border-gray-900 text-gray-900 dark:border-blue-500 dark:text-blue-100': isDark,
                                    'text-gray-500 dark:text-blue-500':
                                        !isDark
                                }">
                                <span>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                </span>
                                <span>Oscuro</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Notification panel -->
        <!-- Backdrop -->
        <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-show="isNotificationsPanelOpen" @click="isNotificationsPanelOpen = false"
            class="fixed inset-0 z-10 bg-blue-800 bg-opacity-25" style="opacity: .5;" aria-hidden="true"></div>


        <!-- Search panel -->
        <!-- Backdrop -->
        <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSearchPanelOpen"
            @click="isSearchPanelOpen = false" class="fixed inset-0 z-10 bg-blue-800 bg-opacity-25"
            style="opacity: .5;" aria-hidden="ture"></div>
        <!-- Panel -->
        <section x-cloak x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
            x-show="isSearchPanelOpen" @keydown.escape="isSearchPanelOpen = false"
            class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
            <div class="absolute right-0 p-2 transform translate-x-full">
                <!-- Close button -->
                <button @click="isSearchPanelOpen = false"
                    class="p-2 text-white rounded-md focus:outline-none focus:ring">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <h2 class="sr-only">Search panel</h2>
            <!-- Panel content -->
            <div class="flex flex-col h-screen">
                <!-- Panel header (Search input) -->
                <div
                    class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-blue-800 dark:focus-within:text-light focus-within:text-gray-700">
                    <span class="absolute inset-y-0 inline-flex items-center px-4">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input x-ref="searchInput" type="text"
                        class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                        placeholder="Search..." />
                </div>

                <!-- Panel content (Search result) -->
                <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden font-sans h hover:overflow-y-auto">
                    <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">History</h3>
                    <a href="#" class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-lg"
                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                alt="Post cover" />
                        </div>
                        <div class="flex-1 max-w-xs overflow-hidden">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Header</h4>
                            <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                Lorem ipsum dolor, sit amet consectetur.
                            </p>
                            <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Post </span>
                        </div>
                    </a>
                    <a href="#" class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-lg"
                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                alt="Ahmed Kamel" />
                        </div>
                        <div class="flex-1 max-w-xs overflow-hidden">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h4>
                            <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                Last activity 3h ago.
                            </p>
                            <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Offline </span>
                        </div>
                    </a>
                    <a href="#" class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-lg"
                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                alt="K-WD Dashboard" />
                        </div>
                        <div class="flex-1 max-w-xs overflow-hidden">
                            <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                            <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            </p>
                            <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Updated 3h ago.
                            </span>
                        </div>
                    </a>
                    <template x-for="i in 10" x-key="i">
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg"
                                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                    alt="K-WD Dashboard" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard
                                </h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Updated 3h
                                    ago.
                                </span>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </section>
    </div>




    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setLightTheme() {
                    this.isDark = false
                    setTheme(this.isDark)
                },
                setDarkTheme() {
                    this.isDark = true
                    setTheme(this.isDark)
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus()
                    })
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                    })
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                },
            }
        }
    </script>


    <script src="socket.io/socket.io.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.2/socket.io.js"></script>


    <script>
        var socket = io('http://localhost:3001');

        socket.on('connect', () => {
            console.log('Conexión establecida');
        });

        socket.on('disconnect', () => {
            console.log('Desconectado');
        });
    </script>




    @livewireScripts

    @stack('js')


    @stack('modals')


    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>


<script>
    (function() {
        var fs = (document.location.protocol === 'file:');
        var ff = (navigator.userAgent.toLowerCase().indexOf('firefox') !== -1);
        if (fs && !ff) {
            (new joint.ui.Dialog({
                width: 300,
                type: 'alert',
                title: 'Local File',
                content: $('#message-fs').show()
            })).open();
        }
    })();
</script>




</body>

</html>
