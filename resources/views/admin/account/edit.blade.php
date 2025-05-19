@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Edit User</h2>

        <form action="{{ route('admin.account.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required>
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="student" {{ old('role', $user->role) === 'student' ? 'selected' : '' }}>Student</option>
                    <option value="public" {{ old('role', $user->role) === 'public' ? 'selected' : '' }}>Public</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.account') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection