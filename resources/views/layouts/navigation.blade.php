<header class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-10 md:px-10">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="font-bold text-3xl text-gray-800">XI - RPL</a>
            </div>
        <nav id="mainNav" class="hidden md:flex items-center space-x-4" aria-label="Main site navigation">
            <a class="{{ request()->routeIs('home') ? 'text-red-600' : 'text-gray-600' }} hover:text-red-700 transition text-base" href="{{ route('home') }}" aria-label="Go to home page">Beranda</a>
            <a class="{{ request()->routeIs('about') ? 'text-red-600' : 'text-gray-600' }} hover:text-red-700 transition text-base" href="{{ route('about') }}" aria-label="Go to about us page">Tentang Kami</a>
            <a class="{{ request()->routeIs('programs') ? 'text-red-600' : 'text-gray-600' }} hover:text-red-700 transition text-base" href="{{ route('programs') }}" aria-label="Go to programs page">Programs</a>
            <a class="{{ request()->routeIs(['students.index', 'students.show']) ? 'text-red-600' : 'text-gray-600' }} hover:text-red-700 transition text-base" href="{{ route('students.index') }}" aria-label="Go to students page">Siswa</a>
            <a class="{{ request()->routeIs('event') ? 'text-red-600' : 'text-gray-600' }} hover:text-red-700 transition text-base" href="{{ route('event') }}" aria-label="Go to event page">Event</a>
        </nav>
        <div class="flex items-center space-x-2">
            @auth
                <div class="flex items-center space-x-2">
                    <a href="{{ route('profile') }}" class="bg-red-600 text-white px-3 py-2 rounded-full text-base font-medium hover:bg-red-700 transition">
                        Profile
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.index') }}" class="text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                            Dashboard
                        </a>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                                Logout
                            </button>
                        </form>
                    @endif
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

<!-- Mobile Navigation -->
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
                <h2 class="text-xl font-bold text-gray-800 mb-2">Menu</h2>
            </div>
            <div class="flex-1 overflow-y-auto">
                <nav aria-label="Mobile site navigation" class="space-y-4 px-4 py-6">
                    <a href="{{ route('home') }}" class="block w-full text-left {{ request()->routeIs('home') ? 'text-red-600' : 'text-gray-800' }} hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Beranda</a>
                    <a href="{{ route('about') }}" class="block w-full text-left {{ request()->routeIs('about') ? 'text-red-600' : 'text-gray-800' }} hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Tentang Kami</a>
                    <a href="{{ route('programs') }}" class="block w-full text-left {{ request()->routeIs('programs') ? 'text-red-600' : 'text-gray-800' }} hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Programs</a>
                    <a href="{{ route('students.index') }}" class="block w-full text-left {{ request()->routeIs(['students.index', 'students.show']) ? 'text-red-600' : 'text-gray-800' }} hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Siswa</a>
                    <a href="{{ route('event') }}" class="block w-full text-left {{ request()->routeIs('event') ? 'text-red-600' : 'text-gray-800' }} hover:text-red-600 transition duration-200 ease-in-out transform hover:scale-105 text-lg font-semibold">Event</a>
                </nav>
            </div>
            @auth
            <div class="border-t border-gray-200 px-4 py-6">
                <div class="space-y-4">
                    <a href="{{ route('profile') }}" class="block w-full text-center text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                        Profile
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.index') }}" class="block w-full text-center text-red-600 hover:text-red-700 transition outline outline-1 outline-red-600 px-3 py-2 rounded-full text-base font-medium">
                            Dashboard
                        </a>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-center bg-red-600 text-white px-3 py-2 rounded-full text-base font-medium hover:bg-red-700 transition">
                                Logout
                            </button>
                        </form>
                    @endif
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
