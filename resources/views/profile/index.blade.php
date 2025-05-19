@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-8">
            <div class="flex-shrink-0">
                <img src="{{ auth()->user()->profile_pic ?? asset('images/user.png') }}" 
                    alt="{{ auth()->user()->full_name }}" 
                    class="h-40 w-40 rounded-lg object-cover">
            </div>
            <div class="flex-1">
                <h1 class="text-3xl font-bold text-gray-900">{{ auth()->user()->full_name }}</h1>
                <p class="mt-2 font-semibold text-gray-700">{{ auth()->user()->username }}</p>
                <p class="mt-2 text-gray-600">{{ auth()->user()->email }}</p>
                @if(auth()->user()->role === 'student')
                    <p class="mt-2 text-gray-600">Student ID: {{ auth()->user()->nis }}</p>
                @endif
                <div class="mt-4 space-y-2">
                    <a href="{{ route('profile.edit') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                        Edit Profile
                    </a>
                    <a href="{{ route('password.change') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                        Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
