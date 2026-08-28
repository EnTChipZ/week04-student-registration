@extends('layouts.app')

@section('title', 'Student Profile - ' . $student->first_name . ' ' . $student->last_name)

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Profile Header Background -->
    <div class="h-32 bg-blue-600"></div>

    <!-- Profile Details -->
    <div class="px-8 pb-8 relative">
        <!-- Profile Picture Image (Overlapping Header) -->
        <div class="absolute -top-16 left-8">
            <img src="{{ asset('storage/' . $student->profile_picture) }}"
                 alt="{{ $student->first_name }} {{ $student->last_name }}"
                 class="w-32 h-32 rounded-full border-4 border-white object-cover bg-gray-200 shadow-md">
        </div>

        <!-- Name and Year -->
        <div class="pt-20 border-b border-gray-200 pb-6">
            <h2 class="text-3xl font-bold text-gray-800">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h2>
            <p class="text-blue-600 font-semibold text-sm tracking-wide uppercase mt-1">{{ $student->program }} &bull; {{ $student->year_level }}</p>
        </div>

        <!-- Details Grid -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Student ID</span>
                <span class="text-gray-800 font-medium text-lg">{{ $student->student_id }}</span>
            </div>

            <div>
                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Email Address</span>
                <span class="text-gray-800 font-medium text-lg">{{ $student->email }}</span>
            </div>

            <div>
                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Mobile Number</span>
                <span class="text-gray-800 font-medium text-lg">{{ $student->mobile_number }}</span>
            </div>

            <div>
                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Date of Birth</span>
                <span class="text-gray-800 font-medium text-lg">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}</span>
            </div>

            <div>
                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Gender</span>
                <span class="text-gray-800 font-medium text-lg">{{ $student->gender }}</span>
            </div>

            <div>
                <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Date Registered</span>
                <span class="text-gray-800 font-medium text-lg">{{ $student->created_at->format('F d, Y h:i A') }}</span>
            </div>
        </div>

        <!-- Address -->
        <div class="mt-6 pt-6 border-t border-gray-100">
            <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Home Address</span>
            <p class="text-gray-850 bg-gray-50 p-4 rounded border border-gray-200">{{ $student->address }}</p>
        </div>

        <!-- Actions -->
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('students.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 font-medium transition">Back to List</a>
            <a href="{{ route('students.create') }}" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium shadow-sm transition">Register Another</a>
        </div>
    </div>
</div>
@endsection
