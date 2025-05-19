@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="w-full px-6 py-12 md:flex md:items-center md:justify-center gap-12">
    <div class="md:w-1/3 text-center">
        <div class="relative w-fit mx-auto">
            <!-- Background Red -->
            <div class="absolute -top-2 -left-2 w-full h-full bg-[#bb0000] rounded-lg transform rotate-6 z-0"></div>
            <!-- Profile Picture -->
            <img src="{{ $student->profile_pic ?? asset('images/user.png') }}"
                alt="{{ $student->full_name }}"
                class="relative z-10 w-40 md:w-52 lg:w-60 rounded-lg object-cover">
    </div>
    </div>

    <div class="md:w-2/3 mt-8 md:mt-0">
        <h1 class="text-3xl font-bold mb-4">{{ $student->full_name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 mb-16 text-sm">
            <div><span class="font-semibold">Tanggal Lahir:</span> {{ $student->birthday ? $student->birthday->format('d F Y') : 'Belum diisi' }}</div>
            <div><span class="font-semibold">NIS:</span> {{ $student->nis }}</div>
            <div><span class="font-semibold">No. HP:</span> {{ $student->phone }}</div>
            <div><span class="font-semibold">Email:</span> {{ $student->email }}</div>
            <div><span class="font-semibold">Username:</span> {{ $student->username }}</div>
            <div><span class="font-semibold">Kelas:</span> XI RPL 1</div>
        </div>

        <div class="flex flex-wrap justify-center gap-4 mt-6">
            <div class="flex flex-wrap justify-center gap-4 text-[#bb0000] text-2xl">
                @if(optional($sosmed)->whatsapp)
                    <a href="{{ optional($sosmed)->whatsapp }}" class="hover:text-red-700 transition" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                @endif
                @if(optional($sosmed)->instagram)
                    <a href="{{ optional($sosmed)->instagram }}" class="hover:text-red-700 transition" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                @endif
                @if(optional($sosmed)->tiktok)
                    <a href="{{ optional($sosmed)->tiktok }}" class="hover:text-red-700 transition" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
                @endif
                @if(optional($sosmed)->linkedin)
                    <a href="{{ optional($sosmed)->linkedin }}" class="hover:text-red-700 transition" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                @endif
                @if(optional($sosmed)->facebook)
                    <a href="{{ optional($sosmed)->facebook }}" class="hover:text-red-700 transition" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                @endif
                @if(optional($sosmed)->youtube)
                    <a href="{{ optional($sosmed)->youtube }}" class="hover:text-red-700 transition" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                @endif
                @if(optional($sosmed)->reddit)
                    <a href="{{ optional($sosmed)->reddit }}" class="hover:text-red-700 transition" target="_blank" title="Reddit"><i class="fab fa-reddit"></i></a>
                @endif
                @if(optional($sosmed)->x)
                    <a href="{{ optional($sosmed)->x }}" class="hover:text-red-700 transition" target="_blank" title="X"><i class="fab fa-x-twitter"></i></a>
                @endif
                @if(optional($sosmed)->discord)
                    <a href="{{ optional($sosmed)->discord }}" class="hover:text-red-700 transition" target="_blank" title="Discord"><i class="fab fa-discord"></i></a>
                @endif
                @if(optional($sosmed)->github)
                    <a href="{{ optional($sosmed)->github }}" class="hover:text-red-700 transition" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                @endif
            </div>
            @if(auth()->check() && auth()->id() == $student->id)
                <a href="{{ route('students.edit', $student->id) }}" class="bg-[#bb0000] text-white px-4 py-1 rounded-full hover:bg-gray-800 transition">Edit Profile</a>
            @endif
        </div>
    </div>
</section>

<!-- Divider with Background -->
<div class="bg-[#bb0000] h-24 w-full flex items-center justify-center text-white"></div>

<!-- Portfolio Section -->
<section class="w-full px-6 py-12 text-center">
    <h2 class="text-3xl font-bold mb-2">My Portfolio</h2>
    <p class="mb-8 text-sm text-gray-600">Sometimes I write multiple projects into a blog post</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow-md p-4 border">
            <h3 class="font-bold text-lg mb-2">Website Portofolio</h3>
            <p class="text-sm text-gray-600 mb-4">{{ $student->bio ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pharetra, hendrerit.' }}</p>
            <div class="flex justify-center text-sm items-center">
                <button class="bg-[#bb0000] text-white px-4 py-1 rounded-full hover:bg-gray-800">Detail</button>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow-md p-4 border">
            <h3 class="font-bold text-lg mb-2">Web Developer</h3>
            <p class="text-sm text-gray-600 mb-4">{{ $student->bio ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pharetra, hendrerit.' }}</p>
            <div class="flex justify-center text-sm items-center">
                <button class="bg-[#bb0000] text-white px-4 py-1 rounded-full hover:bg-gray-800">Detail</button>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow-md p-4 border">
            <h3 class="font-bold text-lg mb-2">Internet of Things</h3>
            <p class="text-sm text-gray-600 mb-4">{{ $student->bio ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pharetra, hendrerit.' }}</p>
            <div class="flex justify-center text-sm items-center">
                <button class="bg-[#bb0000] text-white px-4 py-1 rounded-full hover:bg-gray-800">Detail</button>
            </div>
        </div>
    </div>
</section>
@endsection
