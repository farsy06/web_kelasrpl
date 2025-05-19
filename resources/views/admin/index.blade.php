@extends('admin.layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm font-medium">Total Users</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Content Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm font-medium">Total Content</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{ \App\Models\Content::count() }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Recent Activity Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm font-medium">Recent Activity</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{ \App\Models\ActivityLog::latest()->count() }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm font-medium">System Status</h3>
                    <p class="text-3xl font-semibold text-green-600">Online</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('admin.content') }}" class="border rounded-lg p-4 hover:bg-gray-50 flex items-center">
                <svg class="h-6 w-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <span>Manage Content</span>
            </a>
            <a href="{{ route('admin.account') }}" class="border rounded-lg p-4 hover:bg-gray-50 flex items-center">
                <svg class="h-6 w-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Manage Accounts</span>
            </a>
        </div>
    </div>

    <!-- Recent Activity Log -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
        <div class="space-y-4">
            @foreach(\App\Models\ActivityLog::with('user')->latest()->take(5)->get() as $activity)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded relative">
                    <div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 rounded-full {{ 
                                    strpos($activity->description, 'dashboard') !== false ? 'bg-blue-100 text-blue-600' : 
                                    (strpos($activity->description, 'content') !== false ? 'bg-green-100 text-green-600' : 
                                    (strpos($activity->description, 'account') !== false ? 'bg-purple-100 text-purple-600' : 'bg-gray-100 text-gray-600'))
                                }}">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if(strpos($activity->description, 'dashboard') !== false)
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        @elseif(strpos($activity->description, 'content') !== false)
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        @elseif(strpos($activity->description, 'account') !== false)
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        @endif
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium {{ 
                                    strpos($activity->description, 'dashboard') !== false ? 'text-blue-600' : 
                                    (strpos($activity->description, 'content') !== false ? 'text-green-600' : 
                                    (strpos($activity->description, 'account') !== false ? 'text-purple-600' : 'text-gray-900'))
                                }}">{{ $activity->description }}</p>
                                <div class="flex space-x-2 text-sm text-gray-500">
                                    <time datetime="{{ $activity->created_at }}">{{ $activity->created_at->format('H:i') }}</time>
                                    <span>-</span>
                                    <span>{{ $activity->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <span class="mr-1">By</span>
                                    <span class="font-medium text-gray-700">{{ $activity->user->full_name }}</span>
                                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs {{ $activity->user->role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $activity->user->role }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="p-2 rounded-full bg-gray-100 text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection