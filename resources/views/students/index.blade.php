@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 relative overflow-hidden">
    <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#bb0000] opacity-20 rounded-full blur-2xl z-0"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#bb0000] opacity-20 rotate-45 rounded-lg blur-2xl z-0"></div>

    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-2">Our Students</h1>
        <div class="mx-auto w-24 h-1 bg-[#bb0000] mb-10 rounded-full"></div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($students as $student)
            @if($student->role === 'student')
            <a data-aos="fade-up" data-aos-delay="100" href="{{ route('students.show', $student->id) }}"
                class="bg-white hover:bg-[#bb0000] shadow-md rounded-2xl overflow-hidden hover:shadow-xl transition duration-300 group">
                <img src="{{ $student->profile_pic ?? asset('images/user.png') }}" alt="{{ $student->full_name }}"
                    class="w-full h-48 object-cover transition duration-300 transform group-hover:-translate-y-1 group-hover:scale-105">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-white transition">{{ $student->full_name }}</h3>
                    <p class="text-sm text-gray-600 group-hover:text-white">XI RPL 1 • {{ $student->bio ?? 'Student' }}</p>
                    <div class="mt-2 text-xs text-gray-400 group-hover:text-white">NIS: {{ $student->nis }}</div>
                </div>
            </a>
            @endif
            @endforeach
        </div>

        <div class="text-center text-sm text-gray-500 mt-6">Total Siswa: {{ $students->where('role', 'student')->count() }}</div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-in-out',
    });
</script>
@endpush
