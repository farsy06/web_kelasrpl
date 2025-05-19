@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow-sm rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name', Auth::user()->full_name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-600 focus:ring-red-600">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-600 focus:ring-red-600">
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('profile') }}" class="outline outline-1 outline-red-600 text-red-600 hover:text-white px-6 py-2 rounded-full hover:bg-red-600 transition">
                    Cancel
                </a>
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
