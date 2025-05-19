<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? "{$title} - " : '' }}{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-black">
    <header class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-50 md:px-10">
        @include('layouts.navigation')
    </header>

    <main class="pt-16">
        @yield('content')
    </main>

    <footer class="bg-red-700 text-white">
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <h5 class="font-bold text-2xl mb-4">XI - RPL</h5>
                <p class="text-sm opacity-75">Kelas Rekayasa Perangkat Lunak yang fokus pada pengembangan software dan aplikasi modern.</p>
            </div>
            <div class="flex items-center space-x-6">
                <a href="#" class="text-white hover:text-red-200 transition p-2 rounded-full hover:bg-red-600" aria-label="Follow us on Facebook">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-red-200 transition p-2 rounded-full hover:bg-red-600" aria-label="Follow us on Instagram">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-red-200 transition p-2 rounded-full hover:bg-red-600" aria-label="Follow us on Twitter">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-red-200 transition p-2 rounded-full hover:bg-red-600" aria-label="Subscribe to our YouTube channel">
                    <i class="fab fa-youtube text-xl"></i>
                </a>
            </div>
        </div>
        <div class="mt-8 pt-4 border-t border-red-600 text-center text-sm opacity-75">
            <p>&copy; 2025 XI - RPL. All rights reserved.</p>
        </div>
    </div>
    </footer>

    @stack('scripts')
    <script src="{{ asset('js/sidebar-toggle.js') }}"></script>
</body>
</html>