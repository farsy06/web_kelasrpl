<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? "{$title} - " : '' }}{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body { font-family: "Poppins", sans-serif; }
    </style>
</head>

<body class="min-h-screen bg-[#fafafa] flex relative overflow-x-hidden">
    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="fixed inset-y-0 left-0 w-64 bg-[#bb0000] text-white transform -translate-x-full transition-transform duration-300 z-50 md:hidden">
        <div class="p-6">
            <button type="button" aria-label="Close sidebar" onclick="toggleSidebar()" class="mb-6">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h1 class="text-2xl font-extrabold mb-10">Admin Panel</h1>
            <nav aria-label="Mobile Sidebar" class="flex flex-col gap-2">
                <a href="{{ route('admin.index') }}" class="{{ request()->is('admin') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Dashboard</a>
                <a href="{{ route('admin.content') }}" class="{{ request()->is('admin/content') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Konten</a>
                <a href="{{ route('admin.account') }}" class="{{ request()->is('admin/account') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Akun</a>
                <a href="{{ route('home') }}" class="{{ request()->is('home') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Beranda</a>
            </nav>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full text-left hover:bg-red-600 px-4 py-2 rounded text-white">Logout</button>
            </form>
        </div>
    </div>

    <!-- Desktop Sidebar -->
    <aside class="hidden md:block fixed top-0 bottom-0 left-0 bg-[#bb0000] w-64 flex-col text-white overflow-y-auto">
        <div class="p-6">
            <h1 class="text-2xl font-extrabold mb-10">Admin Panel</h1>
            <nav aria-label="Desktop Sidebar" class="flex flex-col gap-2">
                <a href="{{ route('admin.index') }}" class="{{ request()->is('admin') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Dashboard</a>
                <a href="{{ route('admin.content') }}" class="{{ request()->is('admin/content') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Konten</a>
                <a href="{{ route('admin.account') }}" class="{{ request()->is('admin/account') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Akun</a>
                <a href="{{ route('home') }}" class="{{ request()->is('home') ? 'bg-[#c23636]' : 'hover:bg-[#c23636]' }} px-4 py-2 rounded">Beranda</a>
            </nav>
        </div>
        <div class="p-6 mt-auto">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full text-left hover:bg-red-600 px-4 py-2 rounded text-white">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-md z-40 h-16 flex items-center px-4 md:hidden">
        <button type="button" aria-label="Open sidebar" onclick="toggleSidebar()" class="mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-10 md:ml-64 mt-16 md:mt-0">
        @yield('content')
    </main>

    @stack('scripts')
    <script src="{{ asset('js/admin-sidebar-toggle.js') }}" defer></script>
</body>
</html>
