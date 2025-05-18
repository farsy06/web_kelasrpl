<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body class="bg-white flex items-center justify-center min-h-screen p-4 overflow-x-hidden">
    <div id="authContainer" class="relative w-full max-w-4xl h-[500px] overflow-hidden rounded-xl shadow-lg border border-gray-300">
        <div id="formWrapper" class="absolute top-0 left-0 w-full md:w-[200%] h-full flex">
            <!--Login-->
            <div id="loginForm" class="w-full md:w-1/2 block md:flex flex-col justify-center items-center md:items-start bg-white p-8 space-y-4">
                <h1 class="text-3xl font-bold text-gray-800">Login</h1>
                
                <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm space-y-4">
                    @csrf
                    
                    <div>
                        <input type="email" name="email" placeholder="Email" class="w-full border rounded-md px-4 py-3 text-base focus:ring-2 focus:ring-[#bb0000] @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <input type="password" name="password" placeholder="Password" class="w-full border rounded-md px-4 py-3 text-base focus:ring-2 focus:ring-[#bb0000] @error('password') border-red-500 @enderror" required autocomplete="current-password">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" value="1" class="rounded border-gray-300 text-[#bb0000] focus:ring-[#bb0000]" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                    </div>
                    
                    <button type="submit" class="w-full bg-[#bb0000] text-white rounded-md py-3 text-base font-medium hover:bg-red-800 transition">Login</button>
                    
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="text-sm text-[#bb0000] hover:underline" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        </div>
                    @endif
                </form>
                
                <button type="button" class="md:hidden" onclick="window.location.href='{{ route('register') }}'">Belum punya akun?</button>
            </div>
        </div>
        <!--Panel-->
        <div id="panel" class="hidden md:flex absolute top-0 left-1/2 w-1/2 h-full bg-[#bb0000] text-white flex-col justify-center items-center space-y-4 p-8 transition-transform duration-700 z-10">
            <h2 id="panelTitle" class="text-2xl font-bold text-center">Belum punya akun?</h2>
            <p id="panelText" class="text-sm text-center">
                Daftar sekarang untuk mulai menggunakan layanan kami!
            </p>
            <button type="button" onclick="window.location.href='{{ route('register') }}'" id="panelButton" class="bg-white text-[#bb0000] px-6 py-2 rounded-md font-medium hover:bg-gray-200 transition">
                Daftar
            </button>
        </div>
    </div>
</body>
</html>
