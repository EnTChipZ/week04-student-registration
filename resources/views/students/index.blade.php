@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-gray-50">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Registered Students</h2>
            <p class="text-sm text-gray-500 mt-1">Showing all registered student records in the system.</p>
        </div>
        <div>
            <a href="{{ route('students.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium text-sm shadow-sm transition">
                <i class="fa-solid fa-user-plus mr-2"></i> Register Student
            </a>
        </div>
    </div>

    @if ($students->isEmpty())
        <div class="p-8 text-center">
            <div class="text-gray-300 mb-4">
                <i class="fa-solid fa-users text-6xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-700">No Students Registered Yet</h3>
            <p class="text-gray-500 text-sm mt-1 mb-6">Start by adding the first student to the registration system.</p>
            <a href="{{ route('students.create') }}" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium text-sm transition">Register Now</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold tracking-wider border-b border-gray-200">
                        <th class="px-6 py-3">Photo</th>
                        <th class="px-6 py-3">Student ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Program</th>
                        <th class="px-6 py-3">Year Level</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-800">
                    @foreach ($students as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/' . $student->profile_picture) }}"
                                     alt="{{ $student->first_name }}"
                                     class="w-10 h-10 rounded-full object-cover border bg-gray-100">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-blue-600">
                                <a href="{{ route('students.show', $student->id) }}" class="hover:underline">
                                    {{ $student->student_id }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold">
                                {{ $student->last_name }}, {{ $student->first_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $student->program }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    {{ $student->year_level }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $student->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('students.show', $student->id) }}" class="text-blue-650 hover:text-blue-900 font-medium inline-flex items-center">
                                    <i class="fa-solid fa-eye mr-1.5"></i> View Profile
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-right text-xs text-gray-500">
            Total registered: {{ $students->count() }}
        </div>
    @endif
</div>
@endsection
