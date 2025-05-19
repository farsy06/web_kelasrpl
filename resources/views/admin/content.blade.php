@extends('admin.layouts.app')

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-semibold">
                    <th scope="col" class="px-4 py-3">Konten</th>
                    <th scope="col" class="px-4 py-3">Pembuat</th>
                    <th scope="col" class="px-4 py-3">Tanggal dibuat</th>
                    <th scope="col" class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr class="border-b">
                    <td class="px-4 py-3"><div class="w-20 h-16 bg-gray-300 rounded"></div></td>
                    <td class="px-4 py-3">User 1</td>
                    <td class="px-4 py-3">30 April 2025</td>
                    <td class="px-4 py-3">
                        <button type="button" aria-label="Delete" class="text-gray-600 hover:text-red-600">🗑️</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
