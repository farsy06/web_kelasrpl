@extends('admin.layouts.app')

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-semibold">
                    <th scope="col" class="px-4 py-3">Nama</th>
                    <th scope="col" class="px-4 py-3">Username</th>
                    <th scope="col" class="px-4 py-3">Email</th>
                    <th scope="col" class="px-4 py-3">Role</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $user->full_name }}</td>
                        <td class="px-4 py-3">{{ $user->username }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">{{ $user->role }}</td>
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.account.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.account.delete', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
