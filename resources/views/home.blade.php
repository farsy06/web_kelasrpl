<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XI - RPL</title>
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
    <header class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-10 md:px-10">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-xl text-gray-800">XI - RPL</h1>
            </div>
            <nav id="mainNav" class="hidden md:flex items-center space-x-4" aria-label="Main site navigation">
                <a class="text-red-600 hover:text-red-700 transition text-base" href="{{ route('home') }}" aria-label="Go to home page">Beranda</a>
                <a class="text-gray-600 hover:text-red-700 transition text-base" href="{{ route('about') }}" aria-label="Go to about us page">Tentang Kami</a>
                <a class="text-gray-600 hover:text-red-700 transition text-base" href="{{ route('programs') }}" aria-label="Go to programs page">Programs</a>
                <a class="text-gray-600 hover:text-red-700 transition text-base" href="{{ route('student') }}" aria-label="Go to alumni page">Siswa</a>
                <a class="text-gray-600 hover:text-red-700 transition text-base" href="{{ route('event') }}" aria-label="Go to contact us page">Event</a>
            </nav>
            <div class="flex items-center space-x-2">
                @auth
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('profile') }}" class="bg-red-600 text-white px-3 py-2 rounded-full text-base font-medium hover:bg-red-700 transition">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-red-600 text-white px-3 py-2 rounded-full text-base font-medium hover:bg-red-700 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                        Register
                    </a>
                @endauth
                <button type="button" id="menuBtn" aria-label="Open main navigation menu" class="p-1.5 rounded-full hover:bg-gray-100 focus:bg-gray-100 focus:outline-none md:hidden">
                    <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <div id="mobileNav" class="fixed inset-0 z-20 hidden md:hidden" role="dialog" aria-modal="true" aria-labelledby="mobileNavLabel">
        <!-- Semi-transparent overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50" id="mobileNavOverlay"></div>
        
        <!-- Menu content -->
        <div class="fixed inset-y-0 right-0 w-3/4 bg-white shadow-xl transform transition-transform duration-300 ease-in-out translate-x-full" id="mobileMenuContent">
            <span id="mobileNavLabel" class="sr-only">Mobile navigation menu</span>
            <div class="h-full flex flex-col">
                <div class="p-4 border-b border-gray-200">
                    <button type="button" id="closeMenuBtn" aria-label="Close main navigation menu" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 focus:bg-gray-100 focus:outline-none">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <h2 class="text-xl font-bold text-gray-800 mb-4">XI - RPL</h2>
                </div>
                <div class="flex-1 overflow-y-auto">
                    <nav aria-label="Mobile site navigation" class="space-y-4 px-4 py-6">
                        <a href="{{ route('home') }}" class="block w-full text-left text-gray-800 hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Beranda</a>
                        <a href="{{ route('about') }}" class="block w-full text-left text-gray-800 hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Tentang Kami</a>
                        <a href="{{ route('programs') }}" class="block w-full text-left text-gray-800 hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Programs</a>
                        <a href="{{ route('student') }}" class="block w-full text-left text-gray-800 hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Siswa</a>
                        <a href="{{ route('event') }}" class="block w-full text-left text-gray-800 hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Event</a>
                    </nav>
                </div>
                @auth
                <div class="border-t border-gray-200 px-4 py-6">
                    <div class="space-y-4">
                        <a href="{{ route('profile') }}" class="block w-full text-center text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-center bg-red-600 text-white px-3 py-2 rounded-full text-base font-medium hover:bg-red-700 transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <div class="border-t border-gray-200 px-4 py-6">
                    <a href="{{ route('login') }}" class="block w-full text-center bg-red-600 text-white px-3 py-2 rounded-full text-base font-medium hover:bg-red-700 transition">
                        Login
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-10 pt-[80px]">
        <!-- Hero Section -->
        <section class="flex flex-col md:flex-row md:items-center md:space-x-16">
            <div class="md:w-1/2">
                <h1 class="font-extrabold text-4xl md:text-5xl leading-tight mb-4">
                    kelas<br>XI - RPL
                </h1>
                <p class="text-gray-700 text-base md:text-lg max-w-xl mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                </p>
                <p class="font-semibold text-gray-900 mb-2">We are in Social Media</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-600 hover:text-red-600 transition p-2 rounded-full hover:bg-gray-100" aria-label="Facebook">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-red-600 transition p-2 rounded-full hover:bg-gray-100" aria-label="Instagram">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-red-600 transition p-2 rounded-full hover:bg-gray-100" aria-label="Twitter">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-red-600 transition p-2 rounded-full hover:bg-gray-100" aria-label="YouTube">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
                <div class="relative rounded-xl overflow-hidden shadow-lg w-64 h-80">
                    <img alt="Portrait of a man in black shirt with folded arms, smiling slightly, on light gray background" class="object-cover w-full h-full" src="https://storage.googleapis.com/a1aa/image/bc10d7cf-e674-44b5-73c5-006de67a966d.jpg">
                    <div class="absolute bottom-0 left-0 bg-white bg-opacity-80 text-xs p-2 w-full text-center">
                        "The best way to predict the future is to create it."
                    </div>
                </div>
            </div>
        </section>

        <!-- Subtitle -->
        <h2 class="text-center font-bold text-2xl mt-20 mb-6">suasana yg menggambarkan kelas kita</h2>
        <p class="text-center text-gray-600 mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <!-- Three placeholders -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-20">
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div>
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div>
            <div class="w-full h-48 bg-gray-200 rounded-lg"></div>
        </div>

        <!-- Wali Kelas Section -->
        <section class="mb-20">
            <h3 class="font-semibold text-xl mb-6">wali kelas</h3>
            <div class="flex flex-col md:flex-row md:items-center md:space-x-10">
                <div class="w-48 h-64 rounded-lg overflow-hidden shadow-lg mb-6 md:mb-0">
                    <img alt="Portrait of a man in suit and tie looking serious, dark background" class="object-cover w-full h-full" src="https://storage.googleapis.com/a1aa/image/51d3f8f3-fee4-4a78-29ca-dccc5ee350da.jpg">
                </div>
                <div class="md:flex-1">
                    <p class="font-bold text-lg mb-1">(ERICK FITRA WIJAYANTO)</p>
                    <p class="text-gray-700 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </section>

        <!-- Profil Siswa Section -->
        <section class="mb-20">
            <h3 class="font-semibold text-xl mb-2 text-center text-red-600">(Profil Pengguna)</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                <div class="bg-red-600 rounded-lg p-6 text-white flex flex-col items-center">
                    <img alt="Profile picture of student 1 wearing school uniform, smiling" class="rounded-full mb-4" src="https://storage.googleapis.com/a1aa/image/71b32126-9b1d-4430-20a4-d85026303ad9.jpg" width="128" height="128">
                    <h4 class="font-semibold mb-1">Nama Siswa 1</h4>
                    <p class="text-sm text-white/90 text-center">Deskripsi singkat tentang siswa 1 yang menjelaskan prestasi dan kepribadiannya.</p>
                </div>
                <div class="bg-red-600 rounded-lg p-6 text-white flex flex-col items-center">
                    <img alt="Profile picture of student 2 wearing school uniform, smiling" class="rounded-full mb-4" src="https://storage.googleapis.com/a1aa/image/60c703c6-d80a-42a6-105c-2dfd54147f82.jpg" width="128" height="128">
                    <h4 class="font-semibold mb-1">Nama Siswa 2</h4>
                    <p class="text-sm text-white/90 text-center">Deskripsi singkat tentang siswa 2 yang menjelaskan prestasi dan kepribadiannya.</p>
                </div>
                <div class="bg-red-600 rounded-lg p-6 text-white flex flex-col items-center">
                    <img alt="Profile picture of student 3 wearing school uniform, smiling" class="rounded-full mb-4" src="https://storage.googleapis.com/a1aa/image/cfa397c7-6d98-4a97-c0f1-c49050353ed8.jpg" width="128" height="128">
                    <h4 class="font-semibold mb-1">Nama Siswa 3</h4>
                    <p class="text-sm text-white/90 text-center">Deskripsi singkat tentang siswa 3 yang menjelaskan prestasi dan kepribadiannya.</p>
                </div>
            </div>
            <div class="flex justify-center mt-8">
                <a href="{{ route('student') }}" class="bg-red-600 text-white font-semibold px-8 py-3 rounded-full hover:bg-red-700 transition">
                    Selengkapnya
                </a>
            </div>
        </section>

        <!-- Prestasi Section -->
        <section class="mb-20 bg-purple-50 py-10 rounded-lg">
            <h3 class="text-center font-semibold text-lg mb-8">prestasi (contoh)</h3>
            <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-4 gap-6 px-4">
                <div class="bg-white rounded-lg p-6 shadow text-center">
                    <p class="text-sm text-gray-600 mb-2">Siswa berprestasi 1</p>
                    <p class="font-semibold text-gray-900">Juara 1 Lomba X</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow text-center">
                    <p class="text-sm text-gray-600 mb-2">Siswa berprestasi 2</p>
                    <p class="font-semibold text-gray-900">Juara 2 Lomba Y</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow text-center">
                    <p class="text-sm text-gray-600 mb-2">Siswa berprestasi 3</p>
                    <p class="font-semibold text-gray-900">Juara 3 Lomba Z</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow text-center">
                    <p class="text-sm text-gray-600 mb-2">Siswa berprestasi 4</p>
                    <p class="font-semibold text-gray-900">Juara Harapan</p>
                </div>
            </div>
        </section>

        <!-- Event Section -->
        <section class="mb-20">
            <h3 class="text-center font-semibold text-lg mb-8">Event</h3>
            <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 gap-6 px-4">
                <article class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <img alt="Photo of event 1 showing students in a classroom setting" class="w-full h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/c6307a3b-d603-416a-cbbe-fcc8a1e3a7d0.jpg">
                    <div class="p-4">
                        <h4 class="font-semibold mb-1 text-sm">Kegiatan XI-RPL 1</h4>
                        <p class="text-xs text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <img alt="Photo of event 2 showing students outdoors in a group" class="w-full h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/bb1453fd-7b6b-4275-7da0-c339ff5e433e.jpg">
                    <div class="p-4">
                        <h4 class="font-semibold mb-1 text-sm">Kegiatan XI-RPL 2</h4>
                        <p class="text-xs text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <img alt="Photo of event 3 showing students participating in a workshop" class="w-full h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/1580fbc2-3d1c-4e0b-085c-b698985ff3f9.jpg">
                    <div class="p-4">
                        <h4 class="font-semibold mb-1 text-sm">Kegiatan XI-RPL 3</h4>
                        <p class="text-xs text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
                <article class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <img alt="Photo of event 4 showing students in a group photo" class="w-full h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/3dccfe9b-28b1-4cff-d84d-87398f0e9d56.jpg">
                    <div class="p-4">
                        <h4 class="font-semibold mb-1 text-sm">Kegiatan XI-RPL 4</h4>
                        <p class="text-xs text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </article>
            </div>
            <div class="flex justify-center mt-8">
                <button type="button" class="bg-red-600 text-white font-semibold px-8 py-3 rounded-full hover:bg-red-700 transition">Selengkapnya</button>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="bg-red-700 py-12 mb-20">
            <h3 class="text-center text-white font-semibold text-lg mb-8">Gallery</h3>
            <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-6 px-4">
                <div class="relative rounded-lg overflow-hidden shadow-lg">
                    <img alt="Photo of a student reading a book in a library with shelves in the background" class="w-full h-72 object-cover" src="https://storage.googleapis.com/a1aa/image/b24a873b-a8cd-40fd-72ab-28d720b907d5.jpg">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2 text-sm font-semibold">
                        Kepedulian dan Cinta
                    </div>
                </div>
                <div class="relative rounded-lg overflow-hidden shadow-lg">
                    <img alt="Photo of a student reading a book in a library with shelves in the background" class="w-full h-72 object-cover" src="https://storage.googleapis.com/a1aa/image/b24a873b-a8cd-40fd-72ab-28d720b907d5.jpg">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2 text-sm font-semibold">
                        Kepedulian dan Cinta
                    </div>
                </div>
                <div class="relative rounded-lg overflow-hidden shadow-lg">
                    <img alt="Photo of a student reading a book in a library with shelves in the background" class="w-full h-72 object-cover" src="https://storage.googleapis.com/a1aa/image/b24a873b-a8cd-40fd-72ab-28d720b907d5.jpg">
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2 text-sm font-semibold">
                        Kepedulian dan Cinta
                    </div>
                </div>
            </div>
        </section>

        <!-- Profil Perangkat Kelas -->
        <section class="mb-20 text-center">
            <h3 class="font-semibold text-base mb-8">Profil Perangkat Kelas</h3>
            <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-12 px-4">
                <div>
                    <img alt="Portrait of a woman in red top smiling, light background" class="mx-auto rounded-lg mb-4" src="https://storage.googleapis.com/a1aa/image/09a9c291-06df-4764-e38f-422b1ae16124.jpg" width="192" height="256">
                    <h4 class="font-semibold mb-1">Windi alextria ayu</h4>
                    <p class="text-sm text-gray-500">Ketua kelas</p>
                    <p class="text-xs text-gray-600">Angkatan 2014</p>
                    <p class="text-xs text-gray-600">Livianti adalah seorang UI/UX yang berkarier di Inggris saat ini, dia adalah salah satu alumni yang berprestasi.</p>
                    <a href="#" class="text-red-600 text-xs hover:underline">Baca Selengkapnya</a>
                </div>
                <div>
                    <img alt="Portrait of a woman in red top smiling, light background" class="mx-auto rounded-lg mb-4" src="https://storage.googleapis.com/a1aa/image/09a9c291-06df-4764-e38f-422b1ae16124.jpg" width="192" height="256">
                    <h4 class="font-semibold mb-1">Windi alextria ayu</h4>
                    <p class="text-sm text-gray-500">Wakil Ketua kelas</p>
                    <p class="text-xs text-gray-600">Angkatan 2014</p>
                    <p class="text-xs text-gray-600">Livianti adalah seorang UI/UX yang berkarier di Inggris saat ini, dia adalah salah satu alumni yang berprestasi.</p>
                    <a href="#" class="text-red-600 text-xs hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        </section>
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

    <script>
        // Mobile menu toggle
        document.getElementById('menuBtn').addEventListener('click', function() {
            const mobileNav = document.getElementById('mobileNav');
            const mobileMenuContent = document.getElementById('mobileMenuContent');
            const overlay = document.getElementById('mobileNavOverlay');
            
            if (mobileNav.classList.contains('hidden')) {
                mobileNav.classList.remove('hidden');
                mobileMenuContent.classList.remove('translate-x-full');
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
            } else {
                mobileNav.classList.add('hidden');
                mobileMenuContent.classList.add('translate-x-full');
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
            }
        });

        document.getElementById('closeMenuBtn').addEventListener('click', function() {
            const mobileNav = document.getElementById('mobileNav');
            const mobileMenuContent = document.getElementById('mobileMenuContent');
            const overlay = document.getElementById('mobileNavOverlay');
            
            mobileNav.classList.add('hidden');
            mobileMenuContent.classList.add('translate-x-full');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#mobileNav') && !e.target.closest('#menuBtn')) {
                const mobileNav = document.getElementById('mobileNav');
                const mobileMenuContent = document.getElementById('mobileMenuContent');
                const overlay = document.getElementById('mobileNavOverlay');
                
                if (!mobileNav.classList.contains('hidden')) {
                    mobileNav.classList.add('hidden');
                    mobileMenuContent.classList.add('translate-x-full');
                    overlay.classList.remove('opacity-100');
                    overlay.classList.add('opacity-0');
                }
            }
        });

        // Add opacity transition for overlay
        document.getElementById('mobileNavOverlay').classList.add('transition-opacity', 'duration-300');

        // Add initial transform for menu content
        document.getElementById('mobileMenuContent').classList.add('translate-x-full');
    </script>
</body>
</html>
