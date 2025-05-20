@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="w-full px-6 py-12 md:flex md:items-center md:justify-center gap-12">
    <div class="md:w-1/3 text-center">
        <div class="relative w-fit mx-auto">
            <!-- Background Red -->
            <div class="absolute -top-2 -left-2 w-full h-full bg-[#bb0000] rounded-lg transform rotate-6 z-0"></div>
            <!-- Profile Picture -->
            <div class="relative z-10">
                <img src="{{ $student->profile_pic ?? asset('images/user.png') }}"
                    alt="{{ $student->full_name }}"
                    class="w-40 md:w-52 lg:w-60 rounded-lg object-cover">
                <div class="mt-4">
                    <input type="file" name="profile_pic" class="hidden" id="profilePicInput">
                    <label for="profilePicInput" class="bg-red-600 text-white px-4 py-1 rounded-full hover:bg-red-700 cursor-pointer">
                        Change Photo
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="md:w-2/3 mt-8 md:mt-0">
        <h1 class="text-3xl font-bold mb-4">Edit Profile</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" value="{{ $student->full_name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] bg-gray-100 text-gray-500 cursor-not-allowed" disabled>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">NIS</label>
                    <input type="text" value="{{ $student->nis }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] bg-gray-100 text-gray-500 cursor-not-allowed" disabled>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" value="{{ $student->username }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] bg-gray-100 text-gray-500 cursor-not-allowed" disabled>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Birthday</label>
                    <input type="date" name="birthday" value="{{ old('birthday', $student->birthday ? $student->birthday->format('Y-m-d') : '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" name="phone" value="{{ old('phone', $student->phone) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $student->email) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] bg-gray-100 text-gray-500 cursor-not-allowed" disabled>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">{{ old('bio', $student->bio) }}</textarea>
            </div>

            <h2 class="text-2xl font-bold mb-6 space-y-6">Social Media Links</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">WhatsApp</label>
                    <input type="url" name="whatsapp" value="{{ old('whatsapp', optional($sosmed)->whatsapp ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-600 focus:ring-red-600">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Instagram</label>
                    <input type="url" name="instagram" value="{{ old('instagram', optional($sosmed)->instagram ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">TikTok</label>
                    <input type="url" name="tiktok" value="{{ old('tiktok', optional($sosmed)->tiktok ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">LinkedIn</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', optional($sosmed)->linkedin ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Facebook</label>
                    <input type="url" name="facebook" value="{{ old('facebook', optional($sosmed)->facebook ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">YouTube</label>
                    <input type="url" name="youtube" value="{{ old('youtube', optional($sosmed)->youtube ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Reddit</label>
                    <input type="url" name="reddit" value="{{ old('reddit', optional($sosmed)->reddit ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">X</label>
                    <input type="url" name="x" value="{{ old('x', optional($sosmed)->x ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Discord</label>
                    <input type="url" name="discord" value="{{ old('discord', optional($sosmed)->discord ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">GitHub</label>
                    <input type="url" name="github" value="{{ old('github', optional($sosmed)->github ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#bb0000] focus:ring-[#bb0000]">
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ url()->previous() }}" class="outline outline-1 outline-red-600 text-red-600 hover:text-white px-6 py-2 rounded-full hover:bg-red-600 transition">
                    Back
                </a>
                
                <a href="{{ route('password.change') }}" 
                class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition">
                    Change Password
                </a>
                
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
